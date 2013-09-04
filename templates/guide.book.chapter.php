{% include 'partials/header.php' %}
{% include 'partials/nav.php' %}

			<div class="sixteen columns">
				<div id="content-container">


					



					<!-- CHAPTER HEADING -->
					<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
						<div class="container chapterHeader">

							<div class="row">
								<h2 class="chapterTitle" data-title="{{chapter.title}}"><span>Chapter {{ loop.index }}</span> {{chapter.title}}</h2>

								<div class="sidebar five columns alpha col-md-5">
									&nbsp;
									<div class="hide">
										{% include 'partials/ip-tool.php' %}
									</div>
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







