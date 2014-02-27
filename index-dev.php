<?php
    require 'vendor/autoload.php';
    use \Michelf\Markdown;

    $app = new Slim(array(
        'templates.path' => __DIR__.'/templates/',
    ));
	
	
    
    require 'vendor/slim/extras/Views/TwigView.php';
    TwigView::$twigExtensions = array('Twig_Extensions_Slim',);
    
    $app->view('TwigView');



    $script_location = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
    $app->view()->getEnvironment()->addGlobal('baseurl', $script_location);
    


    function getAPI($route) {
        //GET THE JSON
        // $json_url = 'http://192.237.203.16/'.$route;
        $json_url = 'http://192.237.165.197/api/'.$route;
        //$json_url = 'http://launch.snet.api.rackspace.com/'.$route;
	//$json_url = 'http://launch.snet.api.henshin.co/'.$route;
        // $json_url = 'http://projects.clgapi/'.$route;
        $ch = curl_init( $json_url );
        $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
        );
        curl_setopt_array( $ch, $options );
        //CREATE THE OUTPUT DATA
        $output =  json_decode(curl_exec($ch)); // Getting jSON result string


		if(!isset($output->data)){
			$app = Slim::getInstance();
			$app->redirect('/error');
		} else {
			return $output->data;
		}
        
    }

    $app->get('/error', function() use($app) {
        $app->render( 'error.php');        
    });

    function getSitemap($data) {
        

        function walk($data) {
            $sitemap = array();

            foreach($data as $item) {
                $sitemap[] = array(
                    'title'=>$item->title
                    );
            }
            
            return $sitemap;
        }

        $sitemap = walk($data);

        return $sitemap;

    }

    $app->get('/', function() use($app) {

        $guides = getAPI('guides');
       
        $app->render( 'home.php', array('guides'=>$guides) );
        
    });

    $app->get('/index', function() use($app) {

        $guides = getAPI('guides');

        $app->render( 'index.all.php', array('guides'=>$guides) );
        
    });
	
    $app->get('/guides/(:guideSlug)', function ($guideSlug='') use ($app) {

        $guides = getAPI('guides/overview');
        
        $guide = getAPI('guides/slug/'.$guideSlug.'/markdown');
		

        $app->render('guide.landing.php', array('guides'=>$guides, 'guide'=>$guide));
		
    });
		


    // $app->get('/guides/(:guideSlug)/(:bookSlug)', function ($guideSlug, $bookSlug) use ($app) {


    //     $guides = getAPI('guides/overview');

    //     $api = getAPI('/guides/slug/'.$guideSlug.'/'.$bookSlug.'/markdown');    

    //     $guide = $api->guide;

    //     $book = $api->book;

    //     $app->render('guide.book.php', array('guides'=>$guides, 'guide'=> $guide, 'book'=>$book));

    // });

    $app->get('/guides/(:guideSlug)/(:bookSlug)', function ($guideSlug='', $bookSlug='') use ($app) {

        $guides = getAPI('guides/overview');

        $api = getAPI('/guides/slug/'.$guideSlug.'/'.$bookSlug.'/markdown');    

        $guide = $api->guide;

        $book = $api->book;

        $chapters = $api->book->children;
        foreach($chapters as $chapter) {
            if(isset($chapter->code)) {
                foreach($chapter->code as $code) {
		//$code = new stdClass();
		
		
                        if(strstr($code->text, 'your.')) {
							if(isset($chapter->meta)) {
								$chapter->meta->iptool = true;
							}                           
                            $code->iptool = true;
                        }
                    
                }
                foreach($chapter->children as $child) {
                    if($child->code) {
                        foreach($child->code as $code) {
                                if(strstr($code->text, 'your.')) {
                                    $child->meta->iptool = true;
                                $code->iptool = true;
                                }

                        }
                    }
                }
            }
        }

        $app->render('guide.book.all.php', array('guides'=>$guides, 'guide'=> $guide, 'book'=>$book, 'chapters'=>$chapters, 'allsteps'=>true));
		
    });

    $app->get('/guides/(:guideSlug)/(:bookSlug)/(:chapterSlug)', function ($guideSlug='', $bookSlug='', $chapterSlug='') use ($app) {

        $guides = getAPI('guides/overview');
		
		if(!$guides) {
			$app->render('error.php');
			return;
		}

        $api = getAPI('/guides/slug/'.$guideSlug.'/'.$bookSlug.'/'.$chapterSlug.'/markdown');   

        $guide = $api->guide;

        $book = $api->book;

        $chapter = $api->chapter;

        if(isset($chapter->code)) {
            foreach($chapter->code as $code) {
		//$code = new stdClass();
                if(strstr($code->text, 'your.')) {
                    $chapter->meta->iptool = true;
                    $code->iptool = true;

                }
            }
            foreach($chapter->children as $child) {
                if($child->code) {
                    foreach($child->code as $code) {
                        if(strstr($code->text, 'your.')) {
                            $child->meta->iptool = true;
                            $code->iptool = true;

                        }
                    }
                }
            }
        }

        $app->render('guide.book.chapter.php', array('guides'=>$guides, 'guide'=> $guide, 'book'=>$book, 'chapter'=>$chapter, 'chapterslug'=>'#'.$chapter->slug));

    });
	
    
    $app->run();
