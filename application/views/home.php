<?php
	include("includes/header.php");

	if(isset($_SESSION['error_message'])){
		echo $_SESSION['error_message'];
	}
?>
<script type="text/javascript">
   
</script>
<div id="flight_search_container">
    <form onsubmit = "return false" id = "search_form" method="post">
        <h3>Search Flight: </h3>
        <div id="search_radio">
            <label for = "ow">One Way</label><input type = "radio" id = "ow" name = "flight_type" value = "one_way" checked = "checked"/>
            <label for = "rt">Round Trip</label><input type = "radio" id = "rt" name = "flight_type" value = "round_trip"/>
        </div>
        <label for = "">Passenger(s)</label><input type = "number" id = "fpassenger" name="passengers" value="1" min="1" max="10"/><br/>
        <div id ="search_info">
            <label for = "">Flight Id</label><input type = "text" id = "fid_search" name="via_id" placeholder="Flight Id"/><br/>
            <label for = "">Origin</label><input type = "text" id = "forigin_search" name="via_origin" placeholder="Origin"/><br/>
            <label for = "">Destination</label><input type = "text" id = "fdestination_search" name="via_destination" placeholder="Destination" /><br/>
            <label for = "">Departure</label><input type = "date" id = "ftime_departure_search" name="via_time_departure"/><br/>
            <label for = "">Arrival</label><input type = "date" id = "ftime_arrival_search" name="via_time_arrival"/><br/>
        </div>
        <input type = "submit" id = "search_customer_submit" name = "search" value="Search"/><br/>
    </form>
</div>

<div id="flights_container">
    <form action="/booking/step1" id="booking_form" method = "post">
        <input type = "number" id = "passenger_number" name="passenger_number" value = "0" hidden = "hidden" />
        <div id="flights_div"></div>
        <div id="flights_div_return"></div>
        <input type = 'submit' name = 'book_submit' id="book_submit" value = 'Book'/>
    </form>
</div>

<?php
    include("/js/search.php");
	include("includes/footer.php");
?>