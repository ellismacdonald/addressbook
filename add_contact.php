<!-- echo("<script>console.log('PHP: ".$sql."');</script>"); -->

<?php
session_start();
// $config = include('dbconfig.php');
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "addressbook";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

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
// VALUES ('$_SESSION[username]', 'John', 'Doe', '1-222-222-2222', 'john@example.com', 'street_address', 'city', 'ns', '122222', 'birthday')";

if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();

	// //set up database and table names
	// $db_name = "addressbook";
	// $table_name = "contacts";

	//connect to MySQL and select database to use
	// $connection = mysqli_connect($config['host'], $config['username'], $config['password']) 
	   //   or die(mysqli_error($connection));
	// $db = mysqli_select_db($connection, $db_name) or die(mysqli_error($connection));
	// echo("<script>console.log('DB: ".$db."');</script>");

	//create SQL statement and issue query
	// $sql = $connection->prepare("INSERT INTO $table_name (username, first_name, last_name, phone_number, email, street_address, city, province, postal_code, birthday) VALUES (?,?,?,?,?,?,?,?,?,?)");
	// 	$sql->bind_param("ssssssssss", $username, $first_name,$last_name,$phone_number,$email,$address,$city,$province,$postal_code,$bitrthday);
	// 	$sql = $connection->prepare("INSERT INTO $table_name (username, first_name, last_name, phone_number, email, street_address, city, province, postal_code, birthday) VALUES (?,?,?,?,?,?,?,?,?,?)");
	// 	$sql->bind_param("ssssssssss", $username, $first_name,$last_name,$phone_number,$email,$address,$city,$province,$postal_code,$bitrthday);

	// $username = $_SESSION["username"];
	// $first_name = $_POST["first_name"];
	// $last_name = $_POST["last_name"];
	// $phone_number = $_POST["phone_number"];
	// $email = $_POST["email"];
	// $address = $_POST["address"];
	// $city = $_POST["city"];
	// $province = $_POST["province"];
	// $postal_code = $_POST["postal_code"];
	// $birthday = $_POST["birthday"];
	// $sql->execute();
	
	// $sql->close();
	// $connection->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add a Record</title>
	</head>
	<body>
		<!-- <h1>Adding a Record to <?php echo "$table_name"; ?></h1>
		<table cellspacing=3 cellpadding=3>
			<tr>
				<td valign=top>
					<p><strong>ID:</strong><br>
					<?php echo "$_POST[id]"; ?></p>
					<p><strong>Date Acquired (YYYY-MM-DD):</strong><br>
					<?php echo "$_POST[date_acq]"; ?></p>
				</td>
				<td valign=top>
					<p><strong>Format:</strong><br>
					<?php echo "$_POST[format]"; ?>
					</p>
				</td>
			</tr>
			<tr>
				<td valign=top>
					<p><strong>Title:</strong><br>
					<?php echo "$_POST[title]"; ?></p>
					</td>
					<td valign=top>
					<p><strong>Record Label:</strong><br>
					<?php echo "$_POST[rec_label]"; ?></p>
				</td>
			</tr>
			<tr>
				<td valign=top>
					<p><strong>Artist's First Name:</strong><br>
					<?php echo "$_POST[artist_fn]"; ?></p>
					</td>
					<td valign=top>
					<p><strong>Artist's Last Name (or Group Name):</strong><br>
					<?php echo "$_POST[artist_ln]"; ?></p>
				</td>
			</tr>
			<tr>
				<td valign=top colspan=2 align=center>
					<p><strong>My Notes:</strong><br>
					<?php echo stripslashes($_POST['my_notes']); ?></p>
					<p><a href="show_addrecord.html">Add Another</a></p>
				</td>
			</tr>
		</table> -->
	</body>
</html>

