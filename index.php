<?php
    include "includes/header.php";

?>
<head>
    <title>Home/Login</title>
</head>

<div>
<?php
if (isset($_SESSION['u_id'])) {
    echo 
    '<form action="includes/logout.inc.php" method="POST">
    <button type="submit" name="submit">Logout</button>';
    echo "<p class='success'>You have been logged in.</p>";
} else {
    echo '
    <form action="includes/login.inc.php" method="POST">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="submit">Login</button>
        <a href="signup.php">Sign up</a>
    </form>
    
    ';
}


if (!isset($_GET['login'])) {
    exit();
} else {
    $loginCheck = $_GET['login'];

    if ($loginCheck == "nouser") {
        echo "<p class='error'>That user does not exist in the system. Please try again.</p>";
        exit();
    } elseif ($loginCheck == "wrongpwd") {
        echo "<p class='error'>The password you entered is incorrect. Please try again.</p>";
        exit();
    }
}

if (!isset($_GET['signup'])) {
    exit();
} else {
    $signupCheck = $_GET['signup'];

    if ($signupCheck == "success") {
        echo "<p class='success'>You have been signed up! Please Login.</p>";
        exit();
    }
}

?>
</div>
    
</body>
</html>