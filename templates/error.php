{% include 'partials/header.php' %}

	<div id="content-container">

		<section class="chapter-list container">
			{% for chapter in book.children %}
				<div class="row">
					<div class="col-md-11">
						<h3>{{chapter.title}}</h3>
						<p class="lead">{{chapter.description}} &nbsp;</p>
					</div>

					<div class="col-md-3">
						30 minutes  
					</div>
					<div class="col-md-1">
						<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}" class="btn btn-primary btn-sm">Start Chapter</a>
					</div>
				</div>
			{%endfor%}
		</section>
	</div>

{% include 'partials/footer.php' %}







