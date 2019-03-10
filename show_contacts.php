<?php 

// In the beginning of your every page you have to check if user is authorized.

// On checklogin.php if user entered correct login and password, just set something like
session_start();
	if($_SESSION['username']){
	echo $_SESSION['username'];
	}
// $_SESSION['authorized'] = TRUE;
// ...and on other pages just check if user is authorized:

if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) {
    // Alright, let's show all the hidden functionality!
    echo "Psst! Hey! Wanna buy some weed?";
} else {
    // User is not authorized!
    header('Location: login.php');
    exit();
}

include('get_contacts.php');

?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<title>My Contacts</title>
	</head>
		<body>
		<?php $results = mysqli_query($connection, $sql); ?>

<table>
	<thead>
		<tr>
			<th>Representative</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone Number</th>
			<th>Email</th>
			<th>Address</th>
			<th>City</th>
			<th>Province</th>
			<th>Postal Code</th>
			<th>Birthday</th>

			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
			<td><?php echo $row['phone_number']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['street_address']; ?></td>
			<td><?php echo $row['city']; ?></td>
			<td><?php echo $row['province']; ?></td>
			<td><?php echo $row['postal_code']; ?></td>
			<td><?php echo $row['birthday']; ?></td>
			<td>
				<a href="edit.php?edit=<?php echo $row['contact_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="delete.php?del=<?php echo $row['contact_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
 
	</body>
</html>

