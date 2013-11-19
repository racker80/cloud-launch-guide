{% include 'partials/header.php' %}

<div id="content-container">
{% for chapter in chapters %}
    <div class="chapter-container">
		{% include 'partials/chapter.header.php' %}
		<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
			<!-- CHAPTER HEADING -->
			{% include 'partials/chapter.page.php' %}
		</div>
	</div>
{% endfor  %}
</div>

{% include 'partials/footer.php' %}