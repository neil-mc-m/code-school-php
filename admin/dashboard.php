<?php
session_start();
include_once '../database/Database.php';
include_once '../User.php';
include '../includes/check-auth.php';

$db = new Database();
$classes = $db->getClassesOrderedByDate();
$html = '';
while ($row = $classes->fetch_assoc()) {
    $dateOfClass = (new DateTime($row['date']));
    $todaysDate = new DateTime();
    $formattedDate = $dateOfClass->format('Y-m-d h-i');

    if ($todaysDate < $dateOfClass) {
        $html .= "<div class='class-row'>";
        $html .= "<h3>{$row['title']}</h3>";
        $html .= "<div>{$row['content']}</div>";
        $html .= "<p>$formattedDate</p>";
        $html .= "</div>";
    } else {
        $html .= "<div class='class-row'>";
        $html .= "<h3>{$row['title']}</h3>";
        $html .= "<div>{$row['content']}</div>";
        $html .= "<p>$formattedDate</p>";
        $html .= "<div>This class has been completed</div>";
        $html .= "</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<body>
<link rel="stylesheet" href="css/admin.css">
<?php include './includes/admin_nav.php';?>
<main>
    <?php echo $html;?>
</main>

</body>
</html>
