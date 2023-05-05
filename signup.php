<?php
include('dbconn.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the email already exists in the database
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM signup WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $emailCount = $stmt->fetchColumn();
    if ($emailCount > 0) {
        $msg = 'Email already exit.';
    } else {
        $stmt = $pdo->prepare('INSERT INTO signup(name,email,password,confirm_password) VALUES (:name,:email,:password,:confirm_password)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':confirm_password', $confirm_password);
        if ($stmt->execute()) {
            $msg = 'Signup Successfully';
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Donor Signup</title>
    <link rel="stylesheet" href="signup.css" /> <!-- Link to the CSS file for styling -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section id="login-form">
        <div class="logo">
            <a href="index.php"><img src="bloodspot.png" /> </a>
        </div>
        <div class="wrapper">
            <div class="log_img">
                <img src="signupbg.png" />
            </div>

            <div class="container">
                <h1>Donor Signup</h1>
                <div class="message">
                    <?php echo isset($msg) ? $msg : ''; ?>
                </div>
                <form id="form" action="#" method="post">

                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Full Name" />
                    <div id="name-error" class="error-message"></div>
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Email Address" />
                    <div id="email-error" class="error-message"></div>
                    <span class="toggle-password" id="toggle-pass">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" />
                        <span class="eye" onclick="togglePassword()">
                            <i id="hideopen" class="fa-solid fa-eye" style="color: #849a9a;"></i>
                            <i id="hideclose" class="fa-solid fa-eye-slash" style="color: #849a9a;"></i>
                        </span>
                    </span>
                    <div id="password-error" class="error-message"></div>
                    <span class="toggle-password" id="toggle-cpass">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm_password"
                            placeholder="Confirm Password" />
                        <span class="eye" onclick="toggleCPassword()">
                            <i id="Chideopen" class="fa-solid fa-eye" style="color: #849a9a;"></i>
                            <i id="Chideclose" class="fa-solid fa-eye-slash" style="color: #849a9a;"></i>
                        </span>
                    </span>
                    <div id="confirm-password-error" class="error-message"></div>
                    <input type="submit" class="btn" value="signup" />
                </form>
                <!-- <script src="sweetalert.js"></script> -->
                <script src="validate_signup.js"></script>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>

        </div>
    </section>

</body>

</html>