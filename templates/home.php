{% include 'partials/header.php' %}
{% include 'partials/banner.quickstart.php' %}

<div class="container" id="content-container">
<div class="row category-content">
	<div class="col-md-5">
		<div class="category-header">
			<div class="card-badge-content unbox"></div>
			<h2>Unbox</h2>
			<p>If you are new to cloud technologies it can be difficult to understand where to start. <strong>Unbox</strong> guides aim at addressing these concerns. Follow along and learn the required skills to be successful in the cloud.</p>
		</div>
	</div>
	<div class="col-md-10 col-md-offset-1">
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
			<div class="card-badge-content discover"></div>
			<h2>Discover</h2>
			<p>Rackspace Cloud technologies enable new techniques for dealing with your applications infrastructure needs. <strong>Discover</strong> guides help you learn the fundamental techniques enabled by the cloud.</p>
		</div>
	</div>
	<div class="col-md-10 col-md-offset-1">
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
			<div class="card-badge-content build"></div>
			<h2>Build</h2>
			<p>Ever wonder how a Racker would execute a cloud architecture build out? Our <strong>Build</strong> guides are centered around exactly that. Follow along step by step during an example build out and configuration of a complex, scalable cloud environment.9</p>
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
