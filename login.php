<?php
session_start();
include('dbconn.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT id, email, password FROM signup WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($value as $item) {
        if ($email === $item['email'] && $password === $item['password']) {
            $_SESSION['id'] = $item['id'];
            header("Location:userdashboard.php");
            exit;
        }
    }

    if (!isset($_SESSION['id'])) {
        $invalid = "Invalid Credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donate Now - Login</title>
    <link rel="stylesheet" href="signup.css" /> <!-- Include your CSS file here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Add the content for the "Donate Now" login page here -->
    <section id="login-form">
        <div class="container">
            <h1>Login</h1>
            <div class="message">
                <?php echo isset($invalid) ? $invalid : ''; 
                ?>
            </div>
            <form action="#" method="post">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" />

                <div class="toggle-password" id="toggle-pass"></span>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" />
                    <span class="eye" onclick="togglePassword()">
                        <i id="hideopen" class="fa-solid fa-eye" style="color: #849a9a;"></i>
                        <i id="hideclose" class="fa-solid fa-eye-slash" style="color: #849a9a;"></i>
                    </span>
                </div>
                <input type="submit" name="sub" class="btn" value="Login" />
            </form>

            <script>
            function togglePassword() {
                const x = document.getElementById('password');
                const show = document.getElementById('hideopen');
                const hide = document.getElementById('hideclose');
                if (x.type === "password") {
                    x.type = "text";
                    show.style.display = "block";
                    hide.style.display = "none";
                } else {
                    x.type = "password";
                    show.style.display = "none";
                    hide.style.display = "block";
                }
            }


            </script>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            <!-- Add a link to the signup page if needed -->
            <div class="home_btn">
                <a href="index.php"> <button>Back to home</button></a>
            </div>
        </div>
    </section>
</body>

</html>