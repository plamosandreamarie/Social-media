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
<html lang="en">
<?PHP include("temp/header.php");?>
    
</head>

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #fafafa;
    margin: 0;
    padding: 0;
}
.container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #262626;
}

.post {
    border: 1px solid #dbdbdb;
    border-radius: 5px;
    margin-bottom: 20px;
    padding: 10px;
    background-color: #fff;
}
.post-header {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}
.post-header img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}
.post-header h3 {
    margin: 0;
    font-size: 16px;
    color: #262626;
}
.post-title {
    font-size: 18px;
    margin: 10px 0;
    color: #262626;
}
.post-image {
    width: 100%;
    border-radius: 5px;
    margin-bottom: 10px;
}
.post-actions {
    display: flex;
    align-items: center;
}
.like-button {
    background: none;
    border: none;
    color: #262626;
    cursor: pointer;
    margin-right: 10px;
}
.like-button:hover {
    color: red;
}
.likes {
    font-size: 14px;
    color: #262626;
}
.comments {
    margin-top: 10px;
}
.comment {
    margin-bottom: 10px;
}
.comment p {
    margin: 0;
}
.reply-form {
    margin-top: 5px;
    display: none;
}
.reply-form textarea {
    width: calc(100% - 40px);
    margin-bottom: 5px;
}
.reply-form button {
    margin-top: 5px;
}
.post-form {
    margin-bottom: 20px;
}
.post-form textarea {
    width: 100%;
    margin-bottom: 10px;
}
.post-form button {
    float: right;
}
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #262626;
}
.post {
    border: 1px solid #dbdbdb;
    border-radius: 5px;
    margin-bottom: 20px;
    padding: 10px;
    background-color: #fff;
}
.post-header {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}
.post-header img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}
.post-header h3 {
    margin: 0;
    font-size: 16px;
    color: #262626;
}
.post-title {
    font-size: 18px;
    margin: 10px 0;
    color: #262626;
}
.post-image {
    width: 100%;
    border-radius: 5px;
    margin-bottom: 10px;
}
.post-actions {
    display: flex;
    align-items: center;
}
.like-button {
    background: none;
    border: none;
    color: #262626;
    cursor: pointer;
    margin-right: 10px;
}
.like-button:hover {
    color: red;
}
.likes {
    font-size: 14px;
    color: #262626;
}
.comments {
    margin-top: 10px;
}
.comment {
    margin-bottom: 10px;
}
.comment p {
    margin: 0;
}
.reply-form {
    margin-top: 5px;
    display: none;
}
.reply-form textarea {
    width: calc(100% - 40px);
    margin-bottom: 5px;
}
.reply-form button {
    margin-top: 5px;
}
</style>

