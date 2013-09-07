
<div id="waypoint-header">
    
    <div id="guide-nav-container" class="container">
        <div id="guide-navbar-bs" >
            
            <nav class="navbar navbar-inverse" role="navigation">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class="show-this"><a href="/guides/{{guide.slug}}">{{guide.title}}</a></li>
                        <li><a href="/guides/{{guide.slug}}/{{book.slug}}">{{book.title}}</a></li>
                        {% if chapter %}
                        <li><a href="/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}">{{chapter.title}}</a></li>

                        {%endif%}
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="navbar-options">
                            {% include 'partials/action-options.php' %}

                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>


            {% include 'partials/nav.drawer.php' %}


        </div>
    </div>



</div>




 
