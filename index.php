<?php
session_start();
require_once __DIR__ . '/database/Database.php';

$db = new Database();
$classes = $db->getClassesOrderedByDate();
?>

<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<body>
<link rel="stylesheet" href="./css/main.css">
<header>
    <?php include __DIR__ . '/includes/nav.php';?>
</header>
<main>
    <p><?php echo $classes?></p>
</main>

</body>
</html>
