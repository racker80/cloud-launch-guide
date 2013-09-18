	<div id="brent-action-options" class="action-options btn-group btn-group-sm">
		
		{% if allsteps %}
		    <a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}" class="btn btn-default btn-warning allSteps allStepsOn">
				<span class="glyphicon glyphicon-th-list"></span> All Steps
			</a>
		{% else %}
			<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/all{{chapterslug}}" class="btn btn-default allSteps">
				<span class="glyphicon glyphicon-th-list"></span> All Steps
			</a>
		{% endif %}
		    
			
		<a href="#" data-toggle-expert class="btn btn-default">
			<span class="glyphicon glyphicon-saved"></span> Expert Mode
		</a>
		<a href="#" data-toggle-nav class="btn btn-default">
			Index <span class="caret"></span>
		</a>
		{% if chapter and chapter.next %}
		    <a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.next.slug}}" class="btn btn-default">
				<span class="glyphicon glyphicon-arrow-right"></span>
			</a>
		{% elseif allsteps %}
			<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.next.slug}}/all" class="btn btn-default">
				<span class="glyphicon glyphicon-arrow-right"></span>
			</a>
		{% else %}
			<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.next.slug}}" class="btn btn-default">
				<span class="glyphicon glyphicon-arrow-right"></span>
			</a>
		{% endif %}
		
	</div>