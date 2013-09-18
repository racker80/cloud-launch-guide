
    
    <div id="guide-nav-container">
            
            <nav id="brent-navbar" class="navbar navbar-inverse" role="navigation">
                <div class="container">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav crumbs">
                            <li><a href="{{ baseurl }}/guides/{{guide.slug}}">{{guide.title}} <span>&raquo;</span></a></li>
                            <li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">{{book.title}} {% if chapter %}<span>&raquo;</span>{%endif%}</a></li>
                            <li class="currentChapter"><a href="#"></a></li>
                            {% if chapter %}
                            <li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}">{{chapter.title}}</a></li>

                            {%endif%}
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="navbar-options">
                                {% include 'brent/action-options.php' %}

                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>


            {% include 'partials/nav.drawer.php' %}


    </div>




 
