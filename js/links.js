function validation() {
    var name = document.getElementById("fname").value;
    var lname = document.getElementById("lastName").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var rePass = document.getElementById("confirmPassword").value;


    if (name === "" || lname === "" ||  email === "" ||  password === "" ||  rePass === "") {
        alert("All fields are required");
        window.location.href = "signup.php";
    }  else {
        window.location.href = "login.php";
    }
    
}