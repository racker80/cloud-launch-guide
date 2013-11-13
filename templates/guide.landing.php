{% include 'partials/header.php' %}
{% include 'partials/nav.php' %}

<div id="content-container">
	<div class="chapter-list container">
		{% for book in guide.children %}
		<div class="chapter-list-row row">
			<div class="chapter-list-overview col-md-11">
				<h3>{{book.title}}</h3>
				<p class="chapterTime">{{book.time}}</p>
				<p class="chapterDesc">{{book.description}} &nbsp;</p>
				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}" class="btn-rs medium green flat round4 caret-icon" title="">Start this section</a>
			</div>
			<div class="chapter-list-options col-md-5">
				<h4>Section chapters</h4>
				<ul class="list-unstyled">
					{% for chapter in book.children %}
						<li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}">{{chapter.title}}</a></li>
					{% endfor %}
				</ul>
			</div>
		</div>
		{%endfor%}
	</div>
	
	<!-- MOAR CONENT HUR -->
</div>

{% include 'partials/footer.php' %}
