<?php

if (!isset($_SESSION['user'])) {
    header("Location: /code-school-php/auth/auth.php");
    exit();
}
