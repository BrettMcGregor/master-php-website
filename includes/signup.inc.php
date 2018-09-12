<?php

if (isset($_POST['submit'])) {
    // refer the database connection
    include_once 'db.inc.php';

    // get the user-entered data from the form
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    // check all fields contain data
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        // if any empty field, redirect to index
        header("Location: ../signup.php?signup=empty");
        exit();
        } else {
            // Check input characters are valid
            if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../signup.php?signup=char&first=$first&last=$last&email=$email&uid=$uid");
            exit();
            } else {
            // validate email, if not valid then redirect with error
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../signup.php?signup=invalid-email&first=$first&last=$last&uid=$uid");
                    exit(); 
                } else {
                    // check username not already taken
                    $sql = "SELECT * FROM users WHERE user_uid='uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        header("Location: ../index.php?signup=usernametaken");
                        exit();
                    } else {
                    // Insert into the database using the variables above
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES (?, ?, ?, ?, ?);";
                    $stmt = mysqli_stmt_init($conn);
                    // handle error with statement prepare
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL Error";
                        } 
                        else {
                            // Insert new user into database
                            // Hash the password
                            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                            // Bind parameters to the placeholder(s)
                            // "sssss" placeholders in the function here, correspond to the placeholders in the sql query
                            mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $email, $uid, $hashedPwd);
                            // Run parameters inside database
                            mysqli_stmt_execute($stmt);

                            // Insert user data into profile_img table
                            $sql = "SELECT * FROM users WHERE user_uid='$uid' AND user_first='$first'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $user_id = $row['user_id'];
                                    $sql = "INSERT INTO profile_img (user_id, status)
                                    VALUES ('$user_id', 0);";
                                    mysqli_query($conn, $sql);
                            } 

                            header("Location: ../index.php?signup=success");
                            exit();
                        }
                    
                    }
                    
                } 
            }
        }
    }
} else {
    header("Location: signup.php?signup=error");
    exit();
}

