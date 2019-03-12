<?php 
session_start();
// this prevents user from accessing page from url without being logged in
if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) {
   // nothing happens if true
} else {
	// if user isnt authorized, they are redirected back to login screen
   header('Location: login.php');
   exit();
}

// $id associates record chosen to record in the database and is used in the query
$id = $_POST['id'];
// db credentials
$conn = mysqli_connect("localhost", "root", "", "addressbook");
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 


// the following also strips special characters from the entered data to prevent sql injections
// this is the user login name
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

// sql statement for editing the selected contact
$sql = "UPDATE contacts SET first_name='".$first_name."',last_name='".$last_name."',phone_number='".$phone_number."',email='".$email."',street_address='".$street_address."',city='".$city."',province='".$province."',postal_code='".$postal_code."',birthday='".$birthday."' WHERE contact_id=".$id;

// check if query works, close connection
if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: main.php');