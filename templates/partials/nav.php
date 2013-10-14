
<div id="waypoint-header">
        
        <div class="guide-menu-wrapper">

            <div class="navbar container navbar-inverse" role="navigation">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ baseurl }}/"><img src="{{ baseurl }}/includes/images/logo-cloud-launch-guide.png" style="height:20px; width:auto;" /></a></li>
                        <li class="show-this"><a href="{{ baseurl }}/guides/{{guide.slug}}">{{guide.title}}</a></li>
                        <li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">{{book.title}}</a></li>
                        <li class="currentChapter"><a href="#"></a></li>
                        {% if chapter %}
                        <li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}">{{chapter.title}}</a></li>

                        {%endif%}
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="navbar-options">
                            {% include 'partials/action-options.php' %}

                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

            <div class="nav-drawer-container">
                {% include 'partials/nav.drawer.php' %}
            </div>


        </div>

</div>




 
