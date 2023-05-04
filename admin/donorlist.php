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
                        <img src="logo.png" alt="">
                        <span class="nav-item">Admin Panel</span>
                    </a></li>
                <!-- <li><a href="#">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span> </a></li> -->
                <li><a href="donorlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Donor list</span>
                    </a></li>
                <li><a href="#">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="nav-item">blood stock</span>
                    </a></li>
                <li><a href="#">
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
                <li><a href="#">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Help</span>
                    </a></li>
                <li><a href="logoutadmin.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout</span>
                    </a></li>
            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>Blood Donor list</h1>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="donor_table">
                <center>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Smith</td>
                                <td>john.smith@example.com</td>
                                <td>(555) 555-1212</td>
                                <td>1980-05-01</td>
                                <td>Male</td>
                                <td>O+</td>
                                <td>123 Main St, Anytown USA</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Doe</td>
                                <td>jane.doe@example.com</td>
                                <td>(555) 555-1313</td>
                                <td>1985-07-15</td>
                                <td>Female</td>
                                <td>A-</td>
                                <td>456 Oak St, Anycity USA</td>
                            </tr>
                            <!-- add more rows as needed -->
                        </tbody>
                    </table>
                </center>

            </div>
        </section>
    </div>
</body>

</html>