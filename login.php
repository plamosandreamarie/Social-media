<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "dbweb";

if (isset($_POST["confirm"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    try {
        // Create a PDO instance
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Query to fetch user data from the database
        $sql = "SELECT * FROM tb_userprofile WHERE email_address = '$email' AND password = '$pass'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
        if ($stmt->rowCount() == 1) {
            // User found, fetch user data
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Store user data in session variables
            $_SESSION['ID'] = $row['userID'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['surname'];
            $_SESSION['email'] = $row['email_address'];
            $_SESSION['birthdate'] = $row['date_of_birth'];
            // Add more session variables as needed

            echo "<script>alert(User found in Database)</script>";
            echo $_SESSION['ID'] . $_SESSION['firstname'] . $_SESSION['lastname'] . $_SESSION['email'] . $_SESSION['birthdate'];
            header("location: profile.php");
        } else {
            // User not found
            echo "<script>alert(User not found in the database.)</script>";
            header("refresh:3");
        }
    } catch(PDOException $e) {
        // Print error message
        echo "Connection failed: " . $e->getMessage();
    }
    
    // Close database connection
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('temp/header.php')?>
    <link rel="stylesheet" href="css/loginstyle.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <title>Login Form</title>
    <style>
        .fa-google {
            font-size: 30px; 
            color: rgb(255, 94, 0);
            cursor: pointer;
            margin-left: 45%;
            
        }
        .fa-google:hover {
            color: #b33000;
        }
        
        
    </style>
</head>
<body>
    <div class="login-container">
        <div class="inside-login">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Enter Email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>

                <a href="signup.php">Dont have an account?</a>
                <button type="submit" name="confirm">Log in</button>
            </form>
        </div>
    </div>
<?php include('temp/footer.php')?>
</html>
