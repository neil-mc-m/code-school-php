<?php
session_start();
include '../config/dbconfig.php';
include '../debug.php';
$connection = getConnection();

$result = $connection->query('select * from class order by created_at desc');
$html = '';
while ($row = $result->fetch_assoc()) {
    $formattedDate = (new DateTime($row['date']))->format('Y-m-d');
    $html .= "<div class='class-row'>";
    $html .= "<h3>{$row['title']}</h3>";
    $html .= "<div>{$row['content']}</div>";
    $html .= "<p>$formattedDate</p>";
    $html .= "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
<link rel="stylesheet" href="./css/style.css">
<?php include './includes/admin_nav.php';?>
<main>
    <?php echo $html;?>
</main>

</body>
</html>
