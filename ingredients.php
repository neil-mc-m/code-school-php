<?php
session_start();
// ingredients search

require_once './src/DatabaseConnection.php';

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];
}

$connection = (new \App\DatabaseConnection())->getConnection();

if (isset($_GET['id'])) {

    $statement = $connection->prepare('SELECT * from ingredients WHERE recipe_id = ?');

    $statement->bind_param('s', $_GET['id']);

    $statement->execute();

    $result = $statement->get_result();

    if ($result->num_rows > 0) {

        $ingredients = $result->fetch_assoc();

        $ingredientList = $ingredients['list'];

        $connection = (new \App\DatabaseConnection())->getConnection();

        $statement = $connection->prepare('SELECT * from recipe_list WHERE id = ?');
        $statement->bind_param('s', $_GET['id']);

        $statement->execute();

        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            $recipe = $result->fetch_assoc();
        }

    }

    if ($result->num_rows === 0) {

        $noResults = "<p>No results found</p>";

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
        <?php
        if (isset($loggedInUser)) {
            echo "<li><a href='./logout.php'>Logout $loggedInUser</a></li>";
        }
        ?>
    </ul>
</nav>
<main class="wrapper">
    <section class="container-centered">
        <div class="content-centered">
        <h3 class="txt-light txt-centered">Ingredients</h3>

            <?php
            if (isset($recipe)) {
                echo "<h3>{$recipe['name']}</h3>";
                echo "<p>{$recipe['description']}</p>";
            }
            if (isset($ingredientList)) {

                echo "<p>$ingredientList</p>";

            }

            if (isset($noResults)) {

                echo $noResults;

            }
            ?>
            <a class='link-main' href='/'>search</a>
        </div>

</section>
</main>

<script src="js/class15.js"></script>

</body>
</html>
