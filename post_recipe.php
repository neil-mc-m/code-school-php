<?php
session_start();
require_once './src/DatabaseConnection.php';

if (!isset($_SESSION['email'])) {
    header('Location: index.php', false, 403);
    exit();
}

$loggedInUser = $_SESSION['email'];
$connection = (new \App\DatabaseConnection())->getConnection();
$statement = $connection->prepare('SELECT * from user where email = ?;');
$statement->bind_param('s', $loggedInUser);
$statement->execute();

$result = $statement->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if ($user['role'] != 'admin') {
        header('Location: index.php', true, 403);
        exit();
    }
}

if (isset($_POST['name']) && isset($_POST['description'])) {
    $connection = (new \App\DatabaseConnection())->getConnection();
    $statement = $connection->prepare('INSERT INTO recipe_list (name, description) VALUES (?,?);');
    $statement->bind_param('ss', $_POST['name'], $_POST['description']);
    $hasPosted = $statement->execute();

    if ($hasPosted) {
        $message = 'Success';
    } else {
        $message = 'failed';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage | Neils recipes</title>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
<nav>
    <ul class="navbar">
        <li class="nav-logo"><a href="/">Neils Recipes</a></li>
        <li><a href="/recipelist.php">Recipes</a></li>
    </ul>
</nav>
<main class="wrapper">
    <section class="container-centered">
        <div>
            <form action="" method="POST">
                <label for="name">Name</label>
                <input id="name" name="name" placeholder="Recipe name" type="text"/>

                <label for="description">Name</label>
                <textarea id="description" name="description" placeholder="Recipe description"></textarea>
                <button type="submit">Search</button>
            </form>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </div>
    </section>
    </section>
</main>

</body>
</html>



