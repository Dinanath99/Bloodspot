<?php
include('dbconn.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$u_id = $_SESSION['user_id'];
//only recent 
$stmt = $pdo->prepare("SELECT * FROM donatelist WHERE status = 'Pending' AND u_id = :u_id");
$stmt->bindParam(':u_id', $u_id);
$stmt->execute();
$item = $stmt->fetch(PDO::FETCH_ASSOC);

//all donate history
$stmt = $pdo->prepare("SELECT * FROM donatelist WHERE status != 'Pending' AND u_id = :u_id");
$stmt->bindParam(':u_id', $u_id);
$stmt->execute();
$donate = $stmt->fetchALL(PDO::FETCH_ASSOC);
// if admin click on logout then its unset the session and destory the session
//and redirect to member login page
if (isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
    echo "<script>location.href = 'login.php'</script>";
}

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
                <li><a href="userdashboard.php" class="logo">
                        <img src="./img/bloodspot.png" alt="">
                        <!-- <span class="nav-item">Welcome<span class="username"> User</span></span> -->
                    </a></li>
                <li><a class="active" href="history.php">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span class="nav-item">History</span> </a></li>
                <li><a href="donateblood.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Donate Blood</span>
                    </a></li>
                <li><a href="requestblood.php">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="nav-item">Request Blood</span>
                    </a></li>
                <li><a href="bloodstock.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Blood stock</span>
                    </a></li>
                <!-- <li><a href="#">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-item">Blood center</span>
                    </a></li> -->
                <li><a href="#">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Setting</span>
                    </a></li>
                <li><a href="#">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Help</span>
                    </a></li>
                <!-- <li><a href="userlogout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout</span>
                    </a></li> -->
            </ul>
        </nav>

        <!-- container section started for donate -->

        <section class="main">
            <div class="main-top">
                <h1>User History</h1>
                <!-- addding dropdown -->
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="#">Edit Profile</a>
                        <a href="userlogout.php">Logout</a>
                    </div>
                </div>
            </div>
            <div class="user-history">
                <div class="donate-history">
                    <h3>Recently Donated Forms </h3>
                    <?php if($item) {?>
                    <table>
                        <thead>
                            <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Blood Group</th>
                            <th>Address</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $item['name']?></td>
                                <td><?php echo $item['email']?></td>
                                <td><?php echo $item['contact']?></td>
                                <td><?php echo $item['dob']?></td>
                                <td><?php echo $item['gender']?></td>
                                <td><?php echo $item['blood_group']?></td>
                                <td><?php echo $item['address']?></td>
                                <td><?php echo $item['status']?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } else {?>
                    <p> No recently Donated Forms.</p>
                    <?php } ?>


                </div>
                <div class="donate-history">
                    <h3>Donate History</h3>

                    <table border="3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Blood Group</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            foreach ($donate as $item) { ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['email'] ?></td>
                                <td><?php echo $item['contact'] ?></td>
                                <td><?php echo $item['dob'] ?></td>
                                <td><?php echo $item['gender'] ?></td>
                                <td><?php echo $item['blood_group'] ?></td>
                                <td><?php echo $item['address'] ?></td>
                                <td><?php echo $item['status'] ?></td>
                                
                            <?php $count++;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    
</body>

</html>