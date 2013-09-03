{% include 'partials/header.php' %}


<section ui-view="guideNav"></section>


<table class="table">
	<tbody>

		{% for guide in guides %}
			
			<tr>
				<td>
					<a href="/guides/{{guide.slug}}">{{guide.title}}</a>
				</td>
			</tr>
			
		{% endfor %}
		
	</tbody>
</table>


{% include 'partials/footer.php' %}
