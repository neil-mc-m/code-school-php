<?php
session_start();
require_once './src/DatabaseConnection.php';
// search form


if (isset($_SESSION['email'])) {
    $loggedInUser = $_SESSION['email'];
}

if (isset($_GET['q'])) {
    //step 1
    $connection = (new \App\DatabaseConnection())->getConnection();
    $statement = $connection->prepare('SELECT * from recipe_list WHERE `name` = ?');
    $statement->bind_param('s', $_GET['q']);
    $statement->execute();

    // step 2
    $result = $statement->get_result();

    // step 3
    if ($result->num_rows > 0) {

        $recipe = $result->fetch_assoc();

        $recipeId = $recipe['id'];

        $recipeName = $recipe['name'];

        $recipeDescription = $recipe['description'];

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
<style>

</style>

<body>

<nav>
    <ul class="navbar">
        <li class="nav-logo"><a href="/">Neils Recipes</a></li>
        <li><a href="/recipelist.php"
               class="<?php if (isset($loggedInUser)) {echo "logged-in";} else {echo "logged-out";}?>">Recipes</a>
        </li>
        <li>
            <?php
            if (isset($_SESSION['email'])) {
                echo "<a href='./logout.php'>Logout {$_SESSION['email']}</a>";
            } else {
                echo "<a href='./login.php'>Login</a>";
            }
            ?>
        </li>
    </ul>
</nav>

<main class="wrapper">
    <section class="container-centered">

        <div class="txt-centered">
            <blockquote>A recipe is a story that ends with a good meal.</blockquote>
            <form id="search-form" action="" method="GET" autocomplete="off">
                <label for="search">Search</label>
                <input id="search-input" name="q" placeholder="Search recipes" type="text"/>
                <button type="submit">Search</button>
            </form>
        </div>
    </section>
    <section class="container-centered">
        <div class="content-centered mt-3">
            <h3 id="search-results-heading" class="txt-light txt-centered">Search results</h3>
            <div>
                <ul id="search-results">

                </ul>
            </div>
            <?php
            if (isset($recipeName) && isset($recipeDescription) && isset($recipeId)) {

                echo "<p>Recipe name : $recipeName</p>";

                echo "<p>Recipe description : $recipeDescription</p>";

                echo "<a class='link-main' href='ingredients.php?id=$recipeId'>ingredients</a>";

            }

            if (isset($noResults)) {

                echo $noResults;

            }
            ?>
        </div>
        <div id="div1"></div>
    </section>
</main>


<script src="./js/app.js"></script>
</body>
</html>

