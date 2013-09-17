            <div class="nav-index-wrapper">
                <div class="container nav-index-container">
                        <div class="nav-index" class="clearfix">
                            {% for book in guide.children %}
                            <nav class="nav-thing" ng-repeat="book in guide.children">
                                <h5><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}">{{book.title}}</a></h5>
                                <ul>
                                {% for chapter in book.children %}
                                    <li><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}" class="">{{chapter.title}}</a></li>
                                {% endfor %}
                                </ul>
                            </nav>
                            {% endfor %}

                        </div>
                </div>
                <div class="nav-index-utility-wrapper">
                    <div class="container nav-index-utility-container">
                        <div class="nav-index-utility">
                            <div class="onoffswitch">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked/>
                                <label class="onoffswitch-label" for="myonoffswitch">
                                    <div class="onoffswitch-inner"></div>
                                    <div class="onoffswitch-switch"></div>
                                </label>
                            </div>
                            <p class="label">Expert mode</p>
                        </div>
                    </div>
                </div>
            </div>