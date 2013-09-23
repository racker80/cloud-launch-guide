			<div class="chapter-code-wrapper actionOverview hide">
				<div class="container">
					<div class="row">
						<div class="sidebar five columns alpha col-md-4">

						</div>
						<div class="page-content col-md-11 col-md-offset-1">
							<h4 class="page-title"><span>{{loop.index}}</span> {{page.title}}</h4>

						</div><!-- steps -->
					</div>
				</div>
				
				{% for code in page.code %}
				<div class="page-content-code container">
					<div class="row">
						<div class="sidebar col-md-4">
							{% if code.iptool %}
							    {% include 'partials/ip-tool.php' %}
							{% else %}
							
							{% endif %}
						</div>
						<div class="page-content col-md-11 col-md-offset-1">
							<div class="code">
								<ul class="list-unstyled">
									<li><pre class="{{code.type}}">{{code.text}}</pre></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				{%endfor%}

			</div>


