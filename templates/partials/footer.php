		<footer>
			<div id="basement-wrapper">
				<div id="basement-container" class="clearfix">
					<div id="basement-copyright">
						<p>&#169; 2013 <a href="">Rackspace</a>, US Inc.</p>
					</div>
					<nav id="basement-nav">
						<a href="">About Rackspace</a>
						<a href="">Fanatical Support</a>
						<a href="">Hosting Solutions</a>
						<a href="">Investors</a>
						<a href="">Careers</a>
						<a href="">Privacy Statement</a>
						<a href="">Website Terms</a>
						<a href="">Sitemap</a>
					</nav>
				</div>
			</div>
		</footer>
		
		<!-- Feedback form -->
		
		<div class="feedback-container" id="dialog-feedback">
			<h3>We love feedback.</h3>
			<p>Help us make this site better for you. Fill out this form and your feedback will go directly to the Cloud Launch Guide team.</p>
	
			<form action="" method="post" accept-charset="utf-8">
				<div class="form-container">
				    <label for="what">What could we do?</label>
				    <textarea class="form-control" id="what" placeholder="Required"></textarea>
				    <label for="how">How might this help you?</label>
				    <textarea class="form-control" id="how" placeholder="Required"></textarea>
				    <label for="emailAddress">Email address <span>(We will never share this.)</span></label>
				    <input type="email" class="form-control" id="emailAddress" placeholder="Optional">
				</div>
				<div class="form-actions">
					<button type="submit">Submit feedback</button>
				</div>
			</form>
		</div>
		
		<!-- Coming soon modal -->
		
		<div class="comingsoon-container" id="dialog-comingsoon">
			<h3>This guide is coming soon.</h3>
			<p>Thanks for your interest. We're working hard on the next round of Cloud Launch Guides. Sign up below for email updates about when new guides are available.</p>
			
			<form action="" method="post" accept-charset="utf-8">
				<div class="form-container">
				    <label for="emailAddress">Email address <span>(We will never share this.)</span></label>
				    <input type="email" class="form-control" id="emailAddress" placeholder="Optional">
				</div>
				<div class="form-actions">
					<button type="submit">Sign up</button>
				</div>
			</form>
			
		</div>
		

		<script src="{{ baseurl }}/includes/bower_components/jquery/jquery.min.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/jquery/jquery.ui.min.js"></script>

		<script src="{{ baseurl }}/includes/bower_components/bootstrap/js/dropdown.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/zeroclipboard/ZeroClipboard.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/jquery-waypoints/waypoints.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/jquery-waypoints/shortcuts/sticky-elements/waypoints-sticky.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/jsPlumb/dist/js/jquery.jsPlumb-1.5.2.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/Socialite-master/socialite.js"></script>
		<script src="{{ baseurl }}/includes/js/feedmagnet.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/move.js-master/move.js"></script>
		<script src="{{ baseurl }}/includes/js/main.js"></script>
		
		<script src="{{ baseurl }}/includes/js/other.js"></script>
		<script src="{{ baseurl }}/includes/js/jquery.validate.js"></script>

		<script type="text/javascript">
			function downloadJSAtOnload() {
				var element = document.createElement("script");
				element.src = "{{ baseurl }}/includes/js/main.js";
				document.body.appendChild(element);
			}	
			if (window.addEventListener)
				window.addEventListener("load", downloadJSAtOnload, false);
			else if (window.attachEvent)
				window.attachEvent("onload", downloadJSAtOnload);
			else window.onload = downloadJSAtOnload;
		</script>

	</body>
</html>