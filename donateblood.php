<?php
include('dbconn.php');
session_start();

if (isset($_SESSION['id'])) {
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

        <!-- container section started for donate -->

        <section class="main">
            <div class="main-top">
                <h1>Donate Blood</h1>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="wrapper">
                <h2>Please send us your details</h2>
                <form id="form" action="donatedb.php" method="POST">

                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Full Name" />
                    <div id="name-error" class="error-message"></div>


                    <label for=" email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Email Address" />
                    <div id="email-error" class="error-message"></div>

                    <label for="phone">Contact Number </label>
                    <input type="number" id="contact" name="contact" placeholder="Contact Number" />

                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob">

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder="Adress" />

                    <div class="gender">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>

                        <label for="blood_group">Blood Group:</label>
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

                    <input type="submit" name="sub" class="btn" value="submit" />
                </form>

                <!--  php code for database  -->

                <?php
                if (isset($_POST['sub'])) {
                    $name = $_POST['name'];
                    $fname = $_POST['fname'];
                    $address = $_POST['address'];
                    $city = $_POST['city'];
                    $age = $_POST['age'];
                    $bgroup = $_POST['bgroup'];
                    $email = $_POST['email'];
                    $mno = $_POST['mno'];
                    /* echo "<script>alert('clicked')</script>"; */
                    $q = $db->prepare("INSERT INTO donor_registration(name,fname,address,city,age,bgroup,email,mno)
                    VALUES(:name,:fname,:address,:city,:age,:bgroup,:email,:mno)");
                    $q->bindvalue('name', $name);
                    $q->bindvalue('fname', $fname);
                    $q->bindvalue('address', $address);
                    $q->bindvalue('city', $city);
                    $q->bindvalue('age', $age);
                    $q->bindvalue('bgroup', $bgroup);
                    $q->bindvalue('email', $email);
                    $q->bindvalue('mno', $mno);
                    if ($q->execute()) {
                        echo "<script>alert('donore register successfull')</script>";
                    } else {
                        echo "<script>alert('donore register failed')</script>";
                    }
                }

                ?>


            </div>
        </section>
    </div>
</body>

</html>