{% include 'partials/header.php' %}
{% include 'partials/nav.php' %}

	<div id="">



		<div class="container">
			
			<section class="chapter-list container">
				{% for book in guide.children %}
				<div class="row">
					<div class="col-md-11">
						<h3><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">{{book.title}}</a></h3>
						<p class="lead">{{book.description}} &nbsp;</p>
						<p>time: <strong>{{book.time}}</strong></p>
						
					</div>


					<div class="col-md-5">
						Get Started:<br>
						<div class="list-options btn-group ">

							<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{book.children[0].slug}}" class="btn btn-default title-btn">
							{{book.children[0].title}}
							</a>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<b class="caret"></b>
							</button>
							<ul class="dropdown-menu">
								{% for chapter in book.children %}
								<li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}">{{chapter.title}}</a></li>
								{% endfor %}
							</ul>					
						</div>


					</div>
				</div>

				{%endfor%}
			</section>


		</div>

		
		<!-- MOAR CONENT HUR -->
		
	</div>


{% include 'partials/footer.php' %}
