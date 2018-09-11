<?php


if (!isset($_POST['submit'])) {
    echo "Error.";
} else {
    $file = $_FILES['file'];
    
    // now get file information
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    

    // control allowable file types for upload
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileSize < 512000) {
            if ($fileError === 0) {
                // now upload the file
                // give the file a unique name to prevent duplicates/overwrite
                $fileNameNew = uniqid('', TRUE).".".$fileActualExt;
                // set up upload destination
                $fileDestination = "../uploads/".$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: ../uploads.php?upload=success");
            } else {    
                header("Location: ../uploads.php?upload=fileerror");
            }
        } else {
            header("Location: ../uploads.php?upload=large");
        }
    } else {
        header("Location: ../uploads.php?upload=type");
    }
}
    


?>