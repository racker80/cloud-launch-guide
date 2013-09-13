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

		




		<!-- BOOK HEADING -->
		<section class="container hide">
			<div class="row">
				<div class="sidebar five columns alpha col-md-5">
					<!-- <aside id="well-time">{{book.title}}: <span>1 hour</span></aside>  -->
					<aside id="chapters" > <!-- sidebar-contents -->
						<h3>Chapters</h3>
						<ol>
							{% for chapter in book.children %}
							<li ng-repeat="chapter in book.children"><a href="#{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}#{{chapter.slug}}">{{chapter.title}}</a></li>
							{%endfor%}
						</ol>
					</aside>
				</div>
				<div class="eleven columns omega col-md-11">
					<h3>{{book.longTitle}}</h3>

					<div ng-repeat="image in book.images | filter:{type:'heading'}">
						<img src="{{image.url}}">
					</div>

					{{book.content|raw}}
					{% for content in book.additionalContent %}
					<div ng-repeat="content in book.additionalContent">
						{{content.text|raw}}
						<div markdown="content.text" parent="content" ng-bind-html-unsafe="markdown"></div>
					</div>
					{%endfor%}
				</div>
			</div> 
		</section>
		


		<!-- CHAPTER HEADING -->
		{% for chapter in chapters %}
		<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
			<section class="chapter-intro container">
				<div class="page-header ">
					<h1 class="chapterTitle" data-title="{{chapter.title}}">{{chapter.title}} <small>{{chapter.time}}</small></h1>
					<div class="page-header-options">
						{% include 'partials/action-options-all.php' %}
					</div>
				</div>			
			</section>
			
					<!-- CHAPTER HEADING -->
		<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
			<div class="container chapterHeader">


				<div class="row">

					<div class="sidebar col-md-4">

					</div>

					<div class="col-md-11 col-md-offset-1">
						{{chapter.content|raw}}

					</div>

					
				</div>
				<hr>

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
							<ul>
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
		</div> <!-- CHAPTER -->

		{%endfor%}

		<hr>


</div>

		<!-- MOAR CONENT HUR -->
		



{% include 'partials/footer.php' %}







