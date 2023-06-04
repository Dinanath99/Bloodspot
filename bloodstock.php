<?php
include('dbconn.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$stmt = $pdo->prepare('SELECT bloodGroup,qty FROM viewstock ');
$stmt->execute();
$bloodGroups = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                <li><a href="history.php">
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
                <li><a class="active" href="bloodstock.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Blood stock</span>
                    </a></li>
                <!-- <li><a href="#">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-item">Blood center</span>
                    </a></li> -->
                <!-- <li><a href="setting.php">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Setting</span>
                    </a></li> -->
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
        <!-- container section started for blood stock -->

        <section class="main">
            <div class="main-top">
                <h1>Bood stock</h1>
                <!-- addding dropdown -->
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="setting.php">Edit Profile</a>
                        <a href="userlogout.php">Logout</a>
                    </div>
                </div>
            </div>
            <div class="blood_type">
                <?php foreach ($bloodGroups as $item) { ?>
                <div class="card">
                    <i class="fa-solid fa-droplet"></i>
                    <h3>
                        <?php echo $item['bloodGroup'] ?>
                    </h3>
                    <p>
                        <?php echo $item['qty'] ?> units
                    </p>
                    <!-- <button>Request</button> -->
                </div>
                <?php } ?>
            </div>
        </section>
    </div>
</body>

</html>