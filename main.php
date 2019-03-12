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
<link rel="stylesheet" type="text/css" href="style.css">

<title>Auto Login</title>
</head>

<body>
<div class="content">
    <h1 class="title-main">Main menu</h1>
    <table>
        <tr>
            <td>
                <label>See your contacts</label>
                <form action="show_contacts.php" method="post">
                    <p>
                        <input type="submit" name="see" id="login" value="see">
                    </p>
                </form>
            </td>
            <td>
                <label>Add Contacts</label>
                <form action="contact_form.php" method="post">
                    <p>
                        <input type="submit" name="add" id="add" value="add">
                    </p>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <label>Birthdays This Month</label>
                <form action="birthday.php" method="post">
                    <p>
                        <input type="submit" name="add" id="birthday" value="birthday">
                    </p>
                </form>
            </td>
            <td>
                <label>upload a csv file</label>
                <form action="upload.php" method="post">
                    <p>
                        <input type="submit" name="add" id="upload" value="upload">
                    </p>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <label>Download contacts into csv file</label>
                <form action="download.php" method="post">
                    <p>
                        <input type="submit" name="add" id="download" value="download">
                    </p>
                </form>
            </td>
            <td>
                <label>Email contacts</label>
                <form action="email.php" method="post">
                    <p>
                        <input type="submit" name="add" id="email" value="email">
                    </p>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <label>Register A new User</label>
                <form action="register.php" method="post">
                    <p>
                            <input type="submit" name="add" id="register" value="Register">
                    </p>
                </form>
            </td>
        
            <td>
                <label>Logout</label>
                <form action="logout.php" method="post">
                    <p>
                        <input type="submit" name="add" id="logout" value="logout">
                    </p>
                </form>
            </td>
        </tr>
    </table>
</div>
</body>
</html>