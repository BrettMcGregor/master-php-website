<?php
    include "includes/header.php";
    include_once "includes/db.inc.php";
?>
<head>
    <title>Home/Login</title>
</head>
<div class="container" style="margin:100px">
    <div class="row">
        <div class='col-4'>
            <h2>Login</h2>
<?php
if (isset($_SESSION['u_id'])) {
    echo 
    '<form action="includes/logout.inc.php" method="POST">';
    echo '<div class="alert alert-success">'.$_SESSION["u_first"].', you are logged in.</div>';
    echo '<button type="submit" class="btn btn-primary" name="submit">Logout</button>';

    ?>  
<div class="container">
<h1>Latest News</h1>
    <h2>All articles</h2>
    <hr>
    </div>
    </div>
    <div class="container">
    <?php
    $sql = "SELECT * FROM article";
    $result = mysqli_query($conn, $sql);

    $queryResult = mysqli_num_rows($result);
    if ($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>
            <h3>".$row['a_title']."</h3>
            <p>".$row['a_text']."</p>
            <p>".$row['a_date']."</p>
            <p>".$row['a_author']."</p>
            <hr>
            </div>";
            
        }
    } else {
        echo "The query returned no results.";
    }

    ?>
</div>
<?php
} else {
    echo '
    <form action="includes/login.inc.php" method="POST">
    
    <div class="form-group">
        <input type="text" class="form-control" id="Username" name="uid" placeholder="Username">
    </div>
    <div class="form-group">
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

  


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>