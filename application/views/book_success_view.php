<script type="text/javascript">

}
</script>

<div>
    <div id="book_summary">
        <div id="flight_details">
            <div id="depart">
                <h3>
                    <?php
                        echo $flights[0]->ORIGIN;
                    ?>
                    to
                    <?php
                        echo $flights[0]->DESTINATION;
                    ?>
                </h3>
                <span>Departure: <?php echo $flights[0]->TIME_DEPARTURE?></span><br/>
                <span>Arrival: <?php echo $flights[0]->TIME_ARRIVAL?></span><br/>
                <span>Flight Id: <?php echo $flights[0]->FLIGHT_ID?></span>
            </div>
            <?php
                if(isset($flights[1])){
                    echo '<div id="depart">';
                    echo '<h3>';
                    echo $flights[1]->ORIGIN;
                    echo ' to ';
                    echo $flights[1]->DESTINATION;
                    echo '</h3>';
                    echo '<span>Departure: ';
                    echo $flights[1]->TIME_DEPARTURE;
                    echo '</span><br/>';
                    echo '<span>Arrival: ';
                    echo $flights[0]->TIME_ARRIVAL;
                    echo '</span><br/>';
                    echo '<span>Flight Id: ';
                    echo $flights[0]->FLIGHT_ID;
                    echo '</span>';
                    echo '</div>';
        }

            ?>
        </div>
        <div id="guest_details">
            <?php
                for($i = 0, $j = $passengers["passenger_number"]; $i < $j; $i ++){
                    echo '<p>';
                    echo ($i+1) . ". ";
                    echo $passengers["guest_title" . $i];
                    echo " ";
                    echo $passengers["guest_fname" . $i];
                    echo " ";
                    echo $passengers["guest_mname" . $i];
                    echo " ";
                    echo $passengers["guest_lname" . $i];
                    echo " | ";
                    echo $passengers["user_address" . $i];
                    echo " | ";
                    echo $passengers["user_email" . $i];
                    echo " | ";
                    echo $passengers["user_homephone" . $i];
                    echo " | ";
                    echo $passengers["user_mobilephone" . $i];
                    echo '</p>';

                }

            ?>

        </div>
        <div id="payment_details">
            <?php
            /*
             * number of passengers
             * cost of flight
             * discount
             * total cost
            */
            $cost = $flights[0]->FARE;
            $discount = 0;
            if(isset($flights[1])){
                $cost += $flights[1]->FARE;
                $discount = 1000;
            }

            echo '<span> Passenger Count: ' . $passengers["passenger_number"] . '</span><br/>';
            echo '<span> Flight Cost: ' . $cost . '</span><br/>';
            echo '<span> Discount: ' . $discount . '</span><br/>';
            echo '<span> Total Cost: ' . ($passengers["passenger_number"] * ($cost-$discount)) . '</span>';

            ?>
        </div>
    </div>
	<form action="/booking/finalize_book" method="post">
		<input type="submit" value="Finalize">
	</form>
</div>