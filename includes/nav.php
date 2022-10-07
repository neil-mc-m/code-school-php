<?php

include __DIR__ . '/../User.php';

$links = [
    '/code-school-php/' => 'Home'
];

?>

<nav>
    <div class="site-logo">
        Neils Code classes
    </div>
    <?php
        $navHtml = "<div>";
        foreach ($links as $key => $value) {
            $navHtml .= "<li><a href='{$key}'>{$value}</a></li>";
        }

        if (isset($_SESSION['user'])) {
            $navHtml .= "<li><a href='/code-school-php/auth/logout.php'>Logout</a></li>";
        } else {
            $navHtml .= "<li><a href='/code-school-php/auth/signup.php'>Signup</a></li>";
            $navHtml .= "<li><a href='/code-school-php/auth/login.php'>Login</a></li>";
        }

        $navHtml .= "</div>";
        echo $navHtml;
    ?>
</nav>
