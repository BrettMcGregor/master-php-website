<?php
    include 'includes/header.php';

    if (isset($_SESSION['u_id'])) {
    
        echo "<div class='alert alert-success'>".$_SESSION['u_first'].", you are logged in.</div>";
        echo '<form action="includes/logout.inc.php" method="POST">';
        echo '<button type="submit" name="submit">Logout</button>';
    }
?>

<head>
    <title>Signup</title>
</head>
<br>
<br>
<br>
<br>
<h2>Signup</h2>
<form action="includes/signup.inc.php" method="POST">
    <?php
        // if the form is submitted with an error, use the GET method to return the form data back to the form
        if (isset($_GET['first'])) {
        $first = $_GET['first'];   
        // Note the syntax for placing the variable into the value attribute
        echo '<input type="text" name="first" placeholder="Firstname" value="'.$first.'">';
        } 
        else {
        echo '<input type="text" name="first" placeholder="Firstname">';
        }

        if (isset($_GET['last'])) {
        $last = $_GET['last'];   
        echo '<input type="text" name="last" placeholder="Lastname" value="'.$last.'">';
        } 
        else {
        echo '<input type="text" name="last" placeholder="Lastname">';
        }
    
        if (isset($_GET['email'])) {
        $email = $_GET['email'];   
        echo '<input type="text" name="email" placeholder="Email" value="'.$email.'">';
        } 
        else {
        echo '<input type="text" name="email" placeholder="Email">';
        }

        if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];   
        echo '<input type="text" name="uid" placeholder="Username" value="'.$uid.'">';
        } 
        else {
        echo '<input type="text" name="uid" placeholder="Username">';
        }
    ?>
    <!-- Chosen not to return the password to the form -->
    <input type="password" name="pwd" placeholder="Password">
    <br>
    <button type="submit" name="submit">Submit</button>
</form>

<?php


if (!isset($_GET['signup'])) {
    exit();
} else {
    $signupCheck = $_GET['signup'];

    if ($signupCheck == "empty") {
        echo "<div class='alert alert-warning'>You did not complete all fields</div>";
        exit();
    }
    elseif ($signupCheck == "char") {
        echo "<div class='alert alert-warning'>You used invalid characters</div>";
        exit();
    }
    elseif ($signupCheck == "invalid-email") {
        echo "<div class='alert alert-warning'>You used an invalid email</div>";
        exit();
    }
    elseif ($signupCheck == "success") {
        echo "<div class='alert alert-success'>You have been signed up!</div>";
        exit();
    }
}



?>

</body>
</html>
