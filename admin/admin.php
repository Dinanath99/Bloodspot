<?php
include('dbconn.php');
include('adminsession.php');
//total request
$stmt = $pdo->prepare("SELECT COUNT(*) AS total_request FROM requestlist WHERE bloodbank = 'Visited'");
$stmt->execute();
$request = $stmt->fetch(PDO::FETCH_ASSOC);
$totalRequest = $request['total_request'];

//total donor
$stmt = $pdo->prepare('SELECT COUNT(*) AS total_donate FROM donatelist');
$stmt->execute();
$donate = $stmt->fetch(PDO::FETCH_ASSOC);
$totalDonate = $donate['total_donate'];

//total qty
$stmt = $pdo->prepare('SELECT SUM(qty) AS total_quantity FROM viewstock');
$stmt->execute();
$qty = $stmt->fetch(PDO::FETCH_ASSOC);
$totalQuantity = $qty['total_quantity'];

//recent donors
$stmt = $pdo->prepare('SELECT * FROM donatelist ORDER BY id  DESC LIMIT 5');
$stmt->execute();
$donate = $stmt->fetchALL(PDO::FETCH_ASSOC);
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
                <li><a class="active" href="#">
                        <i class="fa-solid fa-house"></i>
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                <li><a href="donorlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Donor list</span>
                    </a></li>
                <li><a href="bloodstock.php">
                        <i class="fa-solid fa-droplet"></i>
                        <span class="nav-item">Blood stock</span>
                    </a></li>
                <li><a href="requestlist.php">
                        <i class="fa-solid fa-users"></i>
                        <span class="nav-item">Blood Requester</span>
                    </a></li>

            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>Bloodspot Admin Area</h1>
                <!-- addding dropdown -->
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="adminsetting.php">Edit Profile</a>
                        <a href="logoutadmin.php">Logout</a>
                    </div>
                </div>
            </div>

            <div class="admin-panel">

                <div class="cookie-card">
                    <span class="title">Requested</span>
                    <p class="description">Total </p>
                    <div class="actions">
                        <button class="pref">
                            <?php echo $totalRequest; ?>
                        </button>
                        <a href="requestlist.php" class="accept">View</a>
                    </div>
                </div>

                <div class="cookie-card">
                    <span class="title">Donor</span>
                    <p class="description">Total</p>
                    <div class="actions">
                        <button class="pref">
                            <?php echo $totalDonate; ?>
                        </button>
                        <a href="donorlist.php" class="accept">View</a>
                    </div>
                </div>

                <div class="cookie-card">
                    <span class="title">In stock</span>
                    <p class="description">Total</p>
                    <div class="actions">
                        <button class="pref">
                            <?php echo $totalQuantity; ?>
                        </button>
                        <a href="bloodstock.php" class="accept">View</a>
                    </div>
                </div>

            </div>
            <div class="recent-donor">
                <div class="title">
                    <h1>Recent donors</h1>
                </div>
            </div>

            <div class="recent-donor-table">
                <div class="table-container">
                    <table class="donor-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Blood Type</th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($donate as $item) { ?>
                                <tr>
                                    <!-- <td><img src="user1.jpg" alt="User 1" class="user-image"></td> -->
                                    <td class="user-details">
                                        <?php echo $item['name'] ?>
                                    </td>
                                    <td class="user-details">
                                        <?php echo $item['blood_group'] ?>
                                    </td>
                                    <td class="user-details">
                                        <?php echo $item['email'] ?>
                                    </td>
                                    <td class="user-details">
                                        <?php echo $item['address'] ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </div>
</body>

</html>