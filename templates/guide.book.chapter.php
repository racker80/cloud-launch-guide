{% include 'partials/header.php' %}

	<div id="content-container">


		<section class="chapter-intro container">
			<div class="page-header ">
				<h5><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">{{book.title}}</a></h5>
				<h1>{{chapter.title}} <small>{{chapter.time}}</small></h1>
				<div class="page-header-options">
					{% include 'partials/action-options.php' %}
				</div>
			</div>
			
			{% include 'partials/nav.drawer.php' %}
			
		</section>



		<!-- CHAPTER HEADING -->
		<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
			<div class="container chapterHeader">


				<div class="row">

					<div class="sidebar col-md-4">
						&nbsp;
						<div class="">
							<h5>Requires:</h5>
							{% if requires %}
								{% include 'partials/ip-tool.php' %}

							{% else %}
							
							{% endif %}
						</div>
					</div>

					<div class="col-md-11 col-md-offset-1">
						{{chapter.content|raw}}

						<div class="actionOverview hide">
							<ul>
								{% for code in chapter.code %}
									<li><pre class="{{code.type}}">{{code.text}}</pre></li>
								{%endfor%}
							</ul>
						
						</div>
					</div>

					
				</div>
				<hr>

			</div>
				<!-- PAGE SECTION -->
			{% for page in chapter.children %}
			<div id="{{page.slug}}" class="page-container" ng-repeat="page in chapter.children">
				<div class="container">
					<div class="row">
						<div class="sidebar five columns alpha col-md-4">
							&nbsp;


						</div>
						<div class="page-content col-md-11 col-md-offset-1">
							<h4 class=""><span>{{loop.index}}</span> {{page.title}}</h4>
							{{page.content | raw}}
							<div markdown="page.content" parent="page" ng-bind-html-unsafe="markdown"></div>
						</div><!-- steps -->
					</div>
				</div>
			</div>
			{%endfor%}
		</div> <!-- CHAPTER -->

		<hr>
		<div class="container">
			<p style="text-align:center;">
				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.previous.slug}}" class="btn btn-primary btn-lg" title="">Previous: {{chapter.previous.title}}</a>

				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.next.slug}}" class="btn btn-primary btn-lg" title="">Next: {{chapter.next.title}}</a>
			</p>
		</div>


		<!-- MOAR CONENT HUR -->
		
	</div>



{% include 'partials/footer.php' %}







