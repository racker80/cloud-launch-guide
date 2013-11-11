<nav id="globalnav-wrapper" class="navbar navbar-default container" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ baseurl }}/"><img src="{{ baseurl }}/includes/images/logo-cloud-launch-guide.png" /> Cloud Launch Guide</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right nav-pills">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Guides <b class="caret"></b></a>

					<ul class="dropdown-menu">
						{% for guide in guides %}
						<li><a href="{{ baseurl }}/guides/{{guide.slug}}">{{guide.title}}</a></li>	
						{% endfor %}
					</ul>
				</li>
				<li><a href="#">About</a></li>
				<li><a href="#">Feedback</a></li>
				<li><a href="#">Managed Support</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
</nav>