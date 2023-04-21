<?php
include('dbconn.php');
 $name=$_POST['name'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $Cpassword=$_POST['confirm_password'];

 $stmt = $pdo->prepare('INSERT INTO user(name,email,password,Cpassword) VALUES (:name,:email,:password,:Cpassword)');
 $stmt -> bindParam(':name',$name);
 $stmt -> bindParam(':email',$email);
 $stmt -> bindParam(':password',$password);
 $stmt -> bindParam(':confirm_password',$Cpassword);
 if($stmt -> execute()){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
      })
 }
?>