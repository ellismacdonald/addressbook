<?php 
try {
     $db = new PDO('mysql:host=localhost;dbname=addressbook', 'root', '');
     $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
     $error = $e->getMessage();
}