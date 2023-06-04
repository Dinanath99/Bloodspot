<?php
include('dbconn.php');
include('adminsession.php');


$stmt = $pdo->prepare('SELECT bloodGroup,qty FROM viewstock ');
$stmt->execute();
$bloodGroups = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <!-- auto refresh -->




    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/adminsidebar.css" />
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
                        <img src="../img/bloodspot.png" alt="">
                    </div>
                </li>
                <li><a href="admin.php">
                        <i class="fa-solid fa-house"></i>
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                <li><a href="donorlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Donor list</span>
                    </a></li>
                <li><a class="active" href="bloodstock.php">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="nav-item">Blood stock</span>
                    </a></li>
                <li><a href="requestlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Blood Requester</span>
                    </a></li>

            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>Blood stock Admin Area</h1>
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="adminsetting.php">Edit Profile</a>
                        <a href="logoutadmin.php">Logout</a>
                    </div>
                </div>
            </div>
            <!-- blood group section -->
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