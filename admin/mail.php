<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../PHPMailer-master/src/Exception.php';
    require '../PHPMailer-master/src/PHPMailer.php';
    require '../PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug  = 1;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 2525;
    $mail->Host       = "smtp.elasticemail.com";
    $mail->Username   = "amitrai.077@kathford.edu.np";
    $mail->Password   = "7F5FDF84A7B5AAE3C64C89D3B913335A3E9C";

    $mail->IsHTML(true);
    $mail->AddAddress("raiamit078@gmail.com", "Amit");
    $mail->SetFrom("amitrai.077@kathford.edu.np", "BloodSpot");
    $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
    $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
    } else {
    echo "Email sent successfully";
}
?>