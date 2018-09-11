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

<div class="container" style="margin:100px">
    <div class="row">
        <div class='col-4'>
        <h2>Signup</h2>
        <form action="includes/signup.inc.php" method="POST">
    <?php
        // if the form is submitted with an error, use the GET method to return the form data back to the form
        if (isset($_GET['first'])) {
        $first = $_GET['first'];   
        // Note the syntax for placing the variable into the value attribute
        echo '<div class="form-group">
            <input type="text" class="form-control" name="first" id="Firstname" placeholder="Firstname" value="'.$first.'">
            </div>';
        } 
        else {
        echo '<div class="form-group">
            <input type="text" class="form-control" name="first" id="Firstname" placeholder="Firstname">
            </div>';
        }

        if (isset($_GET['last'])) {
        $last = $_GET['last'];   
        echo '<div class="form-group">
            <input type="text" class="form-control" name="last" id="Lastname" placeholder="Lastname" value="'.$last.'">
            </div>';
        } 
        else {
        echo '<div class="form-group">
            <input type="text" class="form-control" name="last" id="Lastname" placeholder="Lastname">
            </div>';
        }
    
        if (isset($_GET['email'])) {
        $email = $_GET['email'];   
        echo '<div class="form-group">
        <input type="text" class="form-control" name="email" id="Email" placeholder="Email" value="'.$email.'">
        </div>';
        } 
        else {
        echo '<div class="form-group">
        <input type="text" class="form-control" name="email" id="Email" placeholder="Email">
        </div>';
        }

        if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];   
        echo '<div class="form-group">
        <input type="text" class="form-control" name="uid" id="Username" placeholder="Username" value="'.$uid.'">
        </div>';
        } 
        else {
        echo '<div class="form-group">
        <input type="text" class="form-control" name="uid" id="Username" placeholder="Username">
        </div>';
        }
    ?>
    <!-- We will not return the password to the form -->
    <div class="form-group">
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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
