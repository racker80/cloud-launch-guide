<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Cloud Launch Guides | Rackpace Hosting</title>	
	
	<link rel="stylesheet" href="{{ baseurl }}/includes/css/styles.css">
    	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>	
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	

	<script src="{{ baseurl }}/includes/bower_components/modernizr/modernizr.js"></script>	
	
	<!-- BEGIN GOOGLE ANALYTICS -->
	<script type="text/javascript">
		var _gaq = _gaq || []; _gaq.push(["_setAccount", "UA-35639070-1"]); _gaq.push(["_trackPageview"]);
		
		(function() {
			var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true; ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
			var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<!-- END GOOGLE ANALYTICS -->
	
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>		
	<![endif]-->		
		
</head>
<body ng-app="myApp">

<div id="navigation-conatiner">
	{% include 'partials/eyebrow.php' %}
	{% include 'partials/nav.global.php' %}
	{% if book is defined %}
		{% include 'partials/nav.subnav.php' %}
	{% endif %}
</div>
{% if chapter is defined %}
	{% include 'partials/banner.guide.chapter.php' %}
	{% include 'partials/nav.php' %}

{% elseif book is defined %}
	{% include 'partials/banner.guide.book.php' %}
	{% include 'partials/nav.php' %}

{% elseif guide is defined %}
	{% include 'partials/banner.guide.php' %}
	{% include 'partials/nav.php' %}

{% else %}
	{% include 'partials/banner.home.alt.php' %}
{% endif %}
