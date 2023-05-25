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
                        <!-- <a href="#">Edit Profile</a> -->
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
                            20
                        </button>
                        <button class="accept">
                            View
                        </button>
                    </div>


                </div>
                <div class="cookie-card">
                    <span class="title">Received</span>
                    <p class="description">Total</p>
                    <div class="actions">
                        <button class="pref">
                            12
                        </button>
                        <button class="accept">
                            View
                        </button>
                    </div>


                </div>
                <div class="cookie-card">
                    <span class="title">In stock</span>
                    <p class="description">Total</p>
                    <div class="actions">
                        <button class="pref">
                            130
                        </button>
                        <button class="accept">
                            View
                        </button>
                    </div>


                </div>
                <div class="cookie-card">
                    <span class="title">Total Blood unit</span>
                    <p class="description">Total</p>
                    <div class="actions">
                        <button class="pref">
                            145
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

            <div class="recent-donor-table">
                <div class="table-container">
                    <table class="donor-table">
                        <thead>
                            <tr>
                                <!-- <th>Image</th> -->
                                <th>Name</th>
                                <th>Blood Type</th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- <td><img src="user1.jpg" alt="User 1" class="user-image"></td> -->
                                <td>Dinanath</td>
                                <td>O+</td>
                                <td>dkmdkm26@gmail.com</td>
                                <td>Imadol</td>
                            </tr>
                            <tr>
                                <!-- <td><img src="user2.jpg" alt="User 2" class="user-image"></td> -->
                                <td>Amit</td>
                                <td>B+</td>
                                <td>Amit@gmail.com</td>
                                <td>Satodobato</td>
                            </tr>
                            <tr>
                                <!-- <td><img src="user3.jpg" alt="User 3" class="user-image"></td> -->
                                <td>Kanak</td>
                                <td>O+</td>
                                <td>kanak@gmail.com</td>
                                <td>sundahara</td>
                            </tr>
                            <tr>
                                <!-- <td><img src="user4.jpg" alt="User 4" class="user-image"></td> -->
                                <td>Ayush</td>
                                <td>C</td>
                                <td>Aayush@gmail.com</td>
                                <td>Imadol</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </div>
</body>

</html>