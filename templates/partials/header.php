<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>Cloud Launch Guide | Rackpace Hosting</title>
	
	<link rel="stylesheet" href="{{ baseurl }}/includes/css/styles.css">

    <script src="{{ baseurl }}/includes/bower_components/modernizr/modernizr.js"></script>	

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>


<body ng-app="myApp">

{% include 'partials/eyebrow.php' %}

<div id="waypoint-header">


{% include 'brent/banner.php' %}

{% if guide %}
	{% include 'brent/nav.php' %}

{% else %}

{% endif %}

</div>


{% if guide %}

{% else %}
	<br>
	<br>
{% endif %}
