<div class="chapter-code-wrapper actionOverview hide">
	
	<div class="page-content-code container">
		<div class="row">
			<div class="page-content col-md-11">
				<h3 class="page-title"><span>{{loop.index}}</span> {{page.title}}</h4>
				{% for code in page.code %}
				<div class="code">
					<ul class="list-unstyled">
						<li><pre class="{{code.type}}">{{code.text}}</pre></li>
					</ul>
				</div>
				{% endfor %}
			</div>
			<div class="sidebar col-md-4 col-md-offset-1">
				{% if page.meta.iptool %}
				    {% include 'partials/ip-tool.php' %}
				{% else %}
				
				{% endif %}
			</div>
		</div>
	</div>
</div>


