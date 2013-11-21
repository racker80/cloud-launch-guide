<!-- PAGE SECTION: Chapter header -->
<div class="container chapter-header-wrapper">
	<div class="row">
		<div class="col-md-11">
			<h2 class="chapterTitle" data-title="{{chapter.title}}" data-slug="{{chapter.slug}}"> {{chapter.title}}</h2>
			<div class="chapterUtility clearfix">
				<p class="chapterCount"><span class="glyphicon glyphicon-bookmark"></span>Chapter {{chapter.index}} of {{chapter.indexOf}}</p>
				{% if chapter.time is empty %}
					<p class="chapterTime"><span class="glyphicon glyphicon-time"></span>Not specified</p>
				{% else %}
					<p class="chapterTime"><span class="glyphicon glyphicon-time"></span>{{ chapter.time }}</p>
				{% endif %}
				<p class="chapterLink"><span class="glyphicon glyphicon-link"></span><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}">permalink</a></p>
			</div>
			
			<div class="chapterIntro">{{chapter.content|raw}}</div>
			{% if chapter.content is empty %}
				<p>This chapter needs some content, yo.</p>
				{% else %}
			{% endif %}
		</div>
		<div class="col-md-4 col-md-offset-1"></div>
	</div>
</div>