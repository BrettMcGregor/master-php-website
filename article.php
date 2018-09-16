<?php
    include "includes/header.php";
    include_once "includes/db.inc.php";
?>
<head>
    <title>Article</title>
</head>
<div class="container" style="margin:100px">
    <div class="row">
        <div class='col-4'>


<h1>From Latest News</h1>
<div class="container">
    <hr>
    </div>
    </div>
    <div class="container">
    <?php
    $title = mysqli_real_escape_string($conn, $_GET['title']);
    $date = mysqli_real_escape_string($conn, $_GET['date']);

    $sql = "SELECT * FROM article WHERE a_title='$title' AND a_date='$date';";
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