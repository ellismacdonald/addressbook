<?php

session_start();


if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) {
   // Alright, let's show all the hidden functionality!
} else {
	// User is not authorized!
	header('Location: login.php');
	exit();
}
if($_SESSION['username']){
	$username = $_SESSION['username'];
	}
$db_name = "addressbook";
$table_users = "users";
$table_contacts = "contacts";

$connection = @mysqli_connect("localhost", "root", "")
	or die(mysqli_error($connection));
$db = @mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));
$sql = "SELECT * FROM $table_contacts WHERE username = '$username'";