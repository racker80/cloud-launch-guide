<nav id="globalnav-wrapper" class="navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ baseurl }}/"><span>Cloud Launch Guides</span> Powered by Rackspace</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right nav-pills">
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Guides <span class="caret"></span></a>
					<ul class="dropdown-menu">
					    <li role="presentation" class="dropdown-header">Unbox</li>
						{% for guide in guides %}
							<li><a href="{{ baseurl }}/guides/{{guide.slug}}">{{guide.title}}</a></li>	
						{% endfor %}
					    <li role="presentation" class="dropdown-header">Discover</li>
						{% for guide in guides %}
							<li><a href="{{ baseurl }}/guides/{{guide.slug}}">{{guide.title}}</a></li>	
						{% endfor %}
					</ul>
				</li>
				<!-- <li><a href="#">About</a></li> -->
				<li><a href="#">Feedback</a></li>
				<li><a href="https://www.rackspace.com/fanatical-support">Fanatical Support</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>