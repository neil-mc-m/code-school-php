<?php
session_start();
include 'config/dbconfig.php';

$connection = getConnection();
if (!empty($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $statement = $connection->prepare("INSERT INTO users VALUES (DEFAULT, ?, ?, NOW(), DEFAULT, ?)");

    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $statement->bind_param('sss', $_POST['username'], $password_hash, $_POST['email']);
    $statement->execute();
    if ($statement->affected_rows === 1) {
        $_SESSION['success'] = "success. youre now registered";
        header('Location: index.php');
        exit();
    } else {
        echo "error registering";
    }
}
?>
<form action="" method="post">
    <input type="text" name="username">username
    <input type="password" name="password">password
    <input type="email" name="email">email
    <input type="submit">
</form>
