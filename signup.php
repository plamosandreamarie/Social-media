<!DOCTYPE html>
<html lang="en">
<?php include('temp/header.php')?>
    <link rel="stylesheet" href="css/signupstyle.css">
    <title>Sign Up Form</title>
</head>
<body>
    <section class="signup-container">
        <h1>Sign Up</h1>
        <form action="addUser.php" method="post" id="signupForm">
            <label for="firstName">First Name:</label>
            <input type="text" id="danger" name="fname" required>
            <div id='1' class="text-1red-600"></div>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lname" required>
            <div id='2' class="text-1red-600"></div>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <div id='3' class="text-1red-600"></div>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <div id='4' class="text-1red-600"></div>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
            <div id='5' class="text-1red-600"></div>

            <button type="submit" name='confirm' value='submit' onclick="validation()">Sign Up</button>

            <div class="signup-link">
                    <p>Have an account? <a href="login.php">Sign In</a></p>
            </div>
        </form>
    </section>    

    <script src="js/links.js">
        validation();
    </script>

<?php include('temp/footer.php')?>
</html>
