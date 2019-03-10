<?php

if($_SESSION['username']){
	echo $_SESSION['username'];
	$username = $_SESSION['username'];
	}
$db_name = "addressbook";
$table_users = "users";
$table_contacts = "contacts";

$connection = @mysqli_connect("localhost", "root", "")
	or die(mysqli_error($connection));
$db = @mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));
$sql = "SELECT * FROM $table_contacts WHERE username = '$username'";