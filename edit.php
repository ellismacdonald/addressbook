<?php 

session_start();
// redirects user to login if they are not authorized
if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) {
   // Alright, let's show all the hidden functionality!
} else {
   // User is not authorized!
   header('Location: login.php');
   exit();
}

// db credentials
$db = mysqli_connect('localhost', 'root', '', 'addressbook');
// checks if user clicked edit and sets $id to selected record to edit
if (isset($_GET['edit'])) {
   $id = $_GET['edit'];
   $record = mysqli_query($db, "SELECT * FROM contacts WHERE contact_id=$id");
   
   $n = mysqli_fetch_array($record);
   $first_name = $n['first_name'];
   $last_name = $n['last_name'];
   $phone_number = $n['phone_number'];
   $email = $n['email'];
   $address = $n['street_address'];
   $city = $n['city'];
   $province = $n['province'];
   $postal_code = $n['postal_code'];
   $birthday = $n['birthday'];
   
}
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Add a Contact</title>
      <link rel="stylesheet" type="text/css" href="style.css">

   </head>
   <body>
      <h1>Editing a Contact</h1>			
      <form method="POST" action="edit_contact.php">
         <input type="hidden" name="id" value="<?php echo $id; ?>">
         <table cellspacing=3 cellpadding=3>
            <tr>
               <td valign=top>
                  <p><strong>First Name:</strong><br>
                  <input type="text" name="first_name" size=50 maxlength=50 value="<?php echo $first_name?>"></p>
               </td>	
               <td valign=top>
                  <p><strong>Last Name:</strong><br>
                  <input type="text" name="last_name" size=50 maxlength=50 value="<?php echo $last_name?>"></p>
               </td>	
            </tr>

            <tr>
               <td valign=top>
                  <p><strong>Phone Number:</strong><br>
                  <input type="text" name="phone_number" size=50 maxlength=50 value="<?php echo $phone_number?>"></p>
               </td>	
               <td valign=top>
                  <p><strong>Email:</strong><br>
                  <input type="text" name="email" size=50 maxlength=50 value="<?php echo $email?>"></p>
               </td>				
            </tr>	

            <tr>
               <td valign=top>
                  <p><strong>Address:</strong><br>
                  <input type="text" name="street_address" size=50 maxlength=50 value="<?php echo $address?>"></p>
               </td>
               <td valign=top>
                  <p><strong>City:</strong><br>
                  <input type="text" name="city" size=50 maxlength=50 value="<?php echo $city?>"></p>
               </td>
            </tr>

            <tr>
               <td valign=top>
                  <p><strong>Province:</strong><br>
                  <input type="text" name="province" size=50 maxlength=50 value="<?php echo $province?>"></p>
               </td>
               <td valign=top>
                  <p><strong>Postal Code:</strong><br>
                  <input type="text" name="postal_code" size=50 maxlength=50 value="<?php echo $postal_code?>"></p>
               </td>
            </tr>

            <tr>
               <td valign=top>
                  <p><strong>Birthday:</strong><br>
                  <input type="text" name="birthday" size=50 maxlength=50 value="<?php echo $birthday?>"></p>
               </td>
               <td>
                  <input type="submit" name="add" class="edit_btn" value="edit">
               </td>
            </tr>
         </table>

         
      </form>
   </body>
</html>

