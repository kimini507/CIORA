<script type="text/javascript">
	window.onload=function () {
		login_form.admin.onblur=validate_admin;
		login_form.admin_pass.onblur=validate_admin_pass;
		login_form.onsubmit=submit_all;
	}
	function validate_admin () {
		str=login_form.admin.value;
		if(str=="") msg=" Input is required."
		else if(!str.match(/^[A-Za-z0-9]{1,32}$/)) msg=" Max of 32 characters only.";
		else{
			msg="";
			document.getElementsByName('help_admin')[0].innerHTML=msg;
			return true;
		}
		document.getElementsByName('help_admin')[0].innerHTML=msg;
	}
	function validate_admin_pass () {
		str=login_form.admin_pass.value;
		if(str=="") msg=" Input is required."
		else if(!str.match(/^[A-Za-z0-9]{1,32}$/)) msg=" Max of 32 characters only.";
		else{
			msg="";
			document.getElementsByName('help_admin_pass')[0].innerHTML=msg;
			return true;
		}
		document.getElementsByName('help_admin_pass')[0].innerHTML=msg;
	}
	function submit_all () {
		// pass values here...
	}
</script>

<div>
	<fieldset>
		<legend> Administration </legend>
		<form action = "/user/log_in" name="login_form" method="post">
			<label>Username: <input type="text" name="username" required /></label>
			<span name="help_admin"></span><br/>
			<label>Password: <input type="password" name="password" required/></label>
			<span name="help_admin_pass"></span><br/>
			<input type="submit"/>
		</form>
	</fieldset>
</div>