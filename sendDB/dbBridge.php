<?php
$conn = "mysql:host=localhost;dbname=dbweb";
$dbuser = "localhost";
$dbpass = "";

    try {
      $myPDO = new PDO($conn, $dbuser, $dbpass);
      $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection Terminated " . $e->getMessage();
    }
?>