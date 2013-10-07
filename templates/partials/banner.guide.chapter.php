
<div id="banner-wrapper">

		<!-- <progress id="header-progress" value="00" max="100"></progress> -->

		<div class="guide-menu-wrapper">
			<div class="navbar container navbar-inverse" role="navigation">
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav crumbs">
						<li class=""><a href="{{ baseurl }}/guides/{{guide.slug}}">{{guide.title}}</a></li>
						<li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">{{book.title}}</a></li>
						<!-- <li class="currentChapter"><a href="#"></a></li> -->
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li class="navbar-options">
							{% include 'partials/action-options.php' %}
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->

			</div>
		</div>

		<div class="nav-drawer-container container">
			{% include 'partials/nav.drawer.php' %}
		</div>


		<div id="banner-content-wrapper" class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="page-header">
							<h5 style="font-size:1em;"><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">&laquo; {{book.title}}</a> Chapter {{chapter.index}} of {{chapter.indexOf}}</h5>
							<h1 class="chapterTitle" data-title="{{chapter.title}}" data-slug="{{chapter.slug}}">{{chapter.title}}</h1>

							<div class="lead">
								{{chapter.content|raw}}
							</div>

						</div>							
					</div>
					<div class="col-md-5 col-md-offset-1">
							<h4 class="twitter-header">This Chapter on Twitter:</h4>
							<div id="social-feed" class="widget"></div>
							<div class="tweet-box">

									
									<a href="https://twitter.com/intent/tweet?button_hashtag=#{{guide.hashtag}}{{chapter.hashtag}}clg" class="socialite twitter-hashtag" data-lang="en" data-url="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}" data-text="I really like {{chapter.title}} Chapter in the Rackspace {{guide.title}} Launch Guide!" data-hashtags="clg" data-size="large">
										Tweet #{{guide.hashtag}}{{chapter.hashtag}}clg</a>
										<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
									<small><em>Let us know what you think on Twitter with this hashtag!</em></small>

							</div>
					</div>
				</div>
				
			</div>
		</div>




</div>

