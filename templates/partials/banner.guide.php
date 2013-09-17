<div id="banner-content" class="jumbotron" >
	<div class="container">
		<div class="row">

			<div class="page-header">

				<h1 class="guideTitle">{{guide.title}}</h1>
				<h2>{{book.title}}</h2>
				<div class="lead">
					{{book.description | raw}}
				</div>
				
				<div class="page-header-options">
					{% include 'partials/action-options.php' %}
				</div>
				{% include 'partials/nav.drawer.php' %}

			</div>
			
		</div>

	</div>
</div>
	<progress id="header-progress" value="20" max="100"></progress>
