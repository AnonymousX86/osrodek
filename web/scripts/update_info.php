<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../');
    exit();
}

if(isset($_POST['text'])) {
    require "../env/connect.php";
    $sql = $mysqli->prepare('UPDATE articles SET content = ?, author_id = ?, edit_date = CURRENT_DATE WHERE id=1');
    $sql->bind_param('si', $_POST['text'], $_SESSION['user_id']);
    $sql->execute();
    $mysqli->close();
}
header("Location: ../panel/");
