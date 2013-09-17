			<div class="container chapterHeader">
				<div class="row">

					<div class="sidebar col-md-4">
							<!-- <h4>Chapter 4{{ loop.index }}</h4>						 -->
							<h1 class="chapterTitle" data-title="{{chapter.title}}" data-slug="{{chapter.slug}}"><a href="{{ baseurl }}/guides/{{guide.slug}}/{{book.slug}}/{{chapter.slug}}">{{chapter.title}}</a></h1>
							<p>Time: <strong>15 min{{ chapter.time }}</strong></p>
							<a href="" class="btn btn-primary">Share on Twitter <span class="glyphicon glyphicon-share-alt"></span></a>

					</div>

					<div class="col-md-11 col-md-offset-1">
						<div class="lead">
							{{chapter.content|raw}}

						</div>
						{% if chapter.content is empty %}
						    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, nam ea incidunt unde fugit dignissimos suscipit. Repudiandae, culpa, dolorem, dolor corrupti odio est illum similique dignissimos aperiam praesentium debitis iusto!</p>
						{% else %}
						
						{% endif %}

					</div>
				</div>
				

				<hr>
			</div>