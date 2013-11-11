<div id="banner-wrapper">
	<div class="jumbotron">
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
					<h4 class="twitter-header">This Guide on Twitter:</h4>
					<div id="social-feed" class="widget"></div>
					<div class="tweet-box">
						<a href="https://twitter.com/intent/tweet?button_hashtag=#{{guide.hashtag}}clg" class="socialite twitter-hashtag" data-lang="en" data-url="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}" data-text="I really like {{chapter.title}} Chapter in the Rackspace {{guide.title}} Launch Guide!" data-hashtags="clg" data-size="large">Tweet #{{guide.hashtag}}clg</a>
						<small><em>Let us know what you think on Twitter with this hashtag!</em></small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- PROGRESS BAR: SCOPED OUT <progress id="header-progress" value="00" max="100"></progress> -->

