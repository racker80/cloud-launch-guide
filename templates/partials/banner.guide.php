
<div id="banner-wrapper">


		<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="page-header">
							<h1 class="chapterTitle" data-slug="{{guide.slug}}">{{guide.title}}</h1>

							<div class="lead">
								{{guide.content|raw}}
							</div>

						</div>							
					</div>
					<div class="col-md-5 col-md-offset-1">
							<h4 class="twitter-header">This Guide on Twitter:</h4>
							<div id="social-feed" class="widget"></div>
							<div class="tweet-box">
								
									
									<a href="https://twitter.com/intent/tweet?button_hashtag=#{{guide.slug}}clg" class="twitter-hashtag-button" data-lang="en" data-url="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}" data-text="I really like {{chapter.title}} Chapter in the Rackspace {{guide.title}} Launch Guide!" data-hashtags="clg" data-size="large">
										Tweet #{{guide.slug}}clg</a>
										<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
									<br>
									<small><em>Let us know what you think on Twitter with this hashtag!</em></small>

							</div>
					</div>
				</div>
				
			</div>
			
		</div>




</div>
	<!-- <progress id="header-progress" value="00" max="100"></progress> -->

