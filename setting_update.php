<?php
include('dbconn.php');
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare('UPDATE signup SET name =:name, email =:email, password =:password WHERE user_id =:id');
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':password', $hashed_password);
$stmt->errorInfo();
if($stmt->execute()){
    header('Location: setting.php?success=1');
}


?>