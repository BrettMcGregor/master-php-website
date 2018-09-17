<?php
    include "includes/header.php";
?>

<head>
    <title>Contact Form</title>
</head>

<main>
<div class="container" style="margin-top:100px">  
<h3>Contact Form</h3>
<form action="includes/contact.inc.php" method="POST">
    <div class="form-group">
        <input class="form-control" type="text" name="name" placeholder="Full name">
    </div>
    <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Your Email">
    </div>
    <div class="form-group">
        <input class="form-control" type="subject" name="subject" placeholder="Subject">
    </div>
    <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
    <button class="btn btn-primary" type="submit" name="submit" style="margin-top:10px">Send Message</button>
</form>

<?php
if (!isset($_GET['mail'])) {
    exit();
} else {
    $emailCheck = $_GET['mail'];

    if ($emailCheck == 'success') {
        echo "<p class='alert alert-success' style='margin-top:10px'>Message sent!</p>";
        exit();
    }
}
?>
</div>



</main>
</body>
</html>