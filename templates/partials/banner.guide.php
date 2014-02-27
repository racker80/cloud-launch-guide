<div id="banner-wrapper">
	<div class="jumbotron guide-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="page-header">
						<h1 class="chapterTitle guideTitle" data-slug="{{guide.slug}}">{{guide.title}}</h1>
						<div class="lead chapterDesc">
							{{guide.content|raw}}
						</div>
					</div>
				</div>
				<div class="col-md-5 col-md-offset-1">
					<div class="tweet-box clearfix">
						<p>Share this guide:</p>
						<a href="https://twitter.com/intent/tweet?button_hashtag=#{{guide.hashtag}}clg" class="socialite twitter-hashtag" data-lang="en" data-url="https://launch.rackspace.com/guides/{{guide.slug}}" data-text='Check out "{{guide.title}}" in the Rackspace Cloud Launch Guides:' data-hashtags="clg" data-size="large">Tweet this guide</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- PROGRESS BAR: SCOPED OUT <progress id="header-progress" value="00" max="100"></progress> -->

