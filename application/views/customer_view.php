<script type="text/javascript">
	window.onload=function(){
		customer_form.customer_id.onblur=validate_customer_id;
		customer_form.customer_name.onblur=validate_customer_name;
		customer_form.depart_flight.onblur=validate_depart_flight;
		customer_form.return_flight.onblur=validate_return_flight;
		customer_form.onsubmit=submit_all;
	}
	function validate_customer_id(){
		str=customer_form.customer_id.value;
		if(str=="") msg=" Input is required.";
		else if(!str.match(/^[A-Za-z0-9]{7}$/)) msg=" 7 characters only.";
		else{
			msg="";
			document.getElementsByName('help_customer_id')[0].innerHTML=msg;
			return true;
		}
		document.getElementsByName('help_customer_id')[0].innerHTML=msg;
	}
	function validate_customer_name(){
		str=customer_form.customer_name.value;
		if(str=="") msg=" Input is required.";
		else if(!str.match(/^[A-Za-z0-9\.\-]{1,30}$/)) msg=" Max of 30 characters only.";
		else{
			msg="";
			document.getElementsByName('help_customer_name')[0].innerHTML=msg;
			return true;
		}
		document.getElementsByName('help_customer_name')[0].innerHTML=msg;
	}
	function validate_depart_flight(){
		str=customer_form.depart_flight.value;
		if(str=="") msg=" Input is required.";
		else if(!str.match(/^[A-Za-z0-9]{6}$/)) msg=" 6 characters only.";
		else{
			msg="";
			document.getElementsByName('help_depart_flight')[0].innerHTML=msg;
			return true;
		}
		document.getElementsByName('help_depart_flight')[0].innerHTML=msg;
	}
	function validate_return_flight(){
		str=customer_form.return_flight.value;
		if(str.match(/^[A-Za-z0-9]{6}$/) || str==""){
    			msg="";
			document.getElementsByName('help_return_flight')[0].innerHTML=msg;
			return true;
		} 
		else{
			msg=" 6 characters only.";
		}
		document.getElementsByName('help_return_flight')[0].innerHTML=msg;
	}
	function submitAll() {
		// pass values here...
	}
</script>

<div>
	<fieldset>
		<legend> Customer </legend>
		<form name="customer_form">
            <label>Name: <input type="text" name="customer_name" required/></label>
            <span name="help_customer_name"></span><br/>
            <label>Birthday: <input type="date" name="customer_birthday" required/></label>
            <span name="help_customer_birthday"></span><br/>
            <label>Name: <input type="text" name="customer_name" required/></label>
            <span name="help_customer_name"></span><br/>

		</form>
		<input type="submit" />
	</fieldset>
</div>