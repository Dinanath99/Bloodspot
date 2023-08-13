<?php
include('dbconn.php');
session_start();
$success = null;

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';

function sendEmail($email, $subject, $body) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Mailer = "smtp";
        //$mail->SMTPDebug  = 1;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 2525;
        $mail->Host       = "smtp.elasticemail.com";
        $mail->Username   = "amitrai.077@kathford.edu.np";
        $mail->Password   = "7F5FDF84A7B5AAE3C64C89D3B913335A3E9C";
        $mail->AddAddress($email);
        $mail->SetFrom("amitrai.077@kathford.edu.np", "BloodSpot");
        $mail->Subject = $subject;
        // $mail->Body = $body;
        $mail->MsgHTML($body);

        $mail->send();
        //echo "<script>alert('Email sent successfully');</script>";
        // You can add any further processing here if needed
    } catch (Exception $e) {
        echo 'Email could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $weight = $_POST['weight'];
    $address = $_POST['address'];
    $status = 'Pending';
    $bloodbank = 'Not visited';
    date_default_timezone_set('Asia/Kathmandu');
    $timestamp = date('Y-m-d H:i:s');
    $u_id = $_SESSION['user_id'];
    
    $stmt = $pdo->prepare("SELECT timestamp FROM donatelist WHERE u_id = :u_id");
    $stmt->bindParam(':u_id', $u_id);
    $stmt->execute();
    $date = $stmt->fetch(PDO::FETCH_ASSOC);
    $lastdonate = $date['timestamp'];
    $oneMonthAgo = date('Y-m-d H:i:s', strtotime('-10 minutes'));
    if ($lastdonate > $oneMonthAgo) {
    header('Location: donateblood.php?success=0');
    } else {
    
       $stmt = $pdo->prepare("INSERT INTO donatelist(name,email,contact,dob,gender,blood_group,address,weight,timestamp,bloodbank,u_id)
                        VALUES(:name,:email,:contact,:dob,:gender,:blood_group,:address,:weight,:timestamp,:bloodbank,:u_id)");
       $stmt->bindParam(':name', $name);
       $stmt->bindParam(':email', $email);
       $stmt->bindParam(':contact', $contact);
       $stmt->bindParam(':dob', $dob);
       $stmt->bindParam(':gender', $gender);
       $stmt->bindParam(':blood_group', $blood_group);
       $stmt->bindParam(':weight', $weight);
       $stmt->bindParam(':address', $address);
       $stmt->bindParam(':timestamp', $timestamp);
       $stmt->bindParam(':bloodbank', $bloodbank);
       $stmt->bindParam(':u_id', $u_id);
   if($stmt->execute()){
    $success = 1;
    $stmt = $pdo->prepare("SELECT email, name FROM donatelist WHERE u_id = :u_id");
            $stmt->bindParam(':u_id', $u_id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $email = $result['email'];
        
            $subject = 'Blood Request Accepted';
            $body = "
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    /* Add any custom CSS styles here */
                    body {
                        font-family: Arial, sans-serif;
                    }
                    h2 {
                        color: #C00;
                    }
                    ol {
                        margin-left: 20px;
                    }
                    .email-content {
                        text-align: left;
                        margin: 0 auto;
                        max-width: 600px;
                    }
                    .center-align {
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <div class'email-content'>
                <h1 class='center-align'><a href='https://imgbb.com/'><img src='https://i.ibb.co/pyM7V3W/bloodspot-removebg-preview.png' alt='bloodspot-removebg-preview' border='0' width='200'></a></h1>
                <h2 class='center-align'>Thank You for Your Willingness to Donate Blood</h2>
                <p>Dear " . $result['name'] . ",</p>
                <p>We would like to express our heartfelt gratitude for your incredible willingness to donate blood. Your selfless act of kindness has the potential to save lives and bring hope to those in need.</p>
                <p>Your commitment to helping others is truly admirable, and we are honored to have individuals like you as part of our community. With your donation, we can make a significant impact and provide essential support to patients in critical situations.</p>
                <p>We kindly request you to visit our blood bank tomorrow, on " . date('Y-m-d', strtotime('+1 day')) . ", to proceed with the donation process. Your presence at the blood bank is crucial in ensuring a smooth and efficient donation experience.</p>
                <p>Please remember to bring the required documents mentioned below:</p>
                <ol>
                  <li>Identification proof (e.g., driver's license, passport)</li>
                  <li>Any relevant medical records or reports</li>
                </ol>
                <p>Our compassionate team will be ready to assist you upon your arrival. If you have any further questions or need assistance, please feel free to contact us. We are here to provide guidance and support throughout the process.</p>
                <p>Once again, thank you for your compassion, generosity, and commitment to helping others. Together, we can make a positive impact on the lives of those in need.</p>
                <p>Best regards,</p>
                <p>Bloodspot Team</p>
                </div>
            </body>
            </html>";
            sendEmail($email, $subject, $body);
   }

}

}

$id = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT name,email FROM user WHERE user_id=:user_id');
$stmt->bindParam(':user_id', $id);
$stmt->execute();
$signup = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user dashboard</title>
    <link rel="stylesheet" href="./css/userdashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li>
                    <div class="logo">
                        <img src="./img/bloodspot.png" alt="">
                    </div>
                </li>
                <li><a href="userdashboard.php">
                        <i class="fa-solid fa-house"></i>
                        <span class="nav-item">Dashboard</span> </a></li>
                <li><a class="active" href="donateblood.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Donate Blood</span>
                    </a></li>
                <li><a href="bloodstock.php">
                            <i class="fa-solid fa-droplet"></i>
                            <span class="nav-item">Blood stock</span>
                     </a></li>
                <li><a href="requestblood.php">
                        <i class="fa-solid fa-users"></i>
                        <span class="nav-item">Request Blood</span>
                    </a></li>


            </ul>
        </nav>

        <!-- container section started for donate -->

        <section class="main">
            <div class="main-top">
                <h1>Donate Blood</h1>

                <!-- addding dropdown -->
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="setting.php">Edit Profile</a>
                        <a href="userlogout.php">Logout</a>
                    </div>
                </div>

            </div>
            <div class="donate-blood">
                <h2>Please send us your details</h2>
                <form id="form" action="#" method="POST">

                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $signup['name'] ?>" />
                    <div id="name-error" class="error-message"></div>


                    <label for=" email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?php echo $signup['email'] ?>" />
                    <div id="email-error" class="error-message"></div>

                    <label for="phone">Contact Number </label>
                    <input type="number" id="contact" name="contact" placeholder="Contact Number" />
                    <div id="contact-error" class="error-message"></div>
                    
                    <div>
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob">
                    <div id="dob-error" class="error-message"></div>

                    <label for="weight">Weight</label>
                    <input type="number" id="weight" name="weight" placeholder="Kg " />
                    <div id="weight-error" class="error-message">
                    </div> 

                    <div class="gender">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        
                        
                        <label for="blood_group">Blood Group:</label>
                        <select id="blood_group" name="blood_group">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder="Address" />
                    <div id="addr-error" class="error-message"></div>
                    <div class="btn-container">

                        <input type="submit" name="sub" class="btn donate-btn" value="Submit" />
                    </div>
                </form>
                <script src="donateblood.js"></script>
            </div>
        </section>
    </div>
    <?php
    if(null !== $success && $success == 1) {
        ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer)
                    toast.addEventListener("mouseleave", Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: "success",
                title: "Data Submitted Successfully"
            });
        </script>
        <?php
    } elseif (null !== $success && $success == 0) { ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "You can only donate if three months have passed since your last donation.",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "swal-btn-red" // Custom CSS class for confirm button
                }
            });
        </script>
    <?php }
    ?>
</body>

</html>