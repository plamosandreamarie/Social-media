<?php 
// Replace all content from previous with this

include "sendDB/dbBridge.php";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbweb";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['password'];
$confirmPass = $_POST['confirmPassword'];

if (isset($_POST['confirm'])) {

    if ($pass != $confirmPass) {
        echo " <script>
        alert('Password does not match');
        </script>";
        header("refresh:2; url=addUser.php");
    } else {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tb_userprofile (firstname, surname, email_address, password)
            VALUES ('$fname', '$lname', '$email', '$pass')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            header("location: login.php");
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
          
          $conn = null;
    }

}

?>0