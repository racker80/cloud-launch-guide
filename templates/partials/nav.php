<div id="waypoint-header">
	<div class="guide-menu-wrapper">
		<div class="navbar container navbar-inverse" role="navigation">
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav crumbs">
					<li><a href="{{ baseurl }}/"><img src="{{ baseurl }}/includes/images/logo-cloud-launch-guide.svg" style="height:20px; width:auto;" /></a></li>
					<li class="show-this"><a href="{{ baseurl }}/guides/{{guide.slug}}">Guide Overview  <span>&#187;</span></a></li>
					{% if chapter %}
						<li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">{{book.title}}  <span>&#187;</span></a></li>
						<li class="selected">{{chapter.title}}</li>
					{% else %}
						<li class="selected">{{book.title}}</li>
						<li class="currentChapter">:<em></em></li>
					{% endif %}
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="navbar-options">
						{% include 'partials/action-options.php' %}
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
		<div class="nav-drawer-container">
			{% include 'partials/nav.drawer.php' %}
		</div>
	</div>
</div>





