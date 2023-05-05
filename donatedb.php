<?php
include 'dbconn.php';
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$address = $_POST['address'];

$stmt = $pdo->prepare("INSERT INTO donatelist(name,email,contact,dob,gender,blood_group,address)
                    VALUES(:name,:email,:contact,:dob,:gender,:blood_group,:address)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':contact', $contact);
$stmt->bindParam(':dob', $dob);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':blood_group', $blood_group);
$stmt->bindParam(':address', $address);
if ($stmt->execute()) {
   // Redirect to form.php with success parameter
   header('Location: donateblood.php?success=1');
   exit;
} else {
   echo "<script>alert('donore register failed')</script>";
}
?>
