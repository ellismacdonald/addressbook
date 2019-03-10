<?php
session_start();

$link = mysqli_connect("localhost", "root", "", "addressbook");
// Check connection
if ($link->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

$username = $_SESSION['username'];
$first_name = mysqli_real_escape_string($link, $_POST['first_name']);
$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
$phone_number = mysqli_real_escape_string($link, $_POST['phone_number']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$street_address = mysqli_real_escape_string($link, $_POST['street_address']);
$city = mysqli_real_escape_string($link, $_POST['city']);
$province = mysqli_real_escape_string($link, $_POST['province']);
$postal_code = mysqli_real_escape_string($link, $_POST['postal_code']);
$birthday = mysqli_real_escape_string($link, $_POST['birthday']);

$sql = "INSERT INTO contacts (username, first_name, last_name, phone_number, email, street_address, city, province, postal_code, birthday)
VALUES ('$username', '$first_name', '$last_name', '$phone_number', '$email', '$street_address', '$city', '$province', '$postal_code', '$birthday')";


if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add a Record</title>
	</head>
	<body>
		
	</body>
</html>

