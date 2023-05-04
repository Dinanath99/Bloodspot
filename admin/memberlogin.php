<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donate Now - Login</title>
    <link rel="stylesheet" href="../css/login.css" /> <!-- Include your CSS file here -->
</head>

<body>

    <!-- Add the content for the "Donate Now" login page here -->
    <section id="login-form">
        <div class="container">
            <h1>admin member login</h1>
            <form action="logindb.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required />
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required />
                <input type="submit" name="sub" value="Login" class="btn" />
            </form>



            <p>forget password? <a href="#">forget password</a></p>
            <!-- Add a link to the signup page if needed -->
        </div>
    </section>

</body>

</html>