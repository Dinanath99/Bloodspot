<?php
include 'dbconn.php';
$Pname = $_POST['Pname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$address = $_POST['address'];
$qty = $_POST['qty'];
$message = $_POST['message'];
$status = 'Pending';
$timestamp = date('Y-m-d H:i:s');

$stmt = $pdo->prepare("INSERT INTO requestlist(Pname,email,contact,dob,gender,blood_group,qty,address,message,status,timestamp)
                    VALUES(:Pname,:email,:contact,:dob,:gender,:blood_group,:qty,:address,:message,:status,:timestamp)");
$stmt->bindParam(':Pname', $Pname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':contact', $contact);
$stmt->bindParam(':dob', $dob);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':blood_group', $blood_group);
$stmt->bindParam(':qty', $qty);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':message', $message);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':timestamp', $timestamp);
if ($stmt->execute()) {
   // Redirect to form.php with success parameter
   header('Location: requestblood.php?success=1');
   exit;
} else {
   echo "<script>alert('donore register failed')</script>";
}
?>
