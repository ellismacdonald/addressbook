<?php 
session_start();
error_reporting(E_ERROR | E_PARSE);
if($_SESSION['username']){
	$username = $_SESSION['username'];
	}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$conn = mysqli_connect("localhost", "root", "", "addressbook");

	if (isset($_POST["import"])) {
		$fileName = $_FILES["file"]["tmp_name"];

		if ($_FILES["file"]["size"] > 0) {

			$file = fopen($fileName, "r");

			while (($column = @fgetcsv($file, 10000, ",")) !== FALSE) {
				$sqlInsert = "INSERT into contacts (username, first_name, last_name, phone_number, email,street_address, city, province, postal_code,birthday)
				values ('" . $username . "','" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "')";
				$result = mysqli_query($conn, $sqlInsert);

				if (empty($result)) {
					$type = "success";
					$message = "CSV Data Imported into the Database";
				} else {
					$type = "error";
					$message = "Problem in Importing CSV Data";
				}
			}
		}
	}

}
?>
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
<form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="uploadCSV"
   enctype="multipart/form-data">
   <div class="input-row">
      <label class="col-md-4 control-label">Choose CSV File</label> <input
         type="file" name="file" id="file" accept=".csv">
      <button type="submit" id="submit" name="import"
         class="btn-submit">Import</button>
		<br />
		<input type="hidden" name="upload"/>

   </div>
   <div id="labelError"><?php echo $message?></div>
</form>
<form action="main.php" method="post">
		<p>
				<input type="submit" name="add" id="login" value="Back to Main">
		</p>
	</form>
</body>
</html>