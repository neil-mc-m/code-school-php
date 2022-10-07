<?php
session_start();

include __DIR__ .'/../database/Database.php';

$db = new Database();

if (!empty($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $statement = $db->registerUser($_POST['username'], $_POST['password'], $_POST['email']);
    if ($statement->affected_rows === 1) {
        $_SESSION['success'] = "success. youre now registered";
        header('Location: index.php');
        exit();
    } else {
        echo "error registering";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="../css/main.css">
<body>

<header>
    <?php include __DIR__ . '/../includes/nav.php' ?>
</header>
<main>
    <form action="" method="post" id="signupForm">
        <h4 class="class-row">Signup</h4>
        <div class="form-input">
            <label for="signupUserName">Username</label>
            <input id="signupUserName" type="text" name="username">
        </div>
        <div class="form-input">
            <label for="signupPassword">Password</label>
            <input id="signupPassword" type="password" name="password">
        </div>
        <div class="form-input">
            <label for="signupEmail">Email</label>
            <input id="signupEmail" type="email" name="email">
        </div>
        <div class="form-input">
            <input type="submit">
        </div>

    </form>
</main>
</body>
</html>