<body>
    <?php include("temp/navigation.php");?>
    <div class="container">
        <br>
        <br>
        <a href="dashboard.php" class="d-flex justify-content-center text-decoration-none">
          <h1>  Intrigued </h1>
        </a>
        
        
        <div class="post-form">
            <textarea id="postCaption" placeholder="Write your caption"></textarea>
            <input type="file" id="postImage" accept="image/*">
            <button onclick="createPost()">Create Post</button>
        </div>

        <!-- Post Section -->
            <!-- Current PHP POst -->
            
        <?php
        $num = 1;
        $postContent = mysqli_query($connection, "SELECT * FROM tb_post ORDER BY postID DESC");
        ?>

        <?php foreach ($postContent as $feeder) { ?>
        
        <div class="post">
            <div class="post-header">
                <img src="44.jpg" alt="Profile Picture">
                <h3><?php echo $feeder['creator']; ?></h3>
                <button onclick="deletePost(this)">Delete</button> <!-- Delete Button -->
            </div>
            <h2 class="post-title"><?php echo $feeder['postname']; ?></h2>

            <img class="post-image" src="assets/<?php echo $feeder['content'] ?>" alt="assets/<?php echo $feeder['content'] ?>">
            <div class="post-actions">
                <button class="like-button" onclick="likePost(this)">&hearts;</button>
                <span class="likes">0 Likes</span>
            </div>
            <div class="comments">
                <div class="comment">
                    <p><strong>John:</strong> Nice picture!</p>
                    <button onclick="toggleReplyForm(this)">Reply</button>
                    <div class="reply-form">
                        <textarea placeholder="Write your reply"></textarea>
                        <button onclick="postReply(this)">Post Reply</button>
                    </div>
                </div>
            </div>
            <textarea class="comment-box" placeholder="Write a comment"></textarea>
            <button onclick="postComment(this)">Post Comment</button>
        </div>

        <?php } ?>        
        <!-- Additional Posts -->
        <!-- Additional Posts -->
        <!-- Additional Posts -->
    </div>

    <!-- JavaScript for interaction -->
    <script>
        
        function createPost() {
            var caption = document.getElementById("postCaption").value;
            var image = document.getElementById("postImage").files[0];
            if (caption.trim() === "") {
                alert("Please enter a caption for your post.");
                return;
            }
            if (!image) {
                alert("Please select an image for your post.");
                return;
            }
            var reader = new FileReader();
            reader.onload = function(event) {
                var postDiv = document.createElement("div");
                postDiv.classList.add("post");

                var postHeader = document.createElement("div");
                postHeader.classList.add("post-header");
                postHeader.innerHTML = `
                    <img src="profile_pic.jpg" alt="Profile Picture">
                    <h3>Andrea Marie Plamos</h3>
                    <button onclick="deletePost(this)">Delete</button>
                `;
                postDiv.appendChild(postHeader);

                var postTitle = document.createElement("h2");
                postTitle.classList.add("post-title");
                postTitle.textContent = "New Post";
                postDiv.appendChild(postTitle);

                var postCaption = document.createElement("p");
                postCaption.classList.add("post-caption");
                postCaption.textContent = caption;
                postDiv.appendChild(postCaption);

                var postImage = document.createElement("img");
                postImage.classList.add("post-image");
                postImage.src = event.target.result;
                postImage.alt = "Posted Image";
                postDiv.appendChild(postImage);

                var postActions = document.createElement("div");
                postActions.classList.add("post-actions");
                postActions.innerHTML = `
                    <button class="like-button" onclick="likePost(this)">&hearts;</button>
                    <span class="likes">0 Likes</span>
                `;
                postDiv.appendChild(postActions);

                var commentsSection = document.createElement("div");
                commentsSection.classList.add("comments");
                postDiv.appendChild(commentsSection);

                var commentBox = document.createElement("textarea");
                commentBox.classList.add("comment-box");
                commentBox.placeholder = "Write a comment";
                postDiv.appendChild(commentBox);

                var postButton = document.createElement("button");
                postButton.textContent = "Post Comment";
                postButton.onclick = function() { postComment(this); };
                postDiv.appendChild(postButton);

                // Append the post to the container
                document.querySelector(".container").insertBefore(postDiv, document.querySelector(".post-form").nextSibling);
            };
            reader.readAsDataURL(image);
        }

        function likePost(button) {
            var likesSpan = button.parentNode.querySelector('.likes');
            var currentLikes = parseInt(likesSpan.innerText);
            likesSpan.innerText = (currentLikes + 1) + ' Likes';
        }

        function postComment(button) {
            var commentBox = button.parentNode.querySelector('.comment-box');
            var commentText = commentBox.value;
            if (commentText.trim() !== '') {
                var commentDiv = document.createElement('div');
                commentDiv.innerHTML = '<p><strong>Andrea Marie Plamos:</strong> ' + commentText + '</p>';
                commentDiv.classList.add('comment');
                button.parentNode.querySelector('.comments').appendChild(commentDiv);
                commentBox.value = '';
            }
        }

        function deletePost(button) {
            var post = button.parentNode.parentNode;
            post.parentNode.removeChild(post);
        }
       
        function toggleReplyForm(button) {
            var replyForm = button.nextElementSibling;
            if (replyForm.style.display === 'none' || replyForm.style.display === '') {
                replyForm.style.display = 'block';
            } else {
                replyForm.style.display = 'none';
            }
        }

        function postReply(button) {
    var replyTextarea = button.parentNode.querySelector('textarea');
    var replyText = replyTextarea.value;
    if (replyText.trim() !== '') {
        var replyDiv = document.createElement('div');
        replyDiv.innerHTML = '<p><strong>Andrea Marie PLamos:</strong> ' + replyText + '</p>';
        replyDiv.classList.add('comment');
        button.parentNode.parentNode.insertBefore(replyDiv, button.parentNode.nextSibling);
        replyTextarea.value = '';
        button.parentNode.style.display = 'none';
    }
}
function showProfile() {
    var userDetails = {
        bio: "I love GOD",
        name: "Andrea Marie Plamos",
        address: "Pagatpat, CDO",
        age: 19,
        email: "anba.plamos.coc@phinnmaed.com"
    };
    
    var profileDetails = "Bio: " + userDetails.bio + "\n" +
                        "Name: " + userDetails.name + "\n" +
                        "Address: " + userDetails.address + "\n" +
                        "Age: " + userDetails.age + "\n" +
                        "Email: " + userDetails.email;
    
    alert(profileDetails);
}

function logout() {
    // Replace this with logic to log the user out
    alert("Logged out successfully!");
}

    </script>
</body>
</html>