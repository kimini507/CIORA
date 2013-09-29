<div id="admin_nav">
	
	<a href="/user/log_out"><button class="btn">Logout</button></a>
	<?php
		if(!isset($_SESSION['status']) || $_SESSION['status'] != "flight_adder")
			echo '<a href="/viewer/add_flight_view"><button class="btn">Add Flight</button></a>'
	?>
</div>