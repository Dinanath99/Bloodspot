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

    <div class="container">
        <h1>Signup</h1>
        <form id="form" action="signup_user.php" method="POST">

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
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password" />
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
    <!-- including footer section -->


</body>


</html>