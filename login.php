<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage | Neils recipes</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<style>

</style>

<body>

<nav>
    <ul class="navbar">
        <li class="nav-logo"><a href="/">Neils Recipes</a></li>
        <li><a href="/recipelist.php">Recipes</a></li>
        <?php
        if (isset($loggedInUser)) {
            echo "<li><a href='./logout.php'>Logout $loggedInUser</a></li>";
        }
        ?>
    </ul>
</nav>

<main class="wrapper">
    <section class="container-centered">
        <div class="content-centered mt-3">

            <form id="loginForm" class="login-form" action="./auth.php" method="POST">

                <label for="email">Email</label>
                <input id="email" name="email" placeholder="email" type="text"/>

                <label for="password"> Password </label>
                <input id="password" name="password" placeholder="Password" type="password"/>

                <button id="signupButton" type="submit">Login</button>

            </form>
        </div>
        <div id="div1"></div>
    </section>
    <section class="container-centered">
        <p id="login-error"></p>
    </section>
</main>


<script src="./js/login.js"></script>


</body>
</html>
