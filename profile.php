<?php
require 'connection.php';
session_start();


if (!isset($_SESSION['firstname'])) {
    echo "firstname is missing";
} else {
    $callName = $_SESSION['firstname'];
}

if (!isset($_SESSION['lastname'])) {
    echo "lastname is missing " . $_SESSION['lastname'];
} else {
    $callLast = $_SESSION['lastname'];
}

if (!isset($_SESSION['email'])) {
    echo "Email is missing " . $_SESSION['email'];
} else {
    $callMail = $_SESSION['email'];
}

if (!isset($_SESSION['email'])) {
    echo "Update Birthdate" . $_SESSION['birthdate'];
} else {
    $callMyDate = $_SESSION['birthdate'];
}

?>

<!DOCTYPE html>
<html>
<?php include("temp/header.php"); ?>
<link rel="stylesheet" href="css/dashstyle.css">
<style>
    .nav-bar {
        width: 100%;
        height: 50px;
        background-color: rgba(32, 0, 0, 0.5);
        /* Add transparency here */
        border-bottom: 1px solid #ccc;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 10px;
        box-sizing: border-box;
        position: relative;
    }

    .logo {
        width: 50px;
        height: 50px;
        /* Adjust this */
        border: 1px solid #ccc;
        background-color: #b30000;
        border-radius: 50%;
        position: absolute;
        left: 10px;
        /* Adjust this */
        top: 50%;
        /* Adjust this */
        transform: translate(0, -50%);
        /* Adjust this */
    }

    #prof_picture {
        width: 180px;
        height: 180px;
        border-radius: 100%;
        object-fit: cover;
    }

    .post-image {
        width: 50%;
        height: 50%;
        margin: auto;
        /* This centers the image horizontally within its container */
    }
</style>
</head>

<body>
    <?php include("temp/navigation.php"); ?>


    <center>
        <br>
        <br>
        <div class="column">
            <div class="col-5">
                <div id="profile">
                    <!-- User Profile -->
                    <div class="container-fluid mt-5 ms-3 w-75 ms-auto">
                        <h1>
                            <p class="display-3 text-center h3">Your Profile</p>
                        </h1>
                        <div class="card border-1 p-2">
                            <div class="d-flex justify-content-between">

                                <img src="assets/image.png" id="prof_picture" class="col-2">
                                <p class="display-5 text-center col"><br>
                                    <?php echo $callName . " <br> " . $callLast; ?>
                                </p>
                                <div class="row">
                                    <p class="text-center">Birthday:
                                        <?php echo $callMyDate; ?>
                                    </p>
                                </div>

                            </div>

                            <!-- Button for Editing Profile Here -->
                            <button class="btn btn-outline-secondary" onclick="locateEdit()">
                                <i class="bi bi-pencil-square">Edit Profile</i>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div id="myContent">
                    <!-- Send your Post through here -->
                    <div class="container-fluid container-lg mt-5">
                        <div class="card border-1 p-3">
                            <p class="display-5 text-center" id="">Share a thought</p>
                            <div class="">
                                <form action="myContent.php" method="post" class="mb-3" enctype="multipart/form-data">
                                    <label for="">Your Message:</label><br>
                                    <textarea name="myMessage" id="msg" cols="45" rows="3" placeholder="Type your message here:"></textarea><br>

                                    <!-- Image Here -->
                                    <label for="" class="form-label">Send Content</label><br>
                                    <input type="file" name="myContent" accept=".jpg, .png" id="content">

                                    <!-- Button for Posting Here -->
                                    <button type="submit" name="sendPost" class="btn btn-outline-success">
                                        <i class="bi bi-send">Send Post</i>
                                    </button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>


    <!-- Check your Posts Here -->

    <div class="container-fluid mt-5">


        <?php
        $num = 1;
        $postContent = mysqli_query($connection, "SELECT * FROM tb_post");
        
        ?>

        <?php foreach ($postContent as $feeder) { ?>

            <center>
            
                <div class="post col-xl-6">
                    <div class="post-header">
                        <img src="44.jpg" alt="Profile Picture">
                        <h3>
                            <?php echo $feeder['creator']; ?>
                        </h3>
                    </div>
                    <h2 class="post-title">
                    <?php echo $_SESSION['post_ID'] = $feeder['postID']; ?>
                    
                        <?php echo $feeder['postname']; ?>
                    </h2>

                    <img class="post-image smaller-image" src="assets/<?php echo $feeder['content'] ?>" alt="assets/<?php echo $feeder['content'] ?>">
                    <!-- Add the "smaller-image" class to the img tag above -->

                    <div class="post-actions">
                        <button class="like-button" onclick="likePost(this)">♥</button>
                        <span class="likes">0 Likes</span>
                    </div>
                    <div class="comments">
                        <div class="comment">
                            <p><strong>John:</strong> Nice picture!</p>

                            <div class="reply-form">
                                <textarea placeholder="Write your reply"></textarea>

                                <button onclick="postReply(this)">Post Reply</button>
                            </div>
                        </div>
                    </div>

                    <textarea class="comment-box" placeholder="Write a comment"></textarea>
                    <button onclick="postComment(this)">Post Comment</button>
                    <button onclick="toggleReplyForm(this)">Reply</button>

                    <form action="deletePost.php" method="post">
                        <button onclick="deletePost(this)" type="submit" name="delete">
                            
                            <a href="deletePost.php" class="text-decoration-none text-danger">Delete</a>
                        </button> <!-- Delete Button -->
                    </form>

                </div>



            <?php } ?>
            </center>
    </div>


    <script>
        function locateEdit() {
            window.location.href = "editProfile.php";
        }
    </script>

    <?php include("temp/footer.php"); ?>

</html>