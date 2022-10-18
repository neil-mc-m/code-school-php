<?php

if (!isset($_SESSION['userId'])) {
    header("Location: /code-school-php/index.php");
    exit();
}

$db = new Database();

$currentUser = $db->loadUserFromSession($_SESSION['userId']);

if (empty($currentUser)) {
    header("Location: /code-school-php/index.php");
    exit();
}


if (str_contains($_SERVER['REQUEST_URI'], '/code-school-php/admin/')) {
    if (!$currentUser->isUserAdmin()) {
        header("Location: /code-school-php/index.php");
        exit();
    }
}
