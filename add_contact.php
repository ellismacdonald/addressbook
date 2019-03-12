<?php
//session start allows me to conn the new contact to the user logged in
session_start();

// connection to db credentials
$conn = mysqli_connect("localhost", "root", "", "addressbook");
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

// this is the user login name
// the following also strips special characters from the entered data to prevent sql injections
$username = $_SESSION['username'];
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$street_address = mysqli_real_escape_string($conn, $_POST['street_address']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$province = mysqli_real_escape_string($conn, $_POST['province']);
$postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
$birthday = mysqli_real_escape_string($conn, $_POST['birthday']);

// the sql statement to insert data
$sql = "INSERT INTO contacts (username, first_name, last_name, phone_number, email, street_address, city, province, postal_code, birthday)
VALUES ('$username', '$first_name', '$last_name', '$phone_number', '$email', '$street_address', '$city', '$province', '$postal_code', '$birthday')";

// checks to see if the query is successful and redirects to main page
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	header('Location: main.php');
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
// close connection
$conn->close();


