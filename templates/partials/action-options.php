<div class="action-options btn-group btn-group-sm">
	<!-- {% if allsteps %}
	    <a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}" class="btn btn-default btn-info-rs allSteps allStepsOn" onClick="_gaq.push(['_trackEvent', 'Buttons', 'Click', 'All Chapters’]);"><span class="glyphicon glyphicon-th-list"></span>All Chapters</a>
	{% else %}
		<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}{{chapterslug}}" class="btn btn-default allSteps" onClick="_gaq.push(['_trackEvent', 'Buttons', 'Click', 'All Chapters’]);"><span class="glyphicon glyphicon-th-list"></span>All Chapters</a>
	{% endif %} -->
	    
	<button type="button" data-toggle-expert class="btn btn-default tooltip-rs" title="Toggle imformative content" onClick="_gaq.push(['_trackEvent', 'Buttons', 'Click', 'Expert Mode’]);"><span class="glyphicon glyphicon-certificate"></span>Expert Mode</button>
	<button type="button" data-toggle-nav class="btn btn-default" >Guide Index<span class="caret"></span></button>
	{% if allsteps %}
		{% if book.next %}
			<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.next.slug}}" class="btn btn-default tooltip-rs" title="Next book"><span class="glyphicon glyphicon-chevron-right"></span></a>
		{% endif %}
	{% else %}
		{% if chapter and chapter.next %}
			<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.next.slug}}" class="btn btn-default tooltip-rs" title="Next chapter"><span class="glyphicon glyphicon-chevron-right"></span></a>
		{% else %}
			<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.next.slug}}" class="btn btn-default tooltip-rs" title="Next book"><span class="glyphicon glyphicon-chevron-right"></span></a>
		{% endif %}
	{% endif %}

</div>