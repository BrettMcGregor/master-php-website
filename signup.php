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

<div class="container">
    <div class="row">
        <div class='col-6'>
        <h2>Signup</h2>
        <form action="includes/signup.inc.php" method="POST">
    <?php
        // if the form is submitted with an error, use the GET method to return the form data back to the form
        if (isset($_GET['first'])) {
        $first = $_GET['first'];   
        // Note the syntax for placing the variable into the value attribute
        echo '<div class="form-group">
            <label for="Firstname">Firstname</label>
            <input type="text" class="form-control" name="first" id="Firstname" placeholder="Firstname" value="'.$first.'">
            </div>';
        } 
        else {
        echo '<div class="form-group">
            <label for="Firstname">Firstname</label>
            <input type="text" class="form-control" name="first" id="Firstname" placeholder="Firstname">
            </div>';
        }

        if (isset($_GET['last'])) {
        $last = $_GET['last'];   
        echo '<div class="form-group">
            <label for="Lastname">Lastname</label>
            <input type="text" class="form-control" name="last" id="Lastname" placeholder="Lastname" value="'.$last.'">
            </div>';
        } 
        else {
        echo '<div class="form-group">
            <label for="Lastname">Lastname</label>
            <input type="text" class="form-control" name="last" id="Lastname" placeholder="Lastname">
            </div>';
        }
    
        if (isset($_GET['email'])) {
        $email = $_GET['email'];   
        echo '<div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" name="email" id="Email" placeholder="Email" value="'.$email.'">
        </div>';
        } 
        else {
        echo '<div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" name="email" id="Email" placeholder="Email">
        </div>';
        }

        if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];   
        echo '<div class="form-group">
        <label for="Username">Username</label>
        <input type="text" class="form-control" name="uid" id="Username" placeholder="Username" value="'.$uid.'">
        </div>';
        } 
        else {
        echo '<div class="form-group">
        <label for="Username">Username</label>
        <input type="text" class="form-control" name="uid" id="Username" placeholder="Username">
        </div>';
        }
    ?>
    <!-- Chosen not to return the password to the form -->
    <div class="form-group">
        <label for="Password">Password</label><br>
        <input type="password" class="form-control" name="pwd" id="Password" placeholder="Password">
    </div>
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
        </div>
    </div>
</div>

</body>
</html>
