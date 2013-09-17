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