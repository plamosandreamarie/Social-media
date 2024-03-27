<?php
include "sendDB/dbBridge.php";
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbweb";


$_GET['newID'] = $_SESSION['ID'];
echo $myID = $_GET['newID'];


if (isset($_POST['submit'])) {
    $newFName = $_POST['editFName'];
    $newLName = $_POST['editLName'];
    $newBDate = $_POST['editBDate'];


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        $sql = "UPDATE tb_userprofile SET firstname='$newFName', surname='$newLName', date_of_birth='$newBDate' WHERE userID='$myID'";
      
        // Prepare statement
        $stmt = $conn->prepare($sql);
      
        // execute the query
        $stmt->execute();
      
        // echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        header("Location: profile.php");
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
}


?>


<!DOCTYPE html>
<html lang="en">
<?php include 'temp/header.php'; ?>

<body>
    <div class="container-fluid">
        <div class="col-md-4">
            <div class="card p-5 m-5 ">

                <h1 class="text-center">Edit Profile</h1>
                <form action="" method="post">
                    <div class="input-field">

                        <label for="">First Name</label><br>
                        <input type="text" name="editFName" id="" placeholder="firstname">

                        <br>
                        <label for="">Last Name</label><br>
                        <input type="text" name="editLName" id="" placeholder="lastname">

                        <br>
                        <label for="">Birth Date</label><br>
                        <input type="date" name="editBDate" id="" placeholder="00-00-0000">

                        <br>
                        <div class="my-3">
                            <button type="submit" name="submit" class="btn btn-success">Edit</button>
                            <button name="cancel" class="btn btn-warning" onclick="goBack()">Cancel</button>
                        </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        function goBack() {
            if (confirm("Are you sure to go back?")) {
                window.location.href = "profile.php";
            }
        }
    </script>

    <?php include 'temp/footer.php'; ?>

</html>