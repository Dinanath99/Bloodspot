<?php
session_start();
include('dbconn.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$username = $_POST['username'];
$password = $_POST['password'];

if($username == '' || $password == ''){
    $invalid = "Fill all the field";
    header("Location:memberlogin.php?invalid= $invalid");
} else{
    $stmt = $pdo->prepare('SELECT *FROM admin');
    $stmt->execute();
    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($value as $item) {
        if ($username === $item['username'] && $password === $item['password']) {
            $_SESSION['username'] = $username;
            header("Location:admin.php");
            exit;
        }
    
    }
    
    if (!isset($_SESSION['username'])) {
        $invalid = "Invalid Credentials!";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donate Now - Login</title>
    <link rel="stylesheet" href="../css/adminlogin.css" /> <!-- Include your CSS file here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <form action="#" method="post">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username"  />
                    <div class="toggle-password" ></span>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" />
                        <span class="eye" onclick="togglePassword()">
                            <i id="hideopen" class="fa-solid fa-eye" style="color: #849a9a;"></i>
                            <i id="hideclose" class="fa-solid fa-eye-slash" style="color: #849a9a;"></i>
                        </span>
                    </div>
                    <input type="submit" name="sub" value="Login" class="btn" />

                </form>
                <script>
                    function togglePassword() {
                        const x = document.getElementById('password');
                        const show = document.getElementById('hideopen');
                        const hide = document.getElementById('hideclose');
                        if (x.type === "password") {
                            x.type = "text";
                            show.style.display = "none";
                            hide.style.display = "block";
                        } else {
                            x.type = "password";
                            show.style.display = "block";
                            hide.style.display = "none";
                        }
                    }
                </script>
            </div>
    </section>

</body>

</html>