<!-- <progress id="header-progress" value="00" max="100"></progress> -->

<div class="guide-menu-wrapper">
	<div class="navbar container navbar-inverse" role="navigation">
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav crumbs">
				<li class=""><a href="{{ baseurl }}/guides/{{guide.slug}}">Guide Overview <span>&#187;</span></a></li>
				<li>Section: "{{book.title}}"</li>
				<!-- <li class="currentChapter"><a href="#"></a></li> -->
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