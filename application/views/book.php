<script type="text/javascript">

}
</script>
<div>
<form action="" method="post">

		<input type="radio" name="flight_type" value="rt" />Round Trip
		<input type="radio" name="flight_type" value="ow"/>One Way
<br/>		
<select name="Origin" required>
	<option value="">Origin</option>
	<?php
		$places = array("Bacolod","Boracay","Butuan","Cagayan de Oro","Camiguin","Cauayan","Cebu","Clark","Coron","Cotabato","Davao","Dipolog","Dumaguete","General Santos","Iloilo","Kalibo","Laoag","Legazpi","Manila","Masbate","Naga","Ozamiz","Pagadian","Puerto Princesa","Roxas","San Jose (Occ. Mindoro)","Siargao","Tacloban","Tagbilaran","Tawi-Tawi","Tuguegarao","Virac","Zamboanga");
		for($i=0;$i<33;$i++){
		echo '<option value="'.$places[$i].'">'.$places[$i].'</option>';
		}
	?>
</select>
<br/>
<select  name="Destination" required>
	<option value="">Destination</option>
	<?php
		for($i=0;$i<33;$i++){
		echo '<option value="'.$places[$i].'">'.$places[$i].'</option>';
		}
	?>
</select>
<br/>
Departure Date:
<input type="date" name ="ddate" required/>
<br/>
Return Date:	
<input type="date" name ="rdate"/>
<br/>
Adult (12+ years)
<select name="adult">
	<?php
	for ($i=0; $i <21 ; $i++) { 
		echo '<option value="'.$i.'">'.$i.'</option>';
	}

	?>
</select>


Child (2-11 years)
<select name="child">
	<?php
	for ($i=0; $i <21 ; $i++) { 
		echo '<option value="'.$i.'">'.$i.'</option>';
	}

	?>
</select>


Infant (-2 years)
<select namee="infant">
	<?php
	for ($i=0; $i <21 ; $i++) { 
		echo '<option value="'.$i.'">'.$i.'</option>';
	}

	?>
</select>
<br/>	
<input type="submit" value="Search">



</form>
</div>