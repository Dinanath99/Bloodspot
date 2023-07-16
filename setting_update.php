<?php
include('dbconn.php');
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$Old_password = $_POST['old_password'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("SELECT password FROM signup WHERE user_id =:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($Old_password, $user['password'])) {
    $stmt = $pdo->prepare('UPDATE signup SET name =:name, email =:email, password =:password WHERE user_id =:id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->errorInfo();
    if($stmt->execute()){
        header('Location: setting.php?success=1');
    }
} else {
    $invalid = "Incorrect Password!";
    header("Location: setting.php?invalid= $invalid");
}


?>