<?php
    include "includes/header.php";
?>
<head>
    <title>Upload and Delete Files</title>
</head>
<div class="container" style="margin:100px">
    <div class="row">
        <div class="col-6">
<h2>Upload a File</h2>
<form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
    <input type="file" class="form-control-file" name="file"><br>
    <button type="submit" class="btn btn-primary" name="submit">UPLOAD</button>
</form>
</div>

<?php


if (!isset($_SESSION['u_id'])) {
    exit();
} else {
    $id = $_SESSION['u_id'];
}

// get an array of files in the uploads directory. this is used to populate the select form element
$array = array_slice(scandir("uploads/"), 2);

// create an array of files that the user has uploaded
$userPath = "uploads/".$id."_*";
$userFiles = glob($userPath);

?>
<!-- Delete File Form -->

<div class="row">
        <div class="col-6">
    <h2>Delete File(s)</h2>
    <form action="includes/delete-file.inc.php" method="POST">
        <select name="files[]" size="10" multiple>
            <?php foreach($userFiles as $option) {
                ?><option value="<?php echo $option;?>"><?php echo $option; ?></option><?php
            }
            ?>
        </select>
        <button type="submit" class="btn btn-primary" name="submit">Delete</button>
    </form>
</div>
</div>
</div>
</div>
<div class="container">
    <div class="row">
        <!-- <div class="col-6"> -->


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


</body>
</html>