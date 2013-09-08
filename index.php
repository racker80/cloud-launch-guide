<?php
require 'Slim/Slim.php';
require 'Views/TwigView.php';
require 'lib/php-markdown-lib/Michelf/Markdown.php';
use \Michelf\Markdown;

$app = new Slim(array(
    'view' => new TwigView(),
	'templates.path' => 'templates'
));


$script_location = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
$app->view()->getEnvironment()->addGlobal('baseurl', $script_location);


$app->get('/', function() use($app) {
		// jSON URL which should be requested
	$json_url = 'http://192.237.165.197/CLG/app/api/?action=getGuides';
	// $json_url = 'http://projects.mongo/app/api/?action=getGuides';
	// jSON String for request

	// Initializing curl
	$ch = curl_init( $json_url );

	// Configuring curl options
	$options = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
		);

	// Setting curl options
	curl_setopt_array( $ch, $options );

	// Getting results
	$output =  json_decode(curl_exec($ch)); // Getting jSON result string



	$app->render('home.php', array('guides'=>$output));
});



function getChildBySlug($children, $slug) {
	$i = 0;
	$c = count($children)-1;

	if(!$children) {
		return;
	}
	foreach($children as $child) {
		if(isset($child->slug) && $child->slug === $slug) {
			if($i < $c)
				$child->next = $children[$i+1];

			if($i > 0)
				$child->previous = $children[$i-1];

			return $child;
		}
		$i++;
	}
	return;
}

function filterContent($content, $parent) {
	if(isset($parent->code))
	foreach($parent->code as $key=>$value) {
		if(!isset($value->type)) $value->type="";
		$content = str_replace('[code '.$key.']', '<pre class="'.$value->type.'">'.$value->text.'</pre>', $content);
	}
	
	if(isset($parent->images))
	foreach($parent->images as $key=>$value) {
		$content = str_replace('[image '.$key.']', '<img src="'.$value->url.'">', $content);
	}

	return $content;
}

function getData() {

	//GET THE JSON
	$json_url = 'http://192.237.165.197/CLG/app/api/?action=getAll';
	// $json_url = 'http://projects.mongo/app/api/?action=getGuides';

	$ch = curl_init( $json_url );
	$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
	);
	curl_setopt_array( $ch, $options );



	//CREATE THE OUTPUT DATA
	$output =  json_decode(curl_exec($ch)); // Getting jSON result string



	//WALK THE TREE
	function walk($parent) {
		//CREATE THE ACTION OVERVIEW
		if(isset($parent->type) && $parent->type === "chapter") {
			if(isset($parent->children)) {
				foreach($parent->children as $child) {
					if(isset($child->code)) {
						foreach($child->code as $code) {
							$parent->code[] = $code;
						}
					}
				}
			}
		}

		//FILTER CONTENT FOR CODE AND IMAGES AND MARKDOWN
		if(isset($parent->content)) {
			$parent->content = filterContent($parent->content, $parent);
			$parent->content = Markdown::defaultTransform($parent->content);
		}
		
		if(isset($parent->additionalContent)) {
			foreach($parent->additionalContent as $content) {
				$content->text = Markdown::defaultTransform($content->text);
			}
		}

		if(isset($parent->children)) {
			foreach($parent->children as $child) {
				walk($child);
			}
		}
	}
	

	foreach($output->guides as $guide) {
		$guide = walk($guide);
	}
	

	return $output->guides;
}




$app->get('/guides/(:guideSlug)', function ($guideSlug) use ($app) {

	$guides = getData();

	$guide = getChildBySlug($guides, $guideSlug);

	$app->render('guide.landing.php', array('guides'=>$guides, 'guide'=>$guide));

});




$app->get('/guides/(:guideSlug)/(:bookSlug)', function ($guideSlug, $bookSlug) use ($app) {

	$guides = getData();

	$guide = getChildBySlug($guides, $guideSlug);

	$book = getChildBySlug($guide->children, $bookSlug);

	$app->render('guide.book.php', array('guides'=>$guides, 'guide'=> $guide, 'book'=>$book));

});
$app->get('/guides/(:guideSlug)/(:bookSlug)/all', function ($guideSlug, $bookSlug) use ($app) {

	$guides = getData();

	$guide = getChildBySlug($guides, $guideSlug);

	$book = getChildBySlug($guide->children, $bookSlug);

	$app->render('guide.book.all.php', array('guides'=>$guides, 'guide'=> $guide, 'book'=>$book, 'allsteps'=>true));

});

$app->get('/guides/(:guideSlug)/(:bookSlug)/(:chapterSlug)', function ($guideSlug, $bookSlug, $chapterSlug) use ($app) {

	$guides = getData();

	$guide = getChildBySlug($guides, $guideSlug);

	$book = getChildBySlug($guide->children, $bookSlug);

	$chapter = getChildBySlug($book->children, $chapterSlug);


	$app->render('guide.book.chapter.php', array('guides'=>$guides, 'guide'=> $guide, 'book'=>$book, 'chapter'=>$chapter, 'chapterslug'=>'#'.$chapter->slug));

});


$app->run();
