<?php
include('dbconn.php');
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel - Blood Management System</title>
    <link rel="stylesheet" href="admindashboard.css">


</head>

<body>

    <div class="sidebar">
        <h1>Admin Panel</h1>
        <ul>
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="#">Blood Donors</a></li>
            <li><a href="#">Blood Requests</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Settings</a></li>
            <form action="logout.php" method="post">
                <input type="submit" name="logout" value="logout" />
            </form>
            <!-- <li><a href="logout.php">Logout</a></li> -->
        </ul>
    </div>
    <div class="content">
        <h1>Dashboard</h1>
        <div class="card">
            <h2>Blood Donors</h2>
            <p>Total donors: 150</p>
            <a href="#" class="btn btn-primary">View Donors</a>
        </div>
        <div class="card">
            <h2>Blood Requests</h2>
            <p>Total requests: 50</p>
            <a href="#" class="btn btn-primary">View Requests</a>
        </div>
        <div class="card">
            <h2>Reports</h2>
            <p>Total reports: 20</p>
            <a href="#" class="btn btn-primary">View Reports</a>
        </div>
    </div>
</body>

</html>