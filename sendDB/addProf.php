<?php

?>

<!DOCTYPE html>
<html lang="en">
<?php include("temp/header.php");?>
    <title>Create Post</title>
</head>
<body>

<div class="card">
    <div class="container-lg">
        <div class="text-center">
            <h2 class="text-center">Create a New Post</h2>

            <form action="" method="post" class="card-body">

            <label for="" class="form-label">Text Here:</label><br>
            <textarea id="content" name="txtContent"></textarea><br>

            <label for="" class="form-label">Send Image Here:</label><br>
            <input type="file" name="myContent">

            <div>
                <button type="submit" class="btn btn-success">Confirm Edit</button>
                <button onclick="sure()" class="btn btn-danger" >Cancel</button>
            </div>
        </form>     
        </div>
   
    </div>
</div>

    <script>
    function sure() {
        if(confirm("Are you sure to leave this page?")) {
            window.location.href = "profile.php";
        }
    }  
    </script>
<?php include("temp/footer.php");?>
</html>