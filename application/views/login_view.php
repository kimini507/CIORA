<script type="text/javascript">
	window.onload=function () {
		login_form.username.onblur=validate_admin;
		login_form.password.onblur=validate_admin_pass;
	}
	function validate_admin () {
		var str=login_form.username.value;
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
		var str=login_form.password.value;
		if(str=="") msg=" Input is required."
		else if(!str.match(/^[A-Za-z0-9]{1,32}$/)) msg=" Max of 32 characters only.";
		else{
			msg="";
			document.getElementsByName('help_admin_pass')[0].innerHTML=msg;
			return true;
		}
		document.getElementsByName('help_admin_pass')[0].innerHTML=msg;
	}
	function validate_username_password() {
		if(validate_admin() && validate_admin_pass){
			return true;
		}else{
			return false;
		}
	}
</script>

<div>
	<fieldset id="admin_login">
		<legend> Administration </legend>
		<form onsubmit="return  validate_username_password()" action = "/user/log_in" name="login_form" method="post">
			<label>Username: <input type="text" name="username" required /></label>
			<span id="help_admin" name="help_admin"></span><br/>
			<label>Password: <input type="password" name="password" required/></label>
			<span id="help_admin_pass" name="help_admin_pass"></span><br/>
			<input id="submit_button" type="submit"/>
		</form>
	</fieldset>
</div>