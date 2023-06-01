<?php
include('dbconn.php');
include('adminsession.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

function sendEmail($email, $subject, $body) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 1;  
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
        echo "<script>alert('Email sent successfully');</script>";
        // You can add any further processing here if needed
    } catch (Exception $e) {
        echo 'Email could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donor_id = $_POST['donor_id'];
    if (isset($_POST['status'])) {

        $stmt = $pdo->prepare("SELECT status FROM requestlist WHERE id = :donor_id");
        $stmt->bindParam(':donor_id', $donor_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $currentStatus = $result['status'];

        if ($currentStatus != 'Accepted' && $currentStatus != 'Rejected') {
        $status = $_POST['status'];
        $stmt = $pdo->prepare("UPDATE requestlist SET status= :status WHERE id= :donor_id");
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':donor_id', $donor_id);
        $stmt->execute();

        // Send email notification
        if ($status == 'Accepted') {
            $stmt = $pdo->prepare("SELECT email FROM requestlist WHERE id = :donor_id");
            $stmt->bindParam(':donor_id', $donor_id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $email = $result['email'];  

            $subject = 'Blood Request Accepted';
            $body = "Dear User,\n\nYour blood request has been accepted. Please visit the blood bank tomorrow on " . date('Y-m-d', strtotime('+1 day')) . " with the required documents.\n\nThank you!";

            sendEmail($email, $subject, $body);
        } elseif ($status == 'Rejected') {
            $stmt = $pdo->prepare("SELECT email,Pname FROM requestlist WHERE id = :donor_id");
            $stmt->bindParam(':donor_id', $donor_id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $email = $result['email'];

            $subject = 'Blood Request Rejected';
            $body = "Dear ".$result['Pname'].",\n\nWe regret to inform you that your blood request has been rejected due to some illegitimate information.\n\nThank you!";
            $body = '
            <html>
            <head>
                <style>
                    /* Add any custom CSS styles here */
                </style>
            </head>
            <body>
                <div style="text-align: center;">
                    <img src="./img/logo.png" alt="BloodSpot Logo" width="200">
                    <h2 style="color: red;">Blood Request Rejected</h2>
                    <p>Dear ' . $result['Pname'] . ',</p>
                    <p>We regret to inform you that your blood request has been rejected due to some illegitimate information.</p>
                    <p>Thank you!</p>
                </div>
            </body>
            </html>';
            sendEmail($email, $subject, $body);
        }
    }
   }
}
    //blood bank visit
    if (isset($_POST['bank'])) {
        $bloodbank = $_POST['bank'];

        if ($bloodbank == 'Visited') {
            $stmt = $pdo->prepare("SELECT blood_group,qty FROM requestlist WHERE id= :donor_id");
            $stmt->bindParam(':donor_id', $donor_id);
            $stmt->execute();
            $item = $stmt->fetch(PDO::FETCH_ASSOC);
            $blood_group = $item['blood_group'];
            $qty = $item['qty'];

            $StockStmt = $pdo->prepare("UPDATE viewstock SET qty = qty - :qty WHERE bloodGroup = :blood_group");
            $StockStmt->bindParam(':qty', $qty);
            $StockStmt->bindParam(':blood_group', $blood_group);
            $StockStmt->execute();
        }
        $stmt = $pdo->prepare("UPDATE requestlist SET bloodbank= :bloodbank WHERE id= :donor_id");
        $stmt->bindParam(':bloodbank', $bloodbank);
        $stmt->bindParam(':donor_id', $donor_id);
        $stmt->execute();
    }



$stmt = $pdo->query('SELECT * FROM requestlist');
$value = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- auto refresh -->




    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/adminsidebar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--  adding css for view the image -->

</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="admin.php" class="logo">
                        <img src="../img/bloodspot.png" alt="">
                        <!-- <span class="nav-item">Admin Panel</span> -->
                    </a></li>
                <li><a href="#">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span class="nav-item">History</span>
                    </a></li>
                <li><a href="donorlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Donor list</span>
                    </a></li>
                <li><a href="bloodstock.php">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="nav-item">blood stock</span>
                    </a></li>
                <li><a class="active" href="requestlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Blood Request</span>
                    </a></li>
                <!-- <li><a href="#">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-item">Event</span>
                    </a></li> -->
                <!-- <li><a href="#">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Setting</span>
                    </a></li> -->
                <!-- <li><a href="#">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Help</span>
                    </a></li> -->
                <!-- <li><a href="logoutadmin.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout</span>
                    </a></li> -->
            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>Blood Request list</h1>
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="adminsetting.php">Edit Profile</a>
                        <a href="logoutadmin.php">Logout</a>
                    </div>
                </div>
            </div>

            <div class="table-wrapper">
                <table class="fl-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Blood Group</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Address</th>
                            <th>Time Stamp</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Visit Status</th>
                            <th>Blood bank</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($value as $item) { ?>
                        <tr>
                            <td>
                                <?php echo $count ?>
                            </td>
                            <td>
                                <?php echo $item['Pname'] ?>
                            </td>
                            <td>
                                <?php echo $item['email'] ?>
                            </td>
                            <td>
                                <?php echo $item['contact'] ?>
                            </td>
                            <td>
                                <?php echo $item['dob'] ?>
                            </td>
                            <td>
                                <?php echo $item['gender'] ?>
                            </td>
                            <td>
                                <?php echo $item['blood_group'] ?>
                            </td>
                            <td>
                                <?php echo $item['qty'] ?>
                            </td>
                            <td>
                                <img src="../img/<?php echo $item['image'] ?>" alt="Image" class="thumbnail"
                                    width="25px" height="25px">
                            </td>
                            <td>
                                <?php echo $item['address'] ?>
                            </td>
                            <td>
                                <?php echo $item['timestamp'] ?>
                            </td>
                            <td>
                                <?php echo $item['message'] ?>
                            </td>
                            <!-- this code helps to update specific cell e.g status-2  -->
                            <td id="status-<?php echo $item['id']; ?>">
                                <?php
                                    $status = $item['status'];
                                    if ($status == 'Accepted' || $status == "Rejected") {
                                        echo $status;
                                    } else {
                                        echo 'Pending';
                                    }
                                    ?>
                            </td>
                            <td>
                                <select name="status" onchange="updateStatus(this,<?php echo $item['id']; ?>)">
                                    <option value="" disabled selected>Update</option>
                                    <option class="accept" value="Accepted" <?php echo ($status == 'Accepted' || $status == 'Rejected') ? 'disabled' : ''; ?>>Accept</option>
                                    <option value="Rejected" <?php echo ($status == 'Accepted' || $status == 'Rejected') ? 'disabled' : ''; ?>>Reject</option>
                                </select>
                            </td>
                            <td id="bank-<?php echo $item['id'] ?>">
                                <?php
                                    $status = $item['bloodbank'];

                                    if ($status == 'Visited') {
                                        echo $status;
                                    } else {
                                        echo 'Not Visited';
                                    }
                                    ?>
                            </td>
                            <td>
                                <select name="bank" onchange="updatebank(this,<?php echo $item['id']; ?>)">
                                    <option value="" disabled selected>Not Visited</option>
                                    <option value="Visited">Visited</option>
                            </td>
                        </tr>
                        <?php $count++;
                        } ?>
                    </tbody>
                </table>


            </div>
        </section>
    </div>
    <script>
    function updateStatus(selectElement, donorId) {
        var status = selectElement.value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // yesley  databasema k aayo bhanera dekhaucha hai
                console.log(xhr.responseText);

                // This will dynamically update the data in status cell 
                var statusCell = document.getElementById('status-' + donorId);
                statusCell.textContent = status;
            }
        };
        xhr.send('donor_id=' + donorId + '&status=' + status);
    }

    function updatebank(selectElement, donorId) {
        var bank = selectElement.value;
        var xhr = new XMLHttpRequest;
        xhr.open('POST', '<?php echo $_SERVER['PHP_SELF']; ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                console.log(xhr.responseText);
                var BankCell = document.getElementById('bank-' + donorId);
                BankCell.textContent = bank;
            }
        };
        xhr.send('donor_id=' + donorId + '&bank=' + bank);

    }
    </script>

    </script>

</body>

</html>