<?php
session_start();
require "connection.php";

if (isset($_POST["sendPost"])) {
    $msg = $_POST["myMessage"];
    if ($_FILES["myContent"]["error"] === 4) {
        echo "
        <script>
            alert('Failed to Upload');
        </script>
        ";
    } else {
        $iD = $_GET['userID'];
        $fullUser = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];

        $postName = $_FILES['myContent']['name'];
        $postSize = $_FILES['myContent']['size'];
        $tempPost = $_FILES['myContent']['tmp_name'];

        $onlyThese = ['jpg', 'png', 'jpeg'];
        $postExt = explode('.', $postName);
        $postExt = strtolower(end($postExt));

        if (!in_array($postExt, $onlyThese)) {
            echo "
            <script>
                alert('Invalid File Type');
            </script>
            ";
        } else if ($postSize > 1000000) {
            echo "
            <script>
                alert('File is too Large');
            </script>
            ";
        } else {
            $newPost = uniqid();
            $newPost .= '.' . $postExt;

            move_uploaded_file($tempPost, 'assets/' . $newPost);
            $query = "INSERT INTO tb_post VALUES('$iD', '', '$msg', '$newPost', '$fullUser')";
            mysqli_query($connection ,$query);
            echo "
            <script>
                alert('Posted Content');
            </script>
            ";
            header("location: profile.php");
        }
    }
}
?>