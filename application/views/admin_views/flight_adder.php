<div id="admin">


	<div id="addflight">
		<form action="/user/add_flight" method="post">
		<table>
			<tr>
				<td>Flight Id:</td>
				<td><input type="text" name="flight_id" /></td>
			</tr>
			<tr>
				<td>Slot:</td>
				<td>
				<input type="number" name="slot" min="0" max="150">
				</td>
			</tr>
			<tr>
				<td>Destination:</td>
				<td>
					<select  name="destination">
	<option value="">Destination</option>
	<?php
	$places = array("Bacolod","Boracay","Butuan","Cagayan de Oro","Camiguin","Cauayan","Cebu","Clark","Coron","Cotabato","Davao","Dipolog","Dumaguete","General Santos","Iloilo","Kalibo","Laoag","Legazpi","Manila","Masbate","Naga","Ozamiz","Pagadian","Puerto Princesa","Roxas","San Jose (Occ. Mindoro)","Siargao","Tacloban","Tagbilaran","Tawi-Tawi","Tuguegarao","Virac","Zamboanga");
		for($i=0;$i<33;$i++){
		echo '<option value="'.$places[$i].'">'.$places[$i].'</option>';
		}
	?>
</select>

				</td>
			</tr>
			<tr>
				<td>Origin:</td>
				<td>
					<select name="origin">
						<option value="">Origin</option>
						<?php
							
							for($i=0;$i<33;$i++){
							echo '<option value="'.$places[$i].'">'.$places[$i].'</option>';
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Time Departure:</td>
				<td><input type="datetime-local" name="departure_time"></td>
			</tr>
			<tr>
				<td>Time Arrival:</td>
				<td>
					<input type="datetime-local" name="arrival_time">
				</td>
			</tr>
			<tr>
				<td>Fare:</td>
				<td><input type="number" name="fare" min="0" max="99999"></td>
			</tr>
			<tr>
				<td>
					<input type = "submit" value="ADD FLIGHT"/>
				</td>
			</tr>
		</table>
	</form>
	</div>
	<div id="editflight">
	</div>
	<div id="deleteflight">
	</div>
	<div id="makevisible">
	</div>
</div>