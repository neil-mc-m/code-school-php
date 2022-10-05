<?php
session_start();
include '../config/dbconfig.php';
$connection = getConnection();

if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['date'])) {
    $statement = $connection->prepare("INSERT INTO class VALUES (DEFAULT, ?, ?, DEFAULT, ?)");
    $now = 'NOW()';
    $statement->bind_param('sss', $_POST['title'],$_POST['content'], $_POST['date']);
    $statement->execute();
    if ($statement->affected_rows === 1) {
        echo "class created";
        header('Location: classes.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<body>
<link rel="stylesheet" href="./css/style.css">
<?php include './includes/admin_nav.php';?>
<main>
    <form action="" method="post" id="createClassForm">
        <h4>Create a new class here</h4>
        <div class="form-input">
            <label for="title">title</label>
            <input id="title" type="text" name="title">
        </div>
        <div class="form-input">
            <label for="content">content</label>
            <textarea rows=20 name="content" id="content"></textarea>
        </div>
        <div class="form-input">
            <label for="date">title</label>
            <input id="date" type="date" name="date">
        </div>
        <div class="form-input">
            <input type="submit">
        </div>
    </form>
</main>
</body>
</html>


