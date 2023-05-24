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
    echo "<script>location.href='login.php'</script>";
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

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#" class="logo" class="active">
                        <img src="./img/bloodspot.png" alt="">
                        <!-- <span class="nav-item">Welcome<span class="username"> User</span></span> -->
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

        <section class="main">
            <div class="main-top">
                <h1>my profile</h1>

                <!-- addding dropdown -->
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="setting.php">Edit Profile</a>
                        <a href="userlogout.php">Logout</a>
                    </div>
                </div>

            </div>


            <!-- setting section -->
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit Profile</title>
                <style>
                    .setting {
                        display: flex;
                        justify-content: column;
                        align-items: center;
                        margin: 30px;
                        /* background-color: orange; */
                    }

                    form {
                        max-width: 450px;
                        margin: 0 auto;
                        /* background: rebeccapurple; */
                        border-radius: 20px;
                        padding: 10px;
                        box-shadow: 0 0 5px rgba(0, 0, 0, .2);
                    }

                    .form-group {
                        margin-bottom: 0px;
                    }

                    .form-group label {
                        display: block;
                        font-weight: 700;
                        margin-bottom: 0.5em;
                    }

                    .form-group input[type="text"],
                    .form-group input[type="email"],
                    .form-group input[type="number"],
                    .form-group input[type="password"] {
                        width: 100%;
                        padding: 6px;
                        border: 1px solid #ccc;
                        border-radius: 4px;

                    }

                    .btn-group {
                        margin: 5px;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    }

                    .btn-group button {
                        padding: 8px 16px;
                        color: white;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        font-weight: 700;
                    }

                    #saveBtn {
                        background-color: green;
                    }

                    #deleteBtn {
                        background-color: red;
                    }

                    .btn-group button:hover {
                        opacity: 0.8;
                    }
                </style>
            </head>

            <body>
                <div class="setting">

                    <form>
                        <h2>Edit Profile</h2>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" readonly>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="number">Contact:</label>
                            <input type="number" id="number" name="number" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </div>

                        <div class="btn-group">
                            <a href="helo.php"> <button type="button" id="saveBtn">Save Changes</button> </a>
                            <a href="helo.php"> <button type="button" id="deleteBtn">Delete</button> </a>
                        </div>
                    </form>
                </div>
            </body>

            </html>

        </section>
    </div>
</body>
<script>

</script>
< /html>