<script type="text/javascript">
window.onload=function () {
		add_flight_form.flight_id.onblur=validate_flight_id;
		add_flight_form.slot.onblur=validate_slot;
		add_flight_form.fare.onblur=validate_fare;
		add_flight_form.arrival_time.onblur=validate_time;

	}

function validate_all(){
			if(validate_flight_id() && validate_slot() && validate_fare() && validate_time()){
				return true;
			}else{
				return false;
			}

		}
function validate_flight_id () {
		var str=add_flight_form.flight_id.value;
	
		 if(!str.match(/^[A-Za-z0-9]{6}$/)) 
		 {
		 	var msg=" Must be exactly 6 characters.";
		 	document.getElementsByName('help_flight_id')[0].innerHTML=msg;
		 	return false;
		}
		 msg="";
		 document.getElementsByName('help_flight_id')[0].innerHTML=msg;
		return true;
	}
function validate_slot () {
		var str=add_flight_form.slot.value;
	
		 if(!str.match(/^[0-9]{1,3}$/)) 
		 {
		 	var msg="Must be a number and less than 1000.";
		 	document.getElementsByName('help_slot')[0].innerHTML=msg;
		 	return false;
		}
		 msg="";
		 document.getElementsByName('help_slot')[0].innerHTML=msg;
		return true;
	}
function validate_fare () {
		var str=add_flight_form.fare.value;
	
		 if(!str.match(/^[0-9]{1,9}$/)) 
		 {
		 	var msg="Must be a number and less than 1000000.";
		 	document.getElementsByName('help_fare')[0].innerHTML=msg;
		 	return false;
		}
		 msg="";
		 document.getElementsByName('help_fare')[0].innerHTML=msg;
		return true;
	}
function validate_time () {
		var deptdate=add_flight_form.departure_time.value;
		var arrdate=add_flight_form.arrival_time.value;
	
		 if(deptdate>arrdate) 
		 {
		 	var msg="Arrival time must be greater than Departure time";
		 	document.getElementsByName('help_arrival_time')[0].innerHTML=msg;
		 	return false;
		}
		 msg="";
		 document.getElementsByName('help_arrival_time')[0].innerHTML=msg;
		return true;
	}
</script>

<div id="admin">


	<div id="addflight">
		<form onsubmit="return validate_all()" name="add_flight_form" action="/user/add_flight" method="post">
		
				<br/>
				Flight Id:
				<input type="text" name="flight_id" required/>
				<span name="help_flight_id"></span>
				<br/>
			
				Slot:
				<input type="number" name="slot" min="0" max="150" required>
				<span name="help_slot"></span>
				<br/>
			
			
				Destination:
					<select  name="destination" required>
					<option value="">Destination</option>
					<?php
					$places = array("Bacolod","Boracay","Butuan","Cagayan de Oro","Camiguin","Cauayan","Cebu","Clark","Coron","Cotabato","Davao","Dipolog","Dumaguete","General Santos","Iloilo","Kalibo","Laoag","Legazpi","Manila","Masbate","Naga","Ozamiz","Pagadian","Puerto Princesa","Roxas","San Jose (Occ. Mindoro)","Siargao","Tacloban","Tagbilaran","Tawi-Tawi","Tuguegarao","Virac","Zamboanga");
					for($i=0;$i<33;$i++){
						echo '<option value="'.$places[$i].'">'.$places[$i].'</option>';
					}
					?>
					</select>
				<span name="help_destination"></span>
				<br/>
				Origin:
				
					<select name="origin" required>
						<option value="">Origin</option>
						<?php
							
							for($i=0;$i<33;$i++){
							echo '<option value="'.$places[$i].'">'.$places[$i].'</option>';
							}
						?>
					</select>
				<span name="help_origin"></span>
				<br/>
			
				Time Departure:
				<input type="datetime-local" name="departure_time" required>
				<span name="help_departure_time"></span>
				<br/>
				Time Arrival:
				
					<input type="datetime-local" name="arrival_time" required>
				<span name="help_arrival_time"></span>
				<br/>
				Fare:
				<input type="number" name="fare" min="0" max="999999" required>
				<span name="help_fare"></span>
				<br/>
				
					<input type = "submit" value="ADD FLIGHT"/>
		
	</form>
	</div>
	<div id="editflight">
	</div>
	<div id="deleteflight">
	</div>
	<div id="makevisible">
	</div>
</div>