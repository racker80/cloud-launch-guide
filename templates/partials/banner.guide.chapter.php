
<div id="chapter-banner-content">

		<div id="guide-nav-container">
			<div id="guide-navbar-bs" >
				<nav class="navbar" role="navigation">
					<div class="container">
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav crumbs">
								<li class=""><a href="{{ baseurl }}/guides/{{guide.slug}}">{{guide.title}}</a></li>
								<li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">{{book.title}}</a></li>
								<li class="currentChapter"><a href="#"></a></li>
							</ul>

							<ul class="nav navbar-nav navbar-right">
								<li class="navbar-options">
									{% include 'partials/action-options.php' %}

								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div>
					
				</nav>
			</div>
		</div>

	<div class="container">
		{% include 'partials/nav.drawer.php' %}
	</div>

		<div class="jumbotron">
			<div class="container">
				<div class="page-header">
					<h5 style="font-size:1.2em;">Chapter {{chapter.index}} of {{chapter.indexOf}}</h5>
					<h1 class="chapterTitle" data-title="{{chapter.title}}" data-slug="{{chapter.slug}}"><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}">{{chapter.title}}</a></h1>

					<div class="lead">
						{{chapter.content|raw}}
					</div>

					<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-url="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}" data-text="I really like {{chapter.title}} Chapter in the {{guide.title}} Launch Guide!" data-hashtags="{{chapter.slug}}" data-size="large">Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
		</div>
</div>
	<progress id="header-progress" value="00" max="100"></progress>
