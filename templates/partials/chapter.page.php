<!-- PAGE SECTION: numbered section -->
{% for page in chapter.children %}
	<div id="{{page.slug}}" class="page-container" ng-repeat="page in chapter.children">
		<div class="page-content-full container">
			<div class="row">
				<div class="page-content col-md-11">
					<h3 class="page-title"><span>{{loop.index}}</span> {{page.title}}</h3>
					{{page.content | raw}}
					{% if page.meta.contentNotes %}
						{% for note in page.meta.contentNotes %}
							<div class="notice-container {{note.type}}">
								<h4>Additional Notes</h4>
									<p class="">{{note.text | raw}}</p>
							</div>
						{% endfor %}
						{% else %}
					{% endif %}
				</div><!-- steps -->
				
				<div class="sidebar col-md-4 col-md-offset-1">
					{% if page.meta.iptool %}
						{% include 'partials/ip-tool.php' %}
						{% else %}
					{% endif %}
				</div>
				
			</div>
		</div>
		{% if page.code is not empty %}
			{% include 'partials/page.code.php' %}
		{% endif %}
	</div>
{%endfor%}