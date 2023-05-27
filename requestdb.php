<?php
session_start();
include 'dbconn.php';
$Pname = $_POST['Pname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$address = $_POST['address'];
$qty = $_POST['qty'];
$image = $_POST['image'];
$message = $_POST['message'];
$status = 'Pending';
$bloodbank = 'Not visited';
$timestamp = date('Y-m-d H:i:s');
$u_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("INSERT INTO requestlist(Pname,email,contact,dob,gender,blood_group,qty,address,message,status,image,bloodbank,timestamp,u_id)
                    VALUES(:Pname,:email,:contact,:dob,:gender,:blood_group,:qty,:address,:message,:status,:image,:bloodbank,:timestamp,:u_id)");
$stmt->bindParam(':Pname', $Pname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':contact', $contact);
$stmt->bindParam(':dob', $dob);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':blood_group', $blood_group);
$stmt->bindParam(':qty', $qty);
$stmt->bindParam(':image', $image);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':message', $message);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':bloodbank', $bloodbank);
$stmt->bindParam(':timestamp', $timestamp);
$stmt->bindParam(':u_id', $u_id);
if ($stmt->execute()) {
   header("Location: requestblood.php?success=1");
}
 
?>