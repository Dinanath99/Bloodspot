<?php
session_start();
include('dbconn.php');

$username = $_POST['name'];
$password = $_POST['password'];

$query = ('SELECT *FROM signup');
$stmt = $pdo->prepare($query);
$stmt->execute();

$value = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $org_username = $value[0]['username'];
// $org_password = $value[0]['password'];

foreach ($value as $item) {
    if ($username === $item['fullname'] && $password === $item['password']) {
        $_SESSION['fullname'] = $username;
        header("Location:userdashboard.php");
    }

}

if (!isset($_SESSION['fullname'])) {
    $invalid = "Invalid Credentials!";
    header("Location:login.php?invalid= $invalid");
    echo $invalid;
}
?>