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
						<li><a href="{{ baseurl }}/guides/securing-server" onClick="_gaq.push(['_trackEvent', 'Guides', 'Securing a Cloud Server’, 'Global nav']);">Securing a Cloud Server</a></li>	
					    <li role="presentation" class="dropdown-header">Discover</li>
						<li><a href="{{ baseurl }}/guides/one-to-many" onClick="_gaq.push(['_trackEvent', 'Guides', 'Moving from one server to multiple servers’, 'Global nav']);">Moving from one server to multiple servers</a></li>	
						<li><a href="{{ baseurl }}/guides/horizontal" onClick="_gaq.push(['_trackEvent', 'Guides', 'Horizontally scaling your Web layer’, 'Global nav']);">Horizontally scaling your Web layer</a></li>	
					    <li role="presentation" class="dropdown-header">Build</li>
						<li><a href="{{ baseurl }}/guides/wordpress" onClick="_gaq.push(['_trackEvent', 'Guides', 'CMS with WordPress’, 'Global nav']);">CMS with WordPress</a></li>	
					</ul>
				</li>
				<!-- <li><a href="#">About</a></li> -->
				<li><a href="#" class="dialog-f">Feedback</a></li>
				<!-- <li><a href="mailto:cloudlaunchguide@rackspace.com?subject=Cloud Launch Guides Feedback" class="tooltip-rs pointer" title="Send an email to the Cloud Launch Guides team" onClick="_gaq.push(['_trackEvent', 'Buttons', 'Click', 'Feedback’]);">Feedback</a></li> -->
				<li><a href="http://support.rackspace.com" onClick="_gaq.push(['_trackEvent', 'Buttons', 'Click', 'Fanatical Support’]);">Fanatical Support</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>