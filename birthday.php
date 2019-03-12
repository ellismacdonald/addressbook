<?php
// start session
session_start();
//db credentials
$host = "localhost";
$username = "root";
$password = "";
$dbname = "addressbook";

// open conn to mysql database
$conn = mysqli_connect($host, $username, $password, $dbname) or die("conn Error " . mysqli_error($conn));

// fetch mysql table rows
$sql = "SELECT *
FROM contacts
WHERE MONTH(birthday) = MONTH(CURRENT_DATE())";
$result = mysqli_query($conn, $sql) or die("Selection Error " . mysqli_error($conn));

	

?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<title>My Music (Ordered by Date Acquired)</title>
	<?php $result = mysqli_query($conn, $sql); ?>
	</head>
		<body>
		<div class="add-user-form">
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
				<!-- loops through the results and displays content in rows -->
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
				<?php } $conn->close();?>
			</table>
			<form action="main.php" method="post">
				<p>
						<input type="submit" name="add" id="login" value="Back to Main">
				</p>
			</form>
		</div>
	</body>
</html>

