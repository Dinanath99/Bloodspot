<?php
include('dbconn.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
} 

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
                        <span class="nav-item">Welcome<span class="username"> User</span></span>
                    </a></li>
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
                <li><a href="userlogout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout</span>
                    </a></li>
            </ul>
        </nav>

        <!-- container section started for donate -->

        <section class="main">
            <div class="main-top">
                <h1>User History</h1>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="user-history">
                <div class="donate-history">
                    <h3>Donation History </h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Units Donated</th>
                                <th>Total Donated</th>
                                <th>Blood Group</th>
                                <th>Lastly Donated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="user.jpg" class="user-img"> Dinanath</td>
                                <td>pending</td>
                                <td>5</td>
                                <td>20</td>
                                <td>A+</td>
                                <td>2023-04-25</td>
                            </tr>

                            <!-- Add more rows for additional donors -->
                        </tbody>
                    </table>


                </div>
                <div class="request-history">
                    <h3>Request History</h3>

                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Unit</th>
                                <th>Total Request</th>
                                <th>Blood Group</th>
                                <th>Request date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="user.jpg" class="user-img"> John Doe</td>
                                <td>pending</td>
                                <td>5</td>
                                <td>5</td>
                                <td>A+</td>
                                <td>2023-04-25</td>
                            </tr>

                            <!-- Add more rows for additional donors -->
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
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
    }
    ?>
</body>

</html>