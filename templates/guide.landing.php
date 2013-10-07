{% include 'partials/header.php' %}
{% include 'partials/nav.php' %}

	<div id="content-container">
			
			<div class="chapter-list container">
				{% for book in guide.children %}
				
				<div class="chapter-list-row row">
					<div class="chapter-list-options col-md-5">

						<ul class="list-unstyled">
								{% for chapter in book.children %}
								<li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}">{{chapter.title}}</a></li>
								{% endfor %}
							</ul>
												


					</div>

					<div class="chapter-list-overview col-md-11">
						<h3>{{book.title}}</h3>
						<p>time: <strong>{{book.time}}</strong></p>
						<p class="lead">{{book.description}} &nbsp;</p>
						<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}" class="btn btn-primary">
							Start Section &raquo;
						</a>


					</div>



				</div>

				{%endfor%}
			</div>

		
		<!-- MOAR CONENT HUR -->
		
	</div>


{% include 'partials/footer.php' %}
