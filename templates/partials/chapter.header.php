<!-- PAGE SECTION: top of content -->
<div class="container chapter-header-wrapper">
	<div class="row">
		<div class="col-md-11">
			<h1 class="chapterTitle" data-title="{{chapter.title}}" data-slug="{{chapter.slug}}">{{chapter.title}}</h1>
			<p><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}">link to chapter</a></p>
			<div class="lead">{{chapter.content|raw}}</div>
			{% if chapter.content is empty %}
				<p>This chapter needs some content, yo.</p>
				{% else %}
			{% endif %}
		</div>
		<div class="col-md-4 col-md-offset-1">
			<!-- Remove later
			<h4>Chapter 4{{ loop.index }}</h4>
			<p>Time: <strong>15 min{{ chapter.time }}</strong></p>
			<a href="" class="btn btn-primary">Share on Twitter <span class="glyphicon glyphicon-share-alt"></span></a>
			<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-url="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}" data-text="I really like {{chapter.title}} Chapter in the {{guide.title}} Launch Guide!" data-hashtags="{{chapter.slug}}" data-size="large">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			-->
		</div>
	</div>
</div>