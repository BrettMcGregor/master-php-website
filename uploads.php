<?php
    include "includes/header.php";


?>
<div class="container" style="margin:100px">
<div class="row">
        <div class='col-4'>
<h2>Upload a File</h2>
<form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
    <input type="file" class="form-control-file" name="file"><br>
    <button type="submit" class="btn btn-primary" name="submit">UPLOAD</button>
</form>
<br>
<?php

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
