		<footer>
			<div id="basement-wrapper">
				<div id="basement-container" class="clearfix">
					<div id="basement-copyright">
						<p>&#169; 2013 <a href="http://http://www.rackspace.com">Rackspace</a>, US Inc.</p>
					</div>
					<nav id="basement-nav">
						<a href="http://www.rackspace.com/about/">About Rackspace</a>
						<a href="http://www.rackspace.com/information/legal/websiteterms">Website Terms</a>
						<a href="http://www.rackspace.com/information/legal/privacystatement">Privacy Statement</a>
					</nav>
				</div>
			</div>
		</footer>
		
		<!-- Feedback form -->
		
		<div class="feedback-container" id="dialog-feedback">
			<h3>We love <strong>feedback</strong>.</h3>
			<p>Help us make this site better for you. Fill out this form and your feedback will go directly to the Cloud Launch Guide team.</p>
	
			<form action="" method="post" id="feedbackForm">
				<dl class="form-container">
					<dt><label for="feedbackwhat">What could we do?</label></dt>
				    <dd><textarea class="form-control" id="feedbackwhat" name="feedbackwhat" placeholder="Required" required></textarea></dd>
				    <dt><label for="feedbackhow">How might this help you?</label></dt>
				    <dd><textarea class="form-control" id="feedbackhow" name="feedbackhow" placeholder="Required" required></textarea></dd>
				    <dt><label for="feedbackEmail">Email address <span>(We will never share this.)</span></label></dt>
				    <dd><input type="email" class="form-control" id="feedbackEmail" name="feedbackEmail" placeholder="Optional"></dd>
				</dl>
				<div class="form-actions">
					<button type="submit">Submit feedback</button>
				</div>
			</form>
		</div>
				
		<!-- Coming soon modal -->
		
		<div class="comingsoon-container" id="dialog-comingsoon">
			<h3>This guide is <strong>coming soon</strong>.</h3>
			<p>Thanks for your interest. We're working hard on the next round of Cloud Launch Guides. Want to see something particular higlighted in this guide? <a href="mailto:cloudlaunchguide@rackspace.com?subject=I have a suggestion for this guide">Send an email</a> to Cloud Launch Guides team.</p>
			<!-- <p>Thanks for your interest. We're working hard on the next round of Cloud Launch Guides. Sign up below for email updates about when new guides are available.</p> -->
			
			<!-- 
			<form action="" method="get" id="csForm" accept-charset="utf-8">
				<dl class="form-container">
					<dt><label for="csWhat">What would you like to see in this guide?</label></dt>
				    <dd><textarea class="form-control" id="csWhat" placeholder="Optional"></textarea></dd>
					
				    <dt><label for="csEmail">Email address <span>(We will never share this.)</span></label></dt>
				    <dd><input type="email" class="form-control" id="csEmail" placeholder="Required" required></dd>
				</dl>
				<div class="form-actions">
					<button type="submit">Sign up</button>
				</div>
			</form>
			-->
		</div>
		
		<!-- Quickstart modal -->
		
		<div class="video-quickstart-container" id="dialog-video">
			<iframe id="video-quickstart" width="740" height="460" src="//www.youtube.com/embed/RB5mqsubMlg?&showinfo=0&autoplay=0&rel=0&controls=1" frameborder="0" allowfullscreen></iframe>
		</div>		

		<script src="{{ baseurl }}/includes/bower_components/jquery/jquery.min.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/jquery/jquery.ui.min.js"></script>

		<script src="{{ baseurl }}/includes/bower_components/bootstrap/js/dropdown.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/zeroclipboard/ZeroClipboard.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/jquery-waypoints/waypoints.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/jquery-waypoints/shortcuts/sticky-elements/waypoints-sticky.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/jsPlumb/dist/js/jquery.jsPlumb-1.5.2.js"></script>
		<script src="{{ baseurl }}/includes/bower_components/Socialite-master/socialite.js"></script>
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
		
		<!-- BEGIN GOOGLE ANALYTICS -->
		<script type="text/javascript">
			var _gaq = _gaq || []; _gaq.push(["_setAccount", "UA-35639070-1"]); _gaq.push(["_trackPageview"]);
			
			(function() {
				var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true; ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
				var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		<!-- END GOOGLE ANALYTICS -->		

	</body>
</html>