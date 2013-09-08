{% include 'partials/header.php' %}
{% include 'partials/nav.php' %}

	<div id="">



		<div class="container">
			
			<section class="chapter-list container">
				{% for book in guide.children %}
				<div class="row">
					<div class="col-md-11">
						<h3>{{book.title}}</h3>
						<p class="lead">{{book.description}} &nbsp;</p>
						<p>time: <strong>{{book.time}}</strong></p>
						
					</div>


					<div class="col-md-5">
						Get Started:<br>
						<div class="list-options btn-group ">

							<a href="{{baseurl}}/guides/{{guide.slug}}/{{book.slug}}/{{book.children[0].slug}}" class="btn btn-default title-btn">
							{{book.children[0].title}}
							</a>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<b class="caret"></b>
							</button>
							<ul class="dropdown-menu">
								{% for chapter in book.children %}
								<li><a href="{{baseurl}}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}">{{chapter.title}}</a></li>
								{% endfor %}
							</ul>					
						</div>


					</div>
				</div>

				{%endfor%}
			</section>



			<div class="row hide">
				{% for book in guide.children %}
					<div class="col-md-4">
						<div class="book-casing panel panel-default">
							<div class="panel-heading"><h2>{{loop.index}}) {{book.title}}</h2></div>
							<div class="panel-body">
								<p class="lead">{{book.description}}</p>
								<p>time: <strong>{{book.time}}</strong></p>
								<hr>
								<a href="{{baseurl}}/guides/{{guide.slug}}/{{book.slug}}" class="btn btn-primary btn-lg btn-block">Start</a>

							</div>
						</div>
					</div>

				{% endfor  %}
				

			</div>

		</div>





		<div id="book-header-image">
			<!-- <img src="{{guide.images[0].url}}"> -->
		</div>

		<div class="row hide">
			<div class="sidebar five columns alpha col-md-5">
				<aside id="well-time" class="home">
					Guide Time: <span>{{ guide.time }}</span>
				</aside> <!-- sidebar-well-time -->

				{% for book in guide.children %}
				<aside id="well-section" ng-repeat="book in guide.children">
					{{book.title}} <span>Completion Time: {{book.time}}</span>
				</aside>
				{% endfor %}

			</div>
			<div class="eleven columns omega col-md-11">
				<h2>Overview</h2>
				

				{{ guide.content | raw }}


				<hr>
				{% for book in guide.children %}
				<section ng-repeat="book in guide.children">
					<h3>{{book.title}}</h3>
					{{book.description}}
				</section>
				{% endfor %}

				<hr>
				<div class="notice help">
					<h4>One Last Thing:</h4>
					<p>You can remove all the detailed explanations and just get down to the brass tacks with <strong>Expert Mode</strong>. <a href="">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>		
				<hr>
				<div style="text-align:center;">
					<p><a href="{{baseurl}}/guides/{{guide.slug}}/{{guide.children[0].slug}}" class="btn btn-primary btn-lg btn-block" title="">Get Started</a></p>
				</div>				
				
			</div>
		</div>
		
		<!-- MOAR CONENT HUR -->
		
	</div>


{% include 'partials/footer.php' %}
