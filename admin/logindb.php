<?php
session_start();
include('dbconn.php');

$username = $_POST['username'];
$password = $_POST['password'];

if($username == '' || $password == ''){
    $invalid = "Fill all the field";
    header("Location:memberlogin.php?invalid= $invalid");
} else{
    $stmt = $pdo->prepare('SELECT *FROM admin');
    $stmt->execute();
    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($value as $item) {
        if ($username === $item['username'] && $password === $item['password']) {
            $_SESSION['username'] = $username;
            header("Location:admin.php");
            exit;
        }
    
    }
    
    if (!isset($_SESSION['username'])) {
        $invalid = "Invalid Credentials!";
        header("Location:memberlogin.php?invalid= $invalid");
    }
}

?>