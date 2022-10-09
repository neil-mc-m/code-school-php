<?php
session_start();

$message = '';
if (isset($_SESSION['error_message'])) {
    $message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}

if (isset($_SESSION['success'])) {
    $message = "<div class='flash-message''>{$_SESSION['success']}</div>";
    unset($_SESSION['success']);
}
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="../css/main.css">
<body>

<header>
    <?php include '../includes/nav.php' ?>
</header>
    <?php echo $message?>
<main>
    <?php include '../includes/login_form.php' ?>
</main>

</body>
</html>
