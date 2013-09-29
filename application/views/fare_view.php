<script type="text/javascript">
	window.onload=function () {
		fare_form.flight_id.onblur=validate_flight_id;
		fare_form.flight_fare.onblur=validate_flight_fare;
		fare_form.onsubmit=submit_all;
	}
	function validate_flight_id () {
		str=fare_form.flight_id.value;
		if(str=="") msg=" Input is required."
		else if(!str.match(/^[A-Za-z0-9]{6}$/)) msg=" 6 characters only.";
		else{
			msg="";
			document.getElementsByName('help_flight_id')[0].innerHTML=msg;
			return true;
		}
		document.getElementsByName('help_flight_id')[0].innerHTML=msg;
	}
	function validate_flight_fare () {
		str=fare_form.flight_fare.value;
		if(str=="") msg=" Input is required."
		else if(str.match(/^\d{1,6}$/)){
			msg="";
			document.getElementsByName('help_flight_fare')[0].innerHTML=msg;
			return true;
		}
		else msg=" Max of 6-digit number only.";
		document.getElementsByName('help_flight_fare')[0].innerHTML=msg;
	}
	function submit_all () {
		// pass values here...
	}
</script>

<div>
	<fieldset>
		<legend> Fare </legend>
		<form name="fare_form">
			<label>Flight ID: <input type="text" name="flight_id" required /></label>
			<span name="help_flight_id"></span><br/>
			<label>Fare: <input type="text" name="flight_fare" required/></label>
			<span name="help_flight_fare"></span><br/>
		</form>
		<input type="submit" />
	</fieldset>
</div>