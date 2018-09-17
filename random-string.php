<?php
    include "includes/header.php";
    include_once "includes/db.inc.php";
 ?>

<head>
    <title>Random String</title>
</head>
<main>
<div class="container" style="margin-top:100px">
<h1>
<?php
    function generateKey() {
        $keyLength = 20;
        $str = "1234567890abcdefghijklmnopqrstuvwxyz()/$";
        $randString = substr(str_shuffle($str), 0, $keyLength);
        return $randString;
    }
    echo generateKey();
    echo '<br>';
    echo '<br>';

    function generateUnique() {
        $randStr = uniqid("Brett_", TRUE);
        return $randStr;
    }
    echo generateUnique();

    function checkKeys($conn, $randStr) {
        $sql = "SELECT * FROM keystring";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['stringKey'] == $randStr) {
                $keyExists = TRUE;
                break;
            } else {
                $keyExists = FALSE;
            }
        }
        return $keyExists;
    }

    function makeKey($conn) {
        $keyLength = 8;
        $str = "1234567890abcdefghijklmnopqrstuvwxyz()/$";
        $randStr = substr(str_shuffle($str), 0, $keyLength);

        $checkKey = checkKeys($conn, $randStr);

        while ($checkKey) {
            $randStr = substr(str_shuffle($str), 0, $keyLength);
            $checkKey = checkKeys($conn, $randStr);
        }
        return $randStr;
    }
    echo '<br>';
    echo '<br>';
    echo makeKey($conn);

    ?>
    </h1>
    </div>
</main>
</body>
</html>
