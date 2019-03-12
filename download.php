<?php
    // mysql database conn details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "addressbook";

    // open conn to mysql database
    $conn = mysqli_connect($host, $username, $password, $dbname) or die("conn Error " . mysqli_error($conn));
    
    // fetch mysql table rows
    $sql = "select * from contacts";
    $result = mysqli_query($conn, $sql) or die("Selection Error " . mysqli_error($conn));

    $fp = fopen('contacts.csv', 'w');

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }
    
    fclose($fp);

    //close the db conn
    mysqli_close($conn);

    header('Location: main.php');
?>