	<!-- A cool example of what we can do with base bootstrap styles -->
	<!-- remove the 'hide' class to see it -->
	<div class="panel panel-default widget">
		<!-- Default panel contents -->
		<div class="panel-heading">Code IP Address <button type="button" class="close" aria-hidden="true">&times;</button></div>
		
		<div class="widgetSection">


			<!-- Table -->
			<div class="ip-table">
				<h5>Master Server Public IP:</h5>
				<div class="current-ip">
					<span class="your-master-public-ip-address">12.23.432.234</span> <a href="#" class="edit">edit</a>
				</div>
				<div class="edit-ip">
					<input type="text" class="text" data-ip-input="your-master-public-ip-address"> <a href="#" class="save">save</a>
				</div>
			</div>

			<div class="ip-table">
				<h5>Clone Server Private IP:</h5>
				<div class="current-ip">
					<span class="your-clone-private-ip-address">12.23.432.234</span> <a href="#" class="edit">edit</a>
				</div>
				<div class="edit-ip">
					<input type="text" class="text" data-ip-input="your-clone-private-ip-address"> <a href="#" class="save">save</a>
				</div>
			</div>


			<div class="panel-footer">
				<p>Enter your master public and private IP addresses to update terminal commands listed in this section!</p>
			</div>
		</div>

		
		
	</div>