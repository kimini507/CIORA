<div><!--after ng search flight eto-->

<form action="" method="post">
	<fieldset>
		<legend>GUEST <!-- dito nakalagay Adult1...--></legend>
	Name: 
		<select name="guest_title" required>
			<option value="">Title</option>
			<option value="Mr.">Mr.</option>
			<option value="Ms.">Ms.</option>
			<option value="Miss">Miss.</option>
			<option value="Master">Master</option>
		</select>
		  <input type="text" name="guest_fname" placeholder="first name" required/>
		  <input type="text" name="guest_mname" placeholder="middle name" required/>
		  <input type="text" name="guest_lname" placeholder="last name" required/>
		  <br/>
	BirthDate:<input type="date" name="guest_bday" required/>
	Nationality:<input type="text" name="guest_nationality"required/>
	<br/>

</fieldset>

<!--Special Assistance form , di ko alam kung kailangan nito pero lumalabas sya sa mga site-->
	<!--
	<table>
		<tr>
			<td>Departure</td>
			<td>Return</td>
		</tr>
		<tr>
			<td>
				<select name="assistance_departure">
					<option value="">Please Select</option>
					<option value="Expectant Mother">Expectant Mother</option>
					<option value="Portable Oxygen Concentrator for Accompanied Guest">Portable Oxygen Concentrator for Accompanied Guest</option>
					<option value="Portable Oxygen Concentrator for Unaccompanied Guest">Portable Oxygen Concentrator for Unaccompanied Guest</option>
					<option value="Unaccompanied Person with Reduced Mobility">Unaccompanied Person with Reduced Mobility</option>
				</select>
			</td>
			<td><select name="assistance_Return">
					<option value="">Please Select</option>
					<option value="Expectant Mother">Expectant Mother</option>
					<option value="Portable Oxygen Concentrator for Accompanied Guest">Portable Oxygen Concentrator for Accompanied Guest</option>
					<option value="Portable Oxygen Concentrator for Unaccompanied Guest">Portable Oxygen Concentrator for Unaccompanied Guest</option>
					<option value="Unaccompanied Person with Reduced Mobility">Unaccompanied Person with Reduced Mobility</option>
				</select></td>
		</tr>
		<tr>
			<td><select name="assistance_arrival-departure">
					<option value="">Please Select</option>
					<option value="Expectant Mother">Expectant Mother</option>
					<option value="Portable Oxygen Concentrator for Accompanied Guest">Portable Oxygen Concentrator for Accompanied Guest</option>
				</select></td>
			<td><select name="assistance_arrival-return">
					<option value="">Please Select</option>
					<option value="Expectant Mother">Expectant Mother</option>
					<option value="Portable Oxygen Concentrator for Accompanied Guest">Portable Oxygen Concentrator for Accompanied Guest</option>
				</select></td>
		</tr>
	</table>
-->

<fieldset>
	<legend>User Contact Information</legend>
	Name: 
		<select name="user_title" required>
			<option value="">Title</option>
			<option value="Mr.">Mr.</option>
			<option value="Ms.">Ms.</option>
			<option value="Miss">Miss.</option>
			<option value="Master">Master</option>
		</select>
		  <input type="text" name="user_fname" placeholder="first name" required/>
		  <input type="text" name="user_mname" placeholder="middle name" required/>
		  <input type="text" name="user_lname" placeholder="last name" required/>
		  <br/>
	Complete Address:
		<input type="textarea" name="user_address" required/>
		<br/>
	Zip Code:
		<input type="text" name="user_zipcode" required/>
		<br/>
	Country:<input type="text" name="user_country" required/>
		<br/>

	Home Phone:<input type="text" name="user_homephone" required/>
		<br/>
	Mobile Phone:<input type="text" name="user_mobilephone" required/>
		<br/>
	Email Address:<input type="email" name="user_email" required/>
		<br/>

	Confirm Email:<input type="email" name="user_re-email" required/>
		<br/>

</fieldset>

<input type="submit" value="Continue"/>
</form>


</div>