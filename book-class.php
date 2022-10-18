<?php
include './database/Database.php';

$data = json_decode(file_get_contents("php://input"), true);

$db = new Database();
$statement = $db->createBooking($data);
if ($statement->affected_rows === 1) {
    http_response_code(200);
    echo json_encode(['message' => "Thanks for booking a class with me! You should recieve an email in a day or two."]);
} else {
    echo json_encode(['message' => 'that booking didnt go through. Please try again.']);
}
exit();