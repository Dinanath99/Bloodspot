<!DOCTYPE html>
<html>

<head>
    <title>Bloodspot</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Bloodspot</h1>
            <nav>
                <ul>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#donors">Donate Blood</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="#contact">Request blood</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="banner">

        <!-- blood container section -->
        <div class="container">
            <a href="donate.php" class="btn">Donate Now</a>
        </div>
        <div class="container">
            <a href="#donate" class="btn">Request blood</a>
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
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Follow us on social media</h3>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Contact us</h3>
                    <form>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name">

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address">

                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Enter your message"></textarea>

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </footer>

    <div class="container">
        <p>&copy; 2023 Bloodspot. All rights reserved.</p>
    </div>
    </footer>
</body>

</html>