{% include 'partials/header.php' %}

	<div id="content-container">

<!-- 		<section class="book-intro container">
			<div class="page-header ">
				<h1>{{book.title}}: <small>1 Hour</small></h1>
				<div class="page-header-options">
					{% include 'partials/action-options.php' %}
				</div>
			</div>
			
			{% include 'partials/nav.drawer.php' %}

			<div class="intro-content">
				{{book.content|raw}}
			</div>
			
		</section> -->

		




		
		


		<!-- CHAPTER HEADING -->
		{% for chapter in chapters %}
			

					<!-- CHAPTER HEADING -->
		<div id="{{chapter.slug}}" class="chapter-container" ng-repeat="chapter in book.children">
<!-- 					<section class="chapter-intro container">
			<div class="page-header ">
				<h5><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">&laquo; {{book.title}}</a> : Chapter {{loop.index}} of {{loop.length}}</h5>
				<div class="page-header-options">
				</div>
			</div>
			
			
		</section> -->
			
			{% include 'partials/chapter.header.php' %}
			
			{% include 'partials/chapter.code.php' %}

			{% include 'partials/chapter.page.php' %}
		

		</div>

		{% endfor  %}
		


</div>

		<!-- MOAR CONENT HUR -->
		



{% include 'partials/footer.php' %}







