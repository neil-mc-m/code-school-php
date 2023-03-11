<?php
require_once 'DatabaseConnection.php';

if (empty($_GET['q'])) exit();
$connection = (new \App\DatabaseConnection())->getConnection();
$searchLike = "%{$_GET['q']}%";
$statement = $connection->prepare('SELECT * from recipe_list WHERE `name` LIKE ?');
$statement->bind_param('s', $searchLike);
$statement->execute();

// step 2
$result = $statement->get_result();

// step 3
if ($result->num_rows > 0) {
    http_response_code(200);
    $recipes = [];
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $recipes[] = $row;
    }
    echo json_encode($recipes);
}

exit();
