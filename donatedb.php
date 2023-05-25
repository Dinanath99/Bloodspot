<?php
session_start();
include 'dbconn.php';

if (!isset($_SESSION['user_id'])) {
   header('Location: login.php');
}
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$address = $_POST['address'];
$status = 'Pending';
$bloodbank = 'Not visited';
//  time zone to Asia/Kathmandu
date_default_timezone_set('Asia/Kathmandu');
$timestamp = date('Y-m-d H:i:s');
$u_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT timestamp FROM donatelist WHERE u_id = :u_id");
$stmt->bindParam(':u_id', $u_id);
$stmt->execute();
$date = $stmt->fetch(PDO::FETCH_ASSOC);
$lastdonate = $date['timestamp'];
$oneMonthAgo = date('Y-m-d H:i:s', strtotime('-2 minute'));
if ($lastdonate > $oneMonthAgo) {
header('Location: donateblood.php?success=0');
} else {

   $stmt = $pdo->prepare("INSERT INTO donatelist(name,email,contact,dob,gender,blood_group,address,status,timestamp,bloodbank,u_id)
                    VALUES(:name,:email,:contact,:dob,:gender,:blood_group,:address,:status,:timestamp,:bloodbank,:u_id)");
   $stmt->bindParam(':name', $name);
   $stmt->bindParam(':email', $email);
   $stmt->bindParam(':contact', $contact);
   $stmt->bindParam(':dob', $dob);
   $stmt->bindParam(':gender', $gender);
   $stmt->bindParam(':blood_group', $blood_group);
   $stmt->bindParam(':address', $address);
   $stmt->bindParam(':status', $status);
   $stmt->bindParam(':timestamp', $timestamp);
   $stmt->bindParam(':bloodbank', $bloodbank);
   $stmt->bindParam(':u_id', $u_id);
   if($stmt->execute()){
      header('Location: donateblood.php?success=1');
   }

   // Update the quantity in the blood stock table
   // $StockStmt = $pdo->prepare("UPDATE viewstock SET qty = qty + 1 WHERE bloodGroup = :blood_group");
   // $StockStmt->bindParam(':blood_group', $blood_group);
   // if ($StockStmt->execute()) {
   //    // Redirect to form.php with success parameter
   //    header("Location: userdonatelist.php?user_id= $u_id");
   //    exit;
   // }
}
?>