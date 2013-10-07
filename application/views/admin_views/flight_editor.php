<?php $places = array("Bacolod","Boracay","Butuan","Cagayan de Oro","Camiguin","Cauayan","Cebu","Clark","Coron","Cotabato","Davao","Dipolog","Dumaguete","General Santos","Iloilo","Kalibo","Laoag","Legazpi","Manila","Masbate","Naga","Ozamiz","Pagadian","Puerto Princesa","Roxas","San Jose (Occ. Mindoro)","Siargao","Tacloban","Tagbilaran","Tawi-Tawi","Tuguegarao","Virac","Zamboanga");
?>

<div id="flight_search_container">
    <form onsubmit = "return false" id = "search_form" method="post">
        <h3>Search Flight: </h3>
        <input type = "text" id = "fid_search" name="via_id" placeholder="Flight Id"/>
        <input type = "text" id = "forigin_search" name="via_origin" placeholder="Origin"/>
        <input type = "text" id = "fdestination_search" name="via_destination" placeholder="Destination"/>
        <input type = "submit" id = "search_admin_submit" name = "search" value="Search"/>
    </form>
</div>

<div id="flights_container">
	<table>
		<tr>
			<td>FLIGHT ID </td>
			<td>SLOTS </td>
			<td>ORIGIN </td>
			<td>DESTINATION </td>
			<td>TIME DEPARTURE </td>
			<td>TIME ARRIVAL </td>
            <td>FARE </td>
            <td>VISIBILTY </td>
		</tr>

	<?php for( $i = 0, $j = count($flights); $i < $j; $i++){?>
			<tr>
		<form action = "/user/edit_flight" method = "post">
				<td><input type = "text" readonly="readonly" name = "flight_id"  value = '<?php echo $flights[$i]->FLIGHT_ID;?>'/></td>
				
				<td><input type = "number" name = "slot" value = '<?php echo $flights[$i]->SLOT;?>'/></td>

                <td>
                    <select  name="origin">
                        <?php for($k = 0; $k < 33; $k++){ ?>
                        <option value='<?php echo $places[$k]?>' <?php if($flights[$i]->ORIGIN == $places[$k]) echo 'selected = "selected"';?> ><?php echo $places[$k]?></option>
                        <?php } ?>
                    </select>
                </td>

                <td>
                    <select  name="destination">
                        <?php for($k = 0; $k < 33; $k ++){ ?>
                            <option value='<?php echo $places[$k]?>' <?php if($flights[$i]->DESTINATION == $places[$k]) echo 'selected = "selected"';?> ><?php echo $places[$k]?></option>
                        <?php } ?>
                    </select>
                </td>


            <td><input type = "datetime-local" name = "departure_time" value = '<?php echo $flights[$i]->TIME_DEPARTURE;?>'/></td>

				<td><input type = "datetime-local" name = "arrival_time" value = '<?php echo $flights[$i]->TIME_ARRIVAL;?>'/></td>
                <td><input type = "number" name = "fare" value = '<?php echo $flights[$i]->FARE;?>'/></td>

				<td>
				<select  name="status">
					<option value="VB" <?php if($flights[$i]->STATUS == "VB") echo 'selected = "selected"';?> >Visible</option>
					<option value="NV" <?php if($flights[$i]->STATUS == "NV") echo 'selected = "selected"';?> >Not Visible</option>
				</select>
				</td>

				<td><input type = "submit" value = "Edit" name = "submit"/></td>
		</form>
		<form action = "/user/delete_flight" method = "post">
			<td>
				<input type = "text" name = "delete" value = '<?php echo $flights[$i]->FLIGHT_ID?>' hidden = "hidden"/>
				<input type = "submit" value = 'X'/>
			</td>
		</form>
			</tr>
	<?php } ?>

	</table>
</div>

<?php include("/js/search.php"); ?>