{% include 'partials/header.php' %}
{% include 'partials/banner.quickstart.php' %}

<div class="container" id="content-container">
<div class="row category-content">
	<div class="col-md-5">
		<div class="category-header">
			<div class="card-badge"><img src="{{ baseurl }}/includes/images/badge-build.png" /></div>
			<h2>Unbox</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>
	<div class="col-md-11">
		{% for guide in guides %}
		<div class="guide-card">
			<h3>{{guide.title}}</h3>
			<p class="guide-actions">
				<a href="{{ baseurl }}/guides/{{guide.slug}}" class="guide-actions-learn">Learn More</a>
				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{guide.children[0].slug}}" class="guide-actions-start">Start Guide</a>
			</p>
		</div>
		{% endfor %}
	</div>
</div>

<div class="row category-content">
	<div class="col-md-5">
		<div class="category-header">
			<div class="card-badge"><img src="{{ baseurl }}/includes/images/badge-build.png" /></div>
			<h2>Discover</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>
	<div class="col-md-11">
		{% for guide in guides %}
		<div class="guide-card">
			<h3>{{guide.title}}</h3>
			<p class="guide-actions">
				<a href="{{ baseurl }}/guides/{{guide.slug}}" class="guide-actions-learn">Learn More</a>
				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{guide.children[0].slug}}" class="guide-actions-start">Start Guide</a>
			</p>
		</div>
		{% endfor %}
	</div>
</div>

<div class="row category-content">
	<div class="col-md-5">
		<div class="category-header">
			<div class="card-badge"><img src="{{ baseurl }}/includes/images/badge-build.png" /></div>
			<h2>Build</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>
	<div class="col-md-11">
		{% for guide in guides %}
		<div class="guide-card">
			<h3>{{guide.title}}</h3>
			<p class="guide-actions">
				<a href="{{ baseurl }}/guides/{{guide.slug}}" class="guide-actions-learn">Learn More</a>
				<a href="{{ baseurl }}/guides/{{guide.slug}}/{{guide.children[0].slug}}" class="guide-actions-start">Start Guide</a>
			</p>
		</div>
		{% endfor %}
	</div>
</div>
</div>

{% include 'partials/footer.php' %}
