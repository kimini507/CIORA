
<div>
<form action="" method="post">
<table>
	<tr>
		<td><input type="radio" name="flight_type" value="rt"/>Round Trip</td>
		<td><input type="radio" name="flight_type" value="ow"/>One Way</td>
	</tr>
	<tr>
		<td>
<select name="Origin">
	<option value="">Origin</option>
	<?php
		$places = array("Bacolod","Boracay","Butuan","Cagayan de Oro","Camiguin","Cauayan","Cebu","Clark","Coron","Cotabato","Davao","Dipolog","Dumaguete","General Santos","Iloilo","Kalibo","Laoag","Legazpi","Manila","Masbate","Naga","Ozamiz","Pagadian","Puerto Princesa","Roxas","San Jose (Occ. Mindoro)","Siargao","Tacloban","Tagbilaran","Tawi-Tawi","Tuguegarao","Virac","Zamboanga");
		for($i=0;$i<33;$i++){
		echo '<option value="'.$places[$i].'">'.$places[$i].'</option>';
		}
	?>
</select></td>
<td>
<select  name="Destination">
	<option value="">Destination</option>
	<?php
		for($i=0;$i<33;$i++){
		echo '<option value="'.$places[$i].'">'.$places[$i].'</option>';
		}
	?>
</select>
</td>
</tr>
<tr>
<td>
Departure Date:
</td>
<td>
<input type="date" name ="ddate"/>
</td>
</tr>
<tr>
	<td>
Return Date:
	</td>
	<td>
<input type="date" name ="rdate"/>
	</td>
</tr>
<tr>
	<td>
Adult (12+ years)
<select name="adult">
	<?php
	for ($i=0; $i <21 ; $i++) { 
		echo '<option value="'.$i.'">'.$i.'</option>';
	}

	?>
</select>
</td>
<td>
Child (2-11 years)
<select name="child">
	<?php
	for ($i=0; $i <21 ; $i++) { 
		echo '<option value="'.$i.'">'.$i.'</option>';
	}

	?>
</select>
</td>
<td>
Infant (-2 years)
<select namee="infant">
	<?php
	for ($i=0; $i <21 ; $i++) { 
		echo '<option value="'.$i.'">'.$i.'</option>';
	}

	?>
</select>
</td>
</tr>
<tr>
	<td>
<input type="submit" value="Search">
</td>
</tr>
</table>

</form>
</div>