<?php
include('dbconn.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
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
                <li>
                    <div class="logo">
                        <img src="./img/bloodspot.png" alt="">
                    </div>
                </li>
                <li><a href="userdashboard.php">
                        <i class="fa-solid fa-house"></i>
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                <li><a href="donateblood.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Donate Blood</span>
                    </a></li>
                <li><a class="active" href="requestblood.php">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="nav-item">Request Blood</span>
                    </a></li>
                <li><a href="bloodstock.php">
                        <i class="fa-solid fa-droplet"></i>
                        <span class="nav-item">Blood stock</span>
                    </a></li>

                <li><a href="#">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Help</span>
                    </a></li>

            </ul>
        </nav>
        <!-- container section started for request blood -->

        <section class="main">
            <div class="main-top">
                <h1>Request Blood</h1>
                <!-- addding dropdown -->
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="setting.php">Edit Profile</a>
                        <a href="userlogout.php">Logout</a>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <h2>Blood Request Form <br>
                    रगत चाहियो?</h2>
                <form class="request-form" id="form" action="requestdb.php" method="POST">
                    <div class="group name">

                        <label for="Pname">Patient Name</label>
                        <input type="text" id="Pname" name="Pname" placeholder="Patient Name" /><br>
                        <div id="name-error" class="error-message"></div>
                    </div>
                    <div class="group email">
                        <label for=" email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Email Address" /> <br>
                        <div id="email-error" class="error-message"></div>
                    </div>
                    <div class="group contact">
                        <label for="contact">Contact Number </label>
                        <input type="number" id="contact" name="contact" placeholder="Contact Number" />
                        <div id="contact-error" class="error-message"></div>
                    </div>
                    <div class="group dob">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob">
                        <div id="dob-error" class="error-message"></div>
                    </div>
                    <div class="group gender">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>

                        <label for="blood_group">Blood Group</label>
                        <select id="blood_group" name="blood_group">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <div class="group image">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image">
                    </div>

                    <div class="group quantity">
                        <label for="qty">Quantity</label>
                        <input type="number" id="qty" name="qty" placeholder="Quantity">
                        <div id="qty-error" class="error-message"></div>
                    </div>

                    <div class="group address">

                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" placeholder="Address" />
                        <div id="addr-error" class="error-message"></div>
                    </div>
                    <div class="group message">

                        <label for="message">Message</label>
                        <input type="textarea" id="message" name="message" />
                    </div>

                    <div class="group button-container">
                        <input type="submit" class="btn" value="Submit" />
                    </div>

                </form>
                <script src="reqblood.js"></script>
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
                timer: 2000,
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