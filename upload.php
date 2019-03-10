<?php 
session_start();
if($_SESSION['username']){
	$username = $_SESSION['username'];
	}

$conn = mysqli_connect("localhost", "root", "", "addressbook");

if (isset($_POST["import"])) {
	$fileName = $_FILES["file"]["tmp_name"];

	if ($_FILES["file"]["size"] > 0) {

		$file = fopen($fileName, "r");

		while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
			$sqlInsert = "INSERT into contacts (username, first_name, last_name, phone_number, email,street_address, city, province, postal_code,birthday)
			values ('" . $username . "','" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "')";
			$result = mysqli_query($conn, $sqlInsert);

			if (! empty($result)) {
				$type = "success";
				$message = "CSV Data Imported into the Database";
			} else {
				$type = "error";
				$message = "Problem in Importing CSV Data";
			}
		}
	}
}
if (mysqli_num_rows($result) > 0) {
?>
<table>
	<thead>
		<tr>
			<th>Representative</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone Number</th>
			<th>Email</th>
			<th>Address</th>
			<th>City</th>
			<th>Province</th>
			<th>Postal Code</th>
			<th>Birthday</th>

			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
			<td><?php echo $row['phone_number']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['street_address']; ?></td>
			<td><?php echo $row['city']; ?></td>
			<td><?php echo $row['province']; ?></td>
			<td><?php echo $row['postal_code']; ?></td>
			<td><?php echo $row['birthday']; ?></td>
			<td>
				<a href="edit.php?edit=<?php echo $row['contact_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="delete.php?del=<?php echo $row['contact_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<?php } ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Page Title</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" media="screen" href="main.css">
   <script src="main.js"></script>
   <script type="text/javascript">
   $(document).ready(
   function() {
      $("#frmCSVImport").on(
      "submit",
      function() {

         $("#response").attr("class", "");
         $("#response").html("");
         var fileType = ".csv";
         var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+("
               + fileType + ")$");
         if (!regex.test($("#file").val().toLowerCase())) {
            $("#response").addClass("error");
            $("#response").addClass("display-block");
            $("#response").html(
                  "Invalid File. Upload : <b>" + fileType
                        + "</b> Files.");
            return false;
         }
         return true;
      });
   });
</script>
</head>
<body>
<form class="form-horizontal" action="" method="post" name="uploadCSV"
   enctype="multipart/form-data">
   <div class="input-row">
      <label class="col-md-4 control-label">Choose CSV File</label> <input
         type="file" name="file" id="file" accept=".csv">
      <button type="submit" id="submit" name="import"
         class="btn-submit">Import</button>
      <br />

   </div>
   <div id="labelError"></div>
</form>
</body>
</html>