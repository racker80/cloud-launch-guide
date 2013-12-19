{% include 'partials/header.php' %}
{% include 'partials/nav.php' %}

<div id="content-container">
	<div class="book-list container">
		{% for book in guide.children %}
		<div class="book-list-row row">
			<div class="book-list-overview col-md-11">
				<h3>{{book.title}}</h3>
				<div class="bookUtility clearfix">
					<p class="bookTime"><span class="glyphicon glyphicon-time"></span>{{ book.time }}</p>
					<p class="bookLink"><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}"><span class="glyphicon glyphicon-link"></span>permalink</a></p>
				</div>
				
				<p class="bookDesc">{{book.description}} &nbsp;</p>
				<!-- <a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}" class="btn-rs medium green flat round4 caret-icon" title="">Start this section</a> -->
				<div class="bookStart-container">
					<p class="bookStart"><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">Start this book</a></p>
				</div>
			</div>
			<div class="book-list-options col-md-5">
				<h4>Chapters</h4>
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
