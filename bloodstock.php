<?php
include('dbconn.php');
session_start();

if (isset($_SESSION['fullname'])) {
    //if fullname is set then its redirect to userdashboard page 
} else {

    //else its redirect to user login page
    echo "<script>location.href='login.php'</script>";

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
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="userdashboard.php" class="logo">
                        <img src="logo.png" alt="">
                        <span class="nav-item">User Dashboard</span>
                    </a></li>
                <li><a href="index.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span> </a></li>
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
                <li><a href="#">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-item">Blood center</span>
                    </a></li>
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
        <!-- container section started for request blood -->

        <section class="main">
            <div class="main-top">
                <h1>Bood stock</h1>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="blood_type">
                <div class="card">
                    <i class="fas fa-laptop-code"></i>
                    <h3>O +</h3>
                    <p>24 units</p>
                    <button>get started</button>
                </div>
                <div class="card">
                    <i class="fas fa-wordpress"></i>
                    <h3>O -</h3>
                    <p>35 units</p>
                    <button>get started</button>
                </div>
                <div class="card">
                    <i class="fas fa-palette"></i>
                    <h3>A</h3>
                    <p>25 Unit</p>
                    <button>get started</button>
                </div>
                <div class="card">
                    <i class="fas fa-app-store-ios"></i>
                    <h3>A+</h3>
                    <p>100 unit</p>
                    <button>get started</button>
                </div>
            </div>


        </section>
    </div>
</body>

</html>