{% include 'partials/header.php' %}

	<div id="content-container">

		<section class="book-intro container">
			<div class="page-header ">
				<h1>{{book.title}}: <small>1 Hour</small></h1>
				<div class="page-header-options">
					{% include 'partials/action-options.php' %}
				</div>
			</div>
			
			{% include 'partials/nav.drawer.php' %}

			<div class="intro-content">
				{{book.content|raw}}
			</div>
			
		</section>

		




		
		


		<!-- CHAPTER HEADING -->
		{% for chapter in chapters %}
			

					<!-- CHAPTER HEADING -->
		<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
			<div class="container chapterHeader">
				<hr>

				<div class="row">

					<div class="sidebar col-md-4"><br><br>
						<h4>Chapter {{ loop.index }}</h4>
						<p>Time: <strong>15 min{{ chapter.time }}</strong></p>

					</div>

					<div class="col-md-11 col-md-offset-1">
						<section class="chapter-intro ">
							<div class="page-header ">
								<h1 class="chapterTitle" data-title="{{chapter.title}}">{{chapter.title}} <small>{{chapter.time}}</small></h1>
								<div class="page-header-options">
									{% include 'partials/action-options-all.php' %}
								</div>
							</div>			
						</section>

						{{chapter.content|raw}}
						{% if chapter.content is empty %}
						    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, nam ea incidunt unde fugit dignissimos suscipit. Repudiandae, culpa, dolorem, dolor corrupti odio est illum similique dignissimos aperiam praesentium debitis iusto!</p>
						{% else %}
						
						{% endif %}

						<hr>

					</div>

					
				</div>



			</div>


			{% for code in chapter.code %}
			<div class="container">
				<div class="row actionOverview">
					<div class="sidebar col-md-4">
						{% if code.iptool %}
						    {% include 'partials/ip-tool.php' %}
						{% else %}
						
						{% endif %}
						
					</div>
					<div class="col-md-11 col-md-offset-1">
						<div class="">
							<ul class="list-unstyled">
								<li><pre class="{{code.type}}">{{code.text}}</pre></li>
							</ul>

						</div>
					</div>
				</div>
			</div>

			{%endfor%}

				<!-- PAGE SECTION -->
			{% for page in chapter.children %}
			<div id="{{page.slug}}" class="page-container" ng-repeat="page in chapter.children">
				<div class="container">
					<div class="row">
						<div class="sidebar five columns alpha col-md-4">
							&nbsp;

							{% if page.meta.iptool %}

								{% include 'partials/ip-tool.php' %}
							{% else %}
							
							{% endif %}
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

		{%endfor%}

		<hr>


</div>

		<!-- MOAR CONENT HUR -->
		



{% include 'partials/footer.php' %}







