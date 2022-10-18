<?php
session_start();
include '../database/Database.php';
include_once '../User.php';
include '../includes/check-auth.php';
$db = new Database();

$bookings = $db->loadBookings();
$bookingHtml = '';
foreach ($bookings as $booking) {
    $user = $db->loadUserFromSession($booking['user_id']);
    $class = $db->getClassById((int)$booking['class_id']);
    $html = '';
    $html .= "<div class='class-row'>";
    $html .= "<div>{$user->getUserName()} has booked {$class['title']} on the {$class['date']}</div>";
    $html .= "</div>";
    $bookingHtml .= $html;
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
<link rel="stylesheet" href="css/admin.css">
<?php include './includes/admin_nav.php';?>
<main>
    <?php echo $bookingHtml ?>
</main>
</body>
</html>
