			<!-- PAGE SECTION -->
			{% for page in chapter.children %}
			<div id="{{page.slug}}" class="page-container" ng-repeat="page in chapter.children">
				<div class="container">
					<div class="row">
						<div class="sidebar five columns alpha col-md-4">
							{% if page.meta.iptool %}

								{% include 'partials/ip-tool.php' %}
							{% else %}
							
							{% endif %}
						</div>
						<div class="page-content col-md-11 col-md-offset-1">
							<h4 class=""><span>{{loop.index}}</span> {{page.title}}</h4>
							{{page.content | raw}}
							
							{% if page.meta.contentNotes %}
								<div class="notice-container">
									<h4>Additional Notes</h4>
									<ul class="notice">
										{% for note in page.meta.contentNotes %}
								    		<li class="{{note.type}}">{{note.text | raw}}</li>
								    	{% endfor  %}
									</ul>
								</div>
							{% else %}
							
							{% endif %}
							<div markdown="page.content" parent="page" ng-bind-html-unsafe="markdown"></div>
						</div><!-- steps -->
					</div>
				</div>
			</div>
			{%endfor%}