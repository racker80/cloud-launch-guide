{% include 'partials/header.php' %}

	<div id="content-container">

<!-- 
		<section class="chapter-intro container">
			<div class="page-header ">
				<h5><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">&laquo; {{book.title}}</a></h5>
				<div class="page-header-options">
					{% include 'partials/action-options.php' %}
				</div>
			</div>
			
			{% include 'partials/nav.drawer.php' %}
			
		</section>
		
 -->		


		<!-- CHAPTER HEADING -->
		<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
			
			{% include 'partials/chapter.header.php' %}

			{% include 'partials/chapter.code.php' %}


			{% include 'partials/chapter.page.php' %}


		</div> <!-- CHAPTER -->

		<hr>
		
		<div class="container">
			<p style="text-align:center;">
				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.previous.slug}}" class="btn btn-primary btn-lg" title="">Previous: {{chapter.previous.title}}</a>

				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.next.slug}}" class="btn btn-primary btn-lg" title="">Next: {{chapter.next.title}}</a>
			</p>
		</div>


		<!-- MOAR CONENT HUR -->
		
	</div>



{% include 'partials/footer.php' %}







