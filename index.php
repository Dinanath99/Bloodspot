<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bloodspot</title>
    <link rel="stylesheet" href="./css/style.css" />
    <!-- fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="http://localhost/bloodspot/index.php">
                <img src="img/bloodspot.png" alt="Bloodspot" />
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact</a></li>
            <li>
                <a href="#">Categories</a>
                <ul class="dropdown">
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>
            <li><a href="#">Login</a></li>
            <li class="sign-in"><a href="memberlogin.php">Admin</a></li>
            <li class="create-account">
                <a href="#">Exchange Blood</a>
            </li>
        </ul>
        <div class="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </nav>


    <section id="banner">

        <!-- blood container section -->
        <div class="container">
            <a href="login.php" class="btn">Donate Now</a>
        </div>
        <div class="container">
            <a href="requestblood.html" class="btn">Request blood</a>
        </div>

        <!-- Request blood container -->
    </section>

    <section id="about">
        <div class="bloodsection">
            <div class="bgroup">
                <a href="#">A-</a>
                <a href="#">A+</a>
                <a href="#">AB-</a>
                <a href="#">AB+</a>
                <a href="#">B-</a>
                <a href="#">A+</a>
                <a href="#">O-</a>
                <a href="#">O-</a>
            </div>


        </div>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <img src="logo.png" alt="Bloodspot" />
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">Exchange Blood</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-social">
            <ul>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
    </footer>
    <!-- Add your JavaScript code here if needed -->
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    <script>
        // Toggle menu on click
        document.querySelector('.menu-toggle').addEventListener('click', function () {
            document.querySelector('.nav-links').classList.toggle('active');
        });
    </script>
</body>

</html>