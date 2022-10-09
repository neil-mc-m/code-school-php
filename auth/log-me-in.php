<?php
session_start();

include '../User.php';
include '../database/Database.php';

$db = new Database();

if (!empty($_POST['loggedInName']) && isset($_POST['password'])) {
    $mysqlResult = $db->findUserFromUsername($_POST['loggedInName']);
    if ($mysqlResult->num_rows > 0) {
        $userData = $mysqlResult->fetch_assoc();
        if (password_verify($_POST['password'], $userData['password'])) {
            $userObject = new User($userData);
            $_SESSION['userId'] = $userObject->getId();
            if ($userObject->isUserAdmin()) {
                header('Location: /code-school-php/admin/dashboard.php');
                exit();
            } else {
                header("Location: /code-school-php/index.php");
                exit();
            }
        }
    } else {
        $_SESSION['error_message'] = 'Username or password incorrect';
        header("Location: /code-school-php/index.php");
        exit();
    }
}
