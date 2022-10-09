<?php
session_start();
require_once __DIR__ . '/database/Database.php';

$db = new Database();
$classes = $db->getClassesOrderedByDate();

if (isset($_SESSION['userId'])) {
    $loggedInUser = $db->loadUserFromSession($_SESSION['userId']);
} else {
    $loggedInUser = false;
}

$html = '';
?>

<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<body>
<link rel="stylesheet" href="./css/main.css">
<header>
    <?php include __DIR__ . '/includes/nav.php';?>
</header>
<div class="booking-message"></div>
<main>
    <?php
    while ($row = $classes->fetch_assoc()) {
        $dateOfClass = (new DateTime($row['date']));
        $todaysDate = new DateTime();
        $formattedDate = $dateOfClass->format('Y-m-d h-i');

        if ($todaysDate < $dateOfClass) {
            $html .= "<div class='class-row'>";
            $html .= "<h3>{$row['title']}</h3>";
            $html .= "<div>{$row['content']}</div>";
            $html .= "<p>$formattedDate</p>";


            if ($loggedInUser) {
                $html .= "<div>";
                $html .= "<a class='booking-link' href='' data-class-id={$row['id']} data-user-id={$loggedInUser->getId()}'>Book now!</a>";
                $html .= "</div>";
                $html .= "</div>";
            } else {
                $html .= "</div>";
            }
        } else {
            $html .= "<div class='class-row'>";
            $html .= "<h3>{$row['title']}</h3>";
            $html .= "<div>{$row['content']}</div>";
            $html .= "<p>$formattedDate</p>";
            $html .= "<div>This class has been completed</div>";
            $html .= "</div>";
        }
    }

    echo $html;
    ?>
</main>
<script src="js/app.js"></script>
</body>
</html>
