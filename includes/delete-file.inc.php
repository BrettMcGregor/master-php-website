<?php

// below code gets selected files into an array
$files = array($_POST['files']);
print_r($files);

// can then do a loop to delete each file in turn
foreach ($_POST['files'] as $selection)
    if (!unlink("../uploads/".$selection)) {
        # error message
        echo 'There was an error.';
    } else {
        
        # success message
        header("Location: ../uploads.php?delete=success");
}
