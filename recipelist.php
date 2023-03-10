<?php

require_once './src/DatabaseConnection.php';

//// method 1
//$connection = new mysqli($databaseHost, $databaseUser, $databasePassword, $database);
//$result = $connection->query("SELECT * FROM recipe_list;");
//if ($result->num_rows > 0) {
//    $recipes = $result->fetch_all();
//    echo "<h1>Method 1</h1>";
//    foreach ($recipes as $recipe) {
//        echo "<pre>";
//        var_dump($recipe);
//        echo "</pre>";
//    }
//}

// method 2
$connection = (new \App\DatabaseConnection())->getConnection();
$result = $connection->query('SELECT * from recipe_list;');

$recipes = [];
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $recipes[] = $row;
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
        <div class="content-centered">
            <h3 class="txt-light txt-centered">List</h3>
            <?php
                foreach ($recipes as $recipe) {
                    echo "<a href='#'>" . $recipe['name'] . "</a>";
                }
            ?>
        </div>
    </section>
</main>
</body>
</html>
