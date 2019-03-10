<?php
session_start();
if($_SESSION['username']){
	echo $_SESSION['username'];
	}
$host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "addressbook";

    // open connection to mysql database
    $connection = mysqli_connect($host, $username, $password, $dbname) or die("Connection Error " . mysqli_error($connection));
    
    // fetch mysql table rows
    $sql = "SELECT *
FROM contacts
WHERE MONTH(birthday) = MONTH(CURRENT_DATE())";
   $result = mysqli_query($connection, $sql) or die("Selection Error " . mysqli_error($connection));

    //close the db connection
    

?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <title>My Music (Ordered by Date Acquired)</title>
      <?php $result = mysqli_query($connection, $sql); ?>
	</head>
		<body>
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
	
	<?php while ($row = mysqli_fetch_array($result)) { ?>
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

