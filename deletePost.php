<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbweb";


$getID = $_SESSION['post_ID'];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to delete a record
  $sql = "DELETE FROM tb_post WHERE postID=$getID";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Record deleted successfully";
  header("Location: profile.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>