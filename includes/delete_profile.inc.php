<?php
session_start();
include_once 'db.inc.php';

// get the id of the logged in user
$sessionId = $_SESSION['u_id'];
// pattern to match the profile image filename for current user
$fileName = "../uploads/profile".$sessionId.".*";
$fileInfo = glob($fileName);
$fileExt = explode(".", $fileInfo[0]);
$fileActualExt = $fileExt[3];

$file = "../uploads/profile".$sessionId.".".$fileActualExt;
// echo "$file";

if (!unlink($file)) {
    echo "Error deleting file.";
} else {
    // delete file
    header("Location: ../upload-profile.php");
}

// we need to update the status column in the profile_img table
$sql = "UPDATE profile_img SET status=0 WHERE user_id='$sessionId';";
mysqli_query($conn, $sql);
header("Location: ../upload-profile.php");