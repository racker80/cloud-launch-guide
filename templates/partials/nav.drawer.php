                <div class="container nav-index-container">
                        <div class="row">
                            {% for book in guide.children %}
                            <div class="nav-thing col-md-3" ng-repeat="book in guide.children">
                                <h5><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">{{book.title}}</a></h5>
                                <ul class="list-unstyled">
                                {% for chapter in book.children %}
                                    <li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}" class="">{{chapter.title}}</a></li>
                                {% endfor %}
                                </ul>
                            </div>
                            {% endfor %}

                        </div>
                </div>
