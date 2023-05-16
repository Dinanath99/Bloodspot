<?php
    include('dbconn.php');
   
    @$invalid = $_GET['invalid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donate Now - Login</title>
    <link rel="stylesheet" href="../css/adminlogin.css" /> <!-- Include your CSS file here -->
</head>

<body>

    <!-- Add the content for the "Donate Now" login page here -->
    <section id="login-form">
        <!--  adding bakcground image -->
        <div class="logo">
            <a href="../index.php"><img src="../img/bloodspot.png" /> </a>
        </div>
        <div class="wrapper">
            <div class="log_img">
                <img src="../img/admincover.png" />
            </div>

            <div class="container">
                <h1>admin member login</h1>
                <div class="message">
                    <?php echo isset($invalid) ? $invalid : ''; ?>
                </div>
                <form action="logindb.php" method="post">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username"  />
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"  />
                    <input type="submit" name="sub" value="Login" class="btn" />
                </form>
                <!-- <div class="home_btn">
                    <a href="../index.php"> <button>Back to home</button></a>
                </div> -->




                <!-- Add a link to the signup page if needed -->
            </div>
    </section>

</body>

</html>