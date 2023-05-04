<?php
include('dbconn.php');

$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$query = ('INSERT INTO signup(fullname,email,password,confirmpassword) VALUES (:username, :email, :password, :confirm_password)');
$stmt = $pdo->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':confirm_password', $confirm_password);
$stmt->execute();

if ($stmt->rowCount() > 0) {
  echo "<script>alert('signup successfull !');</script>";
}

header("Location:login.php");
?>

<script>
  alert('signup successfull !');
</script>