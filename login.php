<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donate Now - Login</title>
    <link rel="stylesheet" href="signup.css" /> <!-- Include your CSS file here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
    <!-- Add the content for the "Donate Now" login page here -->
    <section id="login-form">
        <div class="container">
            <h1>Login to Donate</h1>
            <form action="donordashboard.html" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" />
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required />
                <span class="eye" id="toggle-Lpass" onclick="togglePassword()">
                    <i id="hideopen" class="fa-solid fa-eye" style="color: #849a9a;"></i>
                    <i id="hideclose"  class="fa-solid fa-eye-slash" style="color: #849a9a;"></i>
                </span>
                <input type="submit" value="Login" class="btn" />
            </form>
            <!-- <script src="validate.js"></script> -->
            <p>Don't have an account? <a href="donorsignup.html">Sign up</a></p>
            <!-- Add a link to the signup page if needed -->
        </div>
    </section>
    

</body>
</html>