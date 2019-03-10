<?php 
session_start();


if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) {
   // Alright, let's show all the hidden functionality!
} else {
	// User is not authorized!
	header('Location: login.php');
	exit();
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Auto Login</title>
</head>

<body>
<h1>Main menu</h1>

<label>See your contacts</label>
<form action="show_contacts.php" method="post">
    <p>
        <input type="submit" name="see" id="login" value="see">
    </p>
</form>


<label>Add Contacts</label>
<form action="contact.php" method="post">
    <p>
        <input type="submit" name="add" id="login" value="add">
    </p>
</form>

<label>Birthdays This Month</label>
<form action="birthday.php" method="post">
    <p>
        <input type="submit" name="add" id="login" value="birthday">
    </p>
</form>

<label>upload a csv file</label>
<form action="upload.php" method="post">
    <p>
        <input type="submit" name="add" id="login" value="upload">
    </p>
</form>

<label>Download contacts into csv file</label>
<form action="download.php" method="post">
    <p>
        <input type="submit" name="add" id="login" value="download">
    </p>
</form>

<label>Email contacts</label>
<form action="email.php" method="post">
    <p>
        <input type="submit" name="add" id="login" value="email">
    </p>
</form>

</body>
</html>