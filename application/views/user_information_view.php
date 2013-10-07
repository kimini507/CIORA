<?php
    $_SESSION['flight1'] = $flight_choice1;
    if(isset($flight_choice2))
        $_SESSION['flight2'] = $flight_choice2;
?>

<div><!--after ng search flight eto-->

<form action="/booking/step2" method="post">
    <!-- put the number from session i think-->
    <input type = "number" name = "passenger_number" value = '<?php echo $passenger_number;?>' hidden = "hidden"/>
    <?php for($i = 0, $j = $passenger_number; $i<$j; $i++){ ?>
	<fieldset>
		<legend>GUEST  <?php echo $i+1; ?> <!-- dito nakalagay Adult1...--></legend>
	Name: 
		<select name="guest_title<?php echo $i; ?>"  required>
			<option value="">Title</option>
			<option value="Mr.">Mr.</option>
			<option value="Ms.">Ms.</option>
			<option value="Miss">Miss.</option>
			<option value="Master">Master</option>
		</select>
		  <input type="text" name="guest_fname<?php echo $i; ?>" placeholder="first name" required/>
		  <input type="text" name="guest_mname<?php echo $i; ?>" placeholder="middle name" required/>
		  <input type="text" name="guest_lname<?php echo $i; ?>" placeholder="last name" required/>
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
	Complete Address:
		<input type="textarea" name="user_address<?php echo $i; ?>" required/>
		<br/>

    Email Address:<input type="email" name="user_email<?php echo $i; ?>" required/>
        <br/>
    Confirm Email:<input type="email" name="user_re-email<?php echo $i; ?>" required/>
        <br/>

	Home Phone:<input type="text" name="user_homephone<?php echo $i; ?>" required/>
		<br/>
	Mobile Phone:<input type="text" name="user_mobilephone<?php echo $i; ?>" required/>
		<br/>


</fieldset>
<?php } ?>
<input type="submit" value="Continue"/>
</form>


</div>