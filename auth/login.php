<?php
session_start();

if (isset($_SESSION['error_message'])) {
    echo $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}

if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
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
<main>
    <?php include '../includes/login_form.php' ?>
</main>

</body>
</html>
