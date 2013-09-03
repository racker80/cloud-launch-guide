{% include 'partials/header.php' %}
{% include 'partials/nav.php' %}

<section class="container">
	<div class="sixteen columns">
				<div id="content-container">
					<div id="book-header-image">
						<img src="{{guide.images[0].url}}">
					</div>

					<div class="row">
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
								<p><a href="/guides/{{guide.slug}}/{{guide.children[0].slug}}" class="btn btn-primary btn-lg btn-block" title="">Get Started</a></p>
							</div>				
							
						</div>
					</div>
															
					<!-- MOAR CONENT HUR -->
					
				</div>
			</div>


</section>


{% include 'partials/footer.php' %}







