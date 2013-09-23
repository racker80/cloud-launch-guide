{% include 'partials/header.php' %}

	<div id="content-container">


		{% for chapter in chapters %}
		<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
			
			<!-- CHAPTER HEADING -->
			{% include 'partials/chapter.header.php' %}
			
			{% include 'partials/chapter.page.php' %}
		

		</div>
		{% endfor  %}
		


</div>

		<!-- MOAR CONENT HUR -->
		



{% include 'partials/footer.php' %}







