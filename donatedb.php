<?php
include 'dbconn.php';
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$address = $_POST['address'];
$status = 'Pending';
//  time zone to Asia/Kathmandu
date_default_timezone_set('Asia/Kathmandu');
$timestamp = date('Y-m-d H:i:s');

$stmt = $pdo->prepare("INSERT INTO donatelist(name,email,contact,dob,gender,blood_group,address,status,timestamp)
                    VALUES(:name,:email,:contact,:dob,:gender,:blood_group,:address,:status,:timestamp)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':contact', $contact);
$stmt->bindParam(':dob', $dob);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':blood_group', $blood_group);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':timestamp', $timestamp);
if ($stmt->execute()) {
   // Redirect to form.php with success parameter
   header('Location: donateblood.php?success=1');
   exit;
} else {
   echo "<script>alert('donore register failed')</script>";
}
?>
