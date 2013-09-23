{% include 'partials/header.php' %}

<br><br>

<div class="container">

{% for guide in guides %}
    <div class="row featurette">
        <div class="col-md-11">
          <h2 class="featurette-heading">{{guide.title}}</h2>
          <p class="lead">{{guide.description}}</p>
          <a href="{{ baseurl }}/guides/{{guide.slug}}" class="">Learn More &raquo;</a>
        </div>
        <div class="col-md-5">
            <a href="{{ baseurl }}/guides/{{guide.slug}}/{{guide.children[0].slug}}" class="btn btn-lg btn-primary">Start Guide</a>
         </div>
    </div>
        <hr class="featurette-divider">

{% endfor %}


</div>


{% include 'partials/footer.php' %}
