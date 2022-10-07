<?php
session_start();
include '../includes/check-auth.php';
include '../database/Database.php';

$db = new Database();
$html = $db->getClassesOrderedByDate();

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
