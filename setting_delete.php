<?php
include('dbconn.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM signup WHERE user_id = :id");
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        session_destroy();
        header('Location: login.php');
        exit();
    }
}
?>