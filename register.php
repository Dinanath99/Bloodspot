<?php
include('dbconn.php');
session_start();

?>
<html>
<html>

<head>
    <title>Admin Panel - Blood Management System</title>
    <link rel="stylesheet" href="admindashboard.css">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <header class="header">
        <a href="#">User dashboard</a>
        <!-- logout button -->
        <div class="logout">
            <a href="logout.php" class="btn btn-light">Logout</a>
        </div>
    </header>

    <!-- aside bar section -->
    <aside>
        <ul>
            <li><a href="requestblood.php">Request Blood</a></li>
            <li><a href="register.php">Donate Blood</a></li>
            <li><a href="#">Blood stock</a></li>
            <li><a href="#">Donor list</a></li>

        </ul>
    </aside>

    <div class="content">
        <section id="donors">
            <div class="container">


                <h1>Blood Donation Form</h1>

                <form action="#" method="POST">
                    <div class="name">

                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="email">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="bloodtype">
                        <label for="blood-type">Blood Type:</label>
                        <select id="blood-type" name="blood-type" required>
                            <option value="">--Select--</option>
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
                    <div class="contact">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="address">
                        <label for="address">Address:</label>
                        <textarea id="address" name="address" required></textarea>
                    </div>


                    <label for="availability">Availability:</label>
                    <input type="checkbox" id="availability-morning" name="availability[]" value="morning">
                    <label for="availability-morning">Morning</label>

                    <input type="checkbox" id="availability-afternoon" name="availability[]" value="afternoon">
                    <label for="availability-afternoon">Afternoon</label>

                    <input type="checkbox" id="availability-evening" name="availability[]" value="evening">
                    <label for="availability-evening">Evening</label>

                    <div class="apply">

                        <input type="submit" value="Submit">
                    </div>

                </form>
            </div>
        </section>
    </div>

</body>

</html>