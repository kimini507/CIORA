<?php
	include("includes/header.php");

	if(isset($_SESSION['error_message'])){
		echo $_SESSION['error_message'];
	}

	if(!isset($_SESSION['logged_in'])){
		include("site_nav.php");
	}else{
		/*put what the admin can see here
			e.g. Nav bar for the admin	
		*/
		include("admin_views/admin_nav.php");
	}
?>
	
<?php
	include("includes/footer.php");
?>