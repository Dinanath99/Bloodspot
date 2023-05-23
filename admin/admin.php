<?php
include('dbconn.php');
include('adminsession.php');
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
                <li><a href="requestlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Blood Requester</span>
                    </a></li>
                <!-- <li><a href="#">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-item">Event</span>
                    </a></li> -->
                <!-- <li><a href="#">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Setting</span>
                    </a></li> -->
                <!-- <li><a href="testtable.php">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Testtable</span>
                    </a></li> -->
                <!-- <li><a href="logoutadmin.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout</span>
                    </a></li> -->
            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>Bloodspot Admin Area</h1>
                <!-- addding dropdown -->
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="#">Edit Profile</a>
                        <a href="logoutadmin.php">Logout</a>
                    </div>
                </div>
            </div>
            <!--  hero section -->
            <div class="admin-panel">

                <div class="cookie-card">
                    <span class="title">Total Donors</span>
                    <p class="description">60+ </p>
                    <div class="actions">
                        <button class="pref">
                            Manage your preferences
                        </button>
                        <button class="accept">
                            View
                        </button>
                    </div>


                </div>
                <div class="cookie-card">
                    <span class="title">Request</span>
                    <p class="description">60+ </p>
                    <div class="actions">
                        <button class="pref">
                            Manage your preferences
                        </button>
                        <button class="accept">
                            View
                        </button>
                    </div>


                </div>
                <div class="cookie-card">
                    <span class="title">Approved Request</span>
                    <p class="description">60+ </p>
                    <div class="actions">
                        <button class="pref">
                            Manage your preferences
                        </button>
                        <button class="accept">
                            View
                        </button>
                    </div>


                </div>
                <div class="cookie-card">
                    <span class="title">Total Blood unit</span>
                    <p class="description">20 </p>
                    <div class="actions">
                        <button class="pref">
                            Manage your preferences
                        </button>
                        <button class="accept">
                            View
                        </button>
                    </div>


                </div>
            </div>
            <div class="recent-donor">
                <div class="title">
                    <h1>Recent donors</h1>
                </div>
            </div>
        </section>
    </div>
</body>

</html>