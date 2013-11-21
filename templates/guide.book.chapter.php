{% include 'partials/header.php' %}
<div id="content-container">
	<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
		
		<!-- {% include 'partials/chapter.code.php' %} -->
		{% include 'partials/chapter.page.php' %}
	</div>
	<div class="chapter-actions container">
		<p>
			{% if chapter.previous %}			
				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.previous.slug}}" class="action-previous" title=""><span class="glyphicon glyphicon-circle-arrow-left"></span><em>Previous:</em> {{chapter.previous.title}}</a>
			{% endif %}
			{% if chapter.next %}			
				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.next.slug}}" class="action-next" title=""><em>Next:</em> {{chapter.next.title}}<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
			{% endif %}
		</p>
	</div>	
</div>

{% include 'partials/footer.php' %}







