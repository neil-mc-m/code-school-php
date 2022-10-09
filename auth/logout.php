<?php
session_start();
session_destroy();
header('Location: /code-school-php/index.php');
exit;
