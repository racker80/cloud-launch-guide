{% include 'partials/header.php' %}
	<style type="text/css" media="screen">
		#banner-wrapper {display: none;}
		#content-container .container {height: 150px; margin: 50px auto; padding: 10px;}
		#content-container .container p {font-size: 16px;}
	</style>
	<div id="content-container">

		<section class="container">
			<h3>Oops! Something went wrong.</h3>
			<p>A website error has occured. Sorry for the temporary inconvenience.</p>
			<p>Try heading back to the <a href="{{ baseurl }}/">home page</a>.</p>
		</section>
	</div>
{% include 'partials/footer.php' %}