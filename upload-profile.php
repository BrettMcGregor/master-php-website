<?php
    include "includes/header.php";
    include_once "includes/db.inc.php";

?>
<head>
<title>Update Profile Image</title>
</head>
<div class="container" style="margin:100px">
<div class="row">
        <div class='col-4'>

<?php
if(isset($_SESSION['u_id'])) {
    $user = $_SESSION['u_id'];
    $sql = "SELECT * FROM users WHERE user_id='$user';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['user_id'];
            $sqlImg = "SELECT * FROM profile_img WHERE user_id='$user_id'";
            $resultImg = mysqli_query($conn, $sqlImg);
            while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                echo '<div class="container">'; 
                    // if no profile photo then use default image
                    if ($rowImg['status'] == 0) {
                        echo "<img src='includes/default_user.png' class='img-thumbnail'>";
                    } else {
                        // use user profile image
                        // locate the profile image - different file extensions
                        $userImgPath = "uploads/profile".$user_id.".*";
                        $userImg = glob($userImgPath)[0];
                        
                        // add random extension to url to force browser to reload page
                        echo "<img src='".$userImg."?".mt_rand()." class='img-thumbnail' width='75%' height='75%'>";
                    };
                echo '</div>';
            }
        }
    } else {
        echo "There are no registered users!";
    }

}
    if(isset($_SESSION['u_id'])) {
        echo "<div class='alert alert-info'>You are logged in as ".$_SESSION['u_first'].".</div>";

        // Upload Profile Image Form
    echo '<h2>Upload a Profile Image</h2>
        <form action="includes/upload-profile.inc.php" method="POST" enctype="multipart/form-data">
            <input type="file" class="form-control-file" name="file">
            <button type="submit" class="btn btn-primary" name="submit">Upload</button>
        </form>
        <h2>Delete Profile Image</h2>
        <form action="includes/delete_profile.inc.php" method="POST">
            <button type="submit" class="btn btn-primary" name="submit">Delete Profile Image</button>
        </form>';
    } else {
        echo "<div>Upload form only appears once user is logged in.</div><br>
        <a class='btn btn-primary' href='index.php' role='button'>Login</button>";
    }

if (!isset($_GET['upload'])) {
    exit();
} else {
    $uploadCheck = $_GET['upload'];

    if ($uploadCheck == "large") {
        echo "<p class='alert alert-warning'>File too large!</p>";
        exit();
    }
    elseif ($uploadCheck == "type") {
        echo "<p class='alert alert-warning'>That file type is not allowed.</p>";
        exit();
    }
    elseif ($uploadCheck == "fileerror") {
        echo "<p class='alert alert-warning'>There was an error uploading your file.</p>";
        exit();
    }
    elseif ($uploadCheck == "success") {
        echo "<p class='alert alert-success'>File upload successful!</p>";
        exit();
    }

}

?>
</div>
</div>
</div>
