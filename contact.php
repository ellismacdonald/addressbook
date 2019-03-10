
<!DOCTYPE html>
<html>
	<head>
		<title>Add a Contact</title>
	</head>
	<body>
		<h1>Adding a Contact to table Contacts</h1>			
		<form method="POST" action="add_contact.php">
			<table cellspacing=3 cellpadding=3>
				<tr>
					<td valign=top>
						<p><strong>First Name:</strong><br>
						<input type="text" name="first_name" size=50 maxlength=50></p>
					</td>	
				</tr>
				<tr>
					<td valign=top>
						<p><strong>Last Name:</strong><br>
						<input type="text" name="last_name" size=50 maxlength=50></p>
					</td>					
				</tr>	
				<tr>
					<td valign=top>
						<p><strong>Phone Number:</strong><br>
						<input type="text" name="phone_number" size=50 maxlength=50></p>
					</td>					
				</tr>	
				<tr>
					<td valign=top>
						<p><strong>Email:</strong><br>
						<input type="text" name="email" size=50 maxlength=50></p>
					</td>
				</tr>
				<tr>
					<td valign=top>
						<p><strong>Address:</strong><br>
						<input type="text" name="street_address" size=50 maxlength=50></p>
					</td>
				</tr>
				<tr>
					<td valign=top>
						<p><strong>City:</strong><br>
						<input type="text" name="city" size=50 maxlength=50></p>
					</td>
				</tr>
				<tr>
					<td valign=top>
						<p><strong>Province:</strong><br>
						<input type="text" name="province" size=50 maxlength=50></p>
					</td>
				</tr>
				<tr>
					<td valign=top>
						<p><strong>Postal Code:</strong><br>
						<input type="text" name="postal_code" size=50 maxlength=50></p>
					</td>
				</tr>
				<tr>
					<td valign=top>
						<p><strong>Birthday:</strong><br>
						<input type="text" name="birthday" size=50 maxlength=50></p>
					</td>
				</tr>
			</table>

			<p>
        <input type="submit" name="add" id="login" value="add">
    </p>
		</form>
	</body>
</html>

