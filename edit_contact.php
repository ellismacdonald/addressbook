<?php 
session_start();


if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) {
   // Alright, let's show all the hidden functionality!
} else {
	// User is not authorized!
	header('Location: login.php');
	exit();
}
$id = $_POST['id'];
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

$sql = "UPDATE contacts SET first_name='".$first_name."',last_name='".$last_name."',phone_number='".$phone_number."',email='".$email."',street_address='".$street_address."',city='".$city."',province='".$province."',postal_code='".$postal_code."',birthday='".$birthday."' WHERE contact_id=".$id;

if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();