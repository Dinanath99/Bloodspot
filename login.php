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
    <?php include '.\navbar\navbar.php'; ?>

    <!-- Add the content for the "Donate Now" login page here -->
    <section id="login-form">
        <div class="container">
            <h1>Login</h1>
            <form action="donordashboard.html" method="post">
                <label for="name">Username</label>
                <input type="text" id="name" name="name" placeholder="Enter your username" />
                <div id="name-error" class="error-message"></div>

                <div class="toggle-password" id="toggle-pass" ></span>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required />
                <span class="eye"  onclick="togglePassword()">
                    <i id="hideopen" class="fa-solid fa-eye" style="color: #849a9a;"></i>
                    <i id="hideclose" class="fa-solid fa-eye-slash" style="color: #849a9a;"></i>
                </span>
                </div>
                <button type="submit" class="btn" />Login</button>
            </form>
            <script>
                function togglePassword() {
                   const x = document.getElementById('password');
                   const show=document.getElementById('hideopen');
                     const hide=document.getElementById('hideclose');
                   if (x.type === "password") {
                      x.type = "text";
                      show.style.display="block";
                  hide.style.display="none";    
                       } else{
                   x.type = "password";
                show.style.display="none";
                hide.style.display="block";   
                }
        }
            </script>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            <!-- Add a link to the signup page if needed -->
        </div>
    </section>


</body>

</html>