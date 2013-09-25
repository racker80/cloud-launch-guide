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





<script src="{{ baseurl }}/includes/bower_components/jquery/jquery.js"></script>



<script src="{{ baseurl }}/includes/bower_components/bootstrap/js/dropdown.js"></script>
<script src="{{ baseurl }}/includes/bower_components/zeroclipboard/ZeroClipboard.js"></script>
<script src="{{ baseurl }}/includes/bower_components/jquery-waypoints/waypoints.js"></script>
<script src="{{ baseurl }}/includes/bower_components/jquery-waypoints/shortcuts/sticky-elements/waypoints-sticky.js"></script>
<script src="{{ baseurl }}/includes/bower_components/jsPlumb/dist/js/jquery.jsPlumb-1.5.2.js"></script>
<!-- <script src="{{ baseurl }}/includes/js/main.js"></script> -->



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