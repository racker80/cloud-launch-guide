{% include 'partials/header.php' %}
{% include 'partials/nav.php' %}

			<div class="sixteen columns">
				<div id="content-container">

					<!-- BOOK HEADING -->
					<section class="container">
						<div class="row">
							<div class="sidebar five columns alpha col-md-5">
								<aside id="well-time">{{book.title}}: <span>1 hour</span></aside> <!-- sidebar-well-time -->
								<aside id="chapters" > <!-- sidebar-contents -->
									<h3>Chapters</h3>
									<ol>
										{% for chapter in book.children %}
										<li ng-repeat="chapter in book.children"><a href="#/guides/{{guide.slug}}/{{book.slug}}#{{chapter.slug}}">{{chapter.title}}</a></li>
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
					{% for chapter in book.children %}
					<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
						<div class="container chapterHeader">

							<div class="row">
								<h2 class="chapterTitle" data-title="{{chapter.title}}"><span>Chapter {{ loop.index }}</span> {{chapter.title}}</h2>

								<div class="sidebar five columns alpha col-md-5">
									&nbsp;
									{% include 'partials/ip-tool.php' %}

								</div>

								<div class="eleven columns omega col-md-11">
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
						</div>
						
							<!-- PAGE SECTION -->
						{% for page in chapter.children %}
						<div id="{{page.slug}}" class="page-container" ng-repeat="page in chapter.children">
							<div class="container">
								<div class="row">
									<div class="sidebar five columns alpha col-md-5">
										&nbsp;


									</div>
									<div class="page-content col-md-11" >
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
					<div class="container">
						<p style="text-align:center;">
							<a href="#/guides/{{guide.slug}}/{{prevBook.slug}}" class="btn btn-primary btn-lg" title="">Previous: {{prevBook.title}}</a>

							<a href="#/guides/{{guide.slug}}/{{nextBook.slug}}" class="btn btn-primary btn-lg" title="">Next: {{nextBook.title}}</a>
						</p>
					</div>


					<!-- MOAR CONENT HUR -->
					
				</div>
			</div>



{% include 'partials/footer.php' %}







