{% include 'partials/header.php' %}

	<div id="content-container">

		<!-- CHAPTER HEADING -->
		<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
			
			{% include 'partials/chapter.code.php' %}

			{% include 'partials/chapter.page.php' %}

		</div> <!-- CHAPTER -->

		<div class="container">
			<p style="text-align:center;">
				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.previous.slug}}" class="btn btn-primary btn-lg" title="">Previous: {{chapter.previous.title}}</a>

				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.next.slug}}" class="btn btn-primary btn-lg" title="">Next: {{chapter.next.title}}</a>
			</p>
		</div>


		<!-- MOAR CONENT HUR -->
		
	</div>



{% include 'partials/footer.php' %}







