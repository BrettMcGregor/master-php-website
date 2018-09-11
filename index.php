<?php
    include "includes/header.php";

?>
<head>
    <title>Home/Login</title>
</head>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class='col-6'>
<?php
if (isset($_SESSION['u_id'])) {
    echo 
    '<form action="includes/logout.inc.php" method="POST">';
    echo '<div class="alert alert-success">'.$_SESSION["u_first"].', you are logged in.</div>';
    echo '<button type="submit" class="btn btn-primary" name="submit">Logout</button>';
} else {
    echo '
    <form action="includes/login.inc.php" method="POST">
    
    <div class="form-group">
        <label for="Username">Username</label><br>
        <input type="text" class="form-control" id="Username" name="uid" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="Password">Password</label><br>
        <input type="password" class="form-control" id="Password" name="pwd" placeholder="Password">
    </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
        <a href="signup.php">Sign up</a>
    </form>
    <br>
    ';
}


if (!isset($_GET['login'])) {
    if (!isset($_GET['signup'])) {
        exit();
    } else {
        $signupCheck = $_GET['signup'];
    
        if ($signupCheck == "success") {
            echo "<div class='alert alert-success'>You have been signed up! Please Login.</div>";
            exit();
        }
    }
    
} else {
    $loginCheck = $_GET['login'];

    if ($loginCheck == "nouser") {
        echo "<div class='alert alert-warning'>That user does not exist in the system. Please try again.</div>";
        exit();
    } 
    elseif ($loginCheck == "wrongpwd") {
        echo "<div class='alert alert-warning'>The password you entered is incorrect. Please try again.</div>";
        exit();
    } 
    elseif ($loginCheck == "empty") {
        echo "<div class='alert alert-warning'>Please enter a username and password.</div>";
        exit();
    }
}
?>
        </div>
    </div>
</div>
    
</body>
</html>