<?php

if (isset($_POST['confirm'])) {

  $email = $_POST["email"];
  $pass = $_POST["password"];


  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dbweb";
  
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tb_userprofile WHERE userID='$email'");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    header("Location: Dashboard.php");
    
    // echo "<script>
    //   window.location.href = '/Exam%20p3/Dashboard.php';
    // </script>";
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;

}
?>