<?php
	include("includes/header.php");

	if(isset($_SESSION['error_message'])){
		echo $_SESSION['error_message'];
	}
?>
<div id="flight_search_container">
    <form onsubmit = "return false" id = "search_form" method="post">
        <h3>Search Flight: </h3>
        <input type = "text" id = "fid_search" name="via_id" placeholder="Flight Id"/><br/>
        <input type = "text" id = "forigin_search" name="via_origin" placeholder="Origin"/><br/>
        <input type = "text" id = "fdestination_search" name="via_destination" placeholder="Destination"/><br/>
        <input type = "date" id = "ftime_departure_search" name="via_time_departure"/><br/>
        <input type = "date" id = "ftime_arrival_search" name="via_time_arrival"/><br/>
        <input type = "submit" id = "search_customer_submit" name = "search" value="Search"/><br/>
    </form>
</div>
<div id="flights_div"></div>

<?php
    include("/js/search.php");
	include("includes/footer.php");
?>