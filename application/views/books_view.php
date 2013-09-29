<script type="text/javascript">
	window.onload=function () {
		books_form.customer_id.onblur=validate_customer_id;
		books_form.flight_id.onblur=validate_flight_id;
		books_form.flight_class.onblur=validate_flight_class;
		books_form.flight_type.onblur=validate_flight_type;
		books_form.onsubmit=submit_all;
	}
	function validate_customer_id () {
		str=books_form.customer_id.value;
		if(str=="") msg=" Input is required."
		else if(!str.match(/^[A-Za-z0-9]{7}$/)) msg=" 7 characters only.";
		else{
			msg="";
			document.getElementsByName('help_customer_id')[0].innerHTML=msg;
			return true;
		}
		document.getElementsByName('help_customer_id')[0].innerHTML=msg;
	}
	function validate_flight_id () {
		str=books_form.flight_id.value;
		if(str=="") msg=" Input is required."
		else if(!str.match(/^[A-Za-z0-9]{6}$/)) msg=" 6 characters only.";
		else{
			msg="";
			document.getElementsByName('help_flight_id')[0].innerHTML=msg;
			return true;
		}
		document.getElementsByName('help_flight_id')[0].innerHTML=msg;
	}
	function validate_flight_class () {
		str=books_form.flight_class.value;
		if(str=="") msg=" Input is required."
		else if(!str.match(/^[A-Za-z0-9]{1,20}$/)) msg=" 20 characters only.";
		else{
			msg="";
			document.getElementsByName('help_flight_class')[0].innerHTML=msg;
			return true;
		}
		document.getElementsByName('help_flight_class')[0].innerHTML=msg;
	}
	function validate_flight_type () {
		str=books_form.flight_type.value;
		if(str=="") msg=" Input is required."
		else if(!str.match(/^[A-Za-z0-9]{1,2}$/)) msg=" Max of 2 characters only.";
		else{
			msg="";
			document.getElementsByName('help_flight_type')[0].innerHTML=msg;
			return true;
		}
		document.getElementsByName('help_flight_type')[0].innerHTML=msg;
	}
	function submit_all () {
		// pass values here...
	}
</script>

<div>
	<fieldset>
		<legend> Administration </legend>
		<form name="books_form">
			<label>Customer ID: <input type="text" name="customer_id" required /></label>
			<span name="help_customer_id"></span><br/>
			<label>Flight ID: <input type="text" name="flight_id" required/></label>
			<span name="help_flight_id"></span><br/>
			<label>Class: <input type="text" name="flight_class" required/></label>
			<span name="help_flight_class"></span><br/>
			<label>Flight Type: <input type="text" name="flight_type" required/></label>
			<span name="help_flight_type"></span><br/>
		</form>
		<input type="submit" />
	</fieldset>
</div>