<?php 
session_start();
// gets the contact_id associated with the selected record to delete
$id = $_GET['del'];

//connection credentials
$conn = mysqli_connect("localhost", "root", "", "addressbook");
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
// sql statement
$sql = "DELETE FROM contacts WHERE contact_id=$id";
// check if query was successful
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// close connection
$conn->close();
//redirect to show contacts page
header('Location: show_contacts.php');