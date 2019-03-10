<?php 
session_start();
$id = $_GET['del'];
$link = mysqli_connect("localhost", "root", "", "addressbook");
// Check connection
if ($link->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM contacts WHERE contact_id=$id";

if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();



header('Location: show_contacts.php');