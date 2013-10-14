			<div class="chapter-code-wrapper actionOverview container">
				
				{% for code in chapter.code %}
				<div class="row">
					<div class="sidebar col-md-4"></div>
					<div class="page-content col-md-11 col-md-offset-1">
						<h4 class="page-title"><span>{{loop.index}}</span> {{code.title}}</h4>
					</div>
				</div>
					{% for code in code.code %}				
					<div class="row">
						<div class="sidebar col-md-4">
							{% if code.iptool %}
							    {% include 'partials/ip-tool.php' %}
							{% else %}
							
							{% endif %}
						</div>
						<div class="col-md-11 col-md-offset-1">
							<div class="code">
								<ul class="list-unstyled">
									<li><pre class="{{code.type}}">{{code.text}}</pre></li>
								</ul>
							</div>
						</div>
					</div>
					{% endfor  %}

				{%endfor%}
			</div>
