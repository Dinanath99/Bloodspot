<?php
include('dbconn.php');
//total user
$stmt = $pdo->prepare('SELECT COUNT(*) AS total_user FROM signup');
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$totalUser = $user['total_user'];

//total blood
$stmt = $pdo->prepare('SELECT SUM(qty) AS total_quantity FROM viewstock');
$stmt->execute();
$qty = $stmt->fetch(PDO::FETCH_ASSOC);
$totalQuantity = $qty['total_quantity'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodspoot</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- adding font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,300&display=swap" rel="stylesheet">
</head>

<body>

    <!-- header -->
    <header>
        <a href="#" class="logo"><img src="img/logo.png"></a>
        <div class="bx bx-menu" id="menu-icon"><i class="fa-solid fa-bars"></i></div>

        <ul class="navlist">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="info.php">BloodBank information</a></li>
            <li><a href="#request">Service</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
        <a href="./admin/memberlogin.php" class="top-btn">Admin</a>
    </header>

    <!-- home section -->
    <section class="home" id="home">
        <div class="home-text">



        </div>
        </div>
        <div Request home-img">


        </div>

    </section>

    <!-- sub section-->
    <section class="sub-service">
        <div class="items">
            <div class="sub-box">
                <div class="sub-img">
                    <img src="img/donate.png" alt="image">
                </div>
                <h3>User Registered</h3>
                <p>
                    <?php echo $totalUser; ?>
                </p>
            </div>


            <div class="sub-box">
                <div class="sub-img">
                    <img src="img/request.png" alt="image">
                </div>
                <h3>Blood storage Unit</h3>
                <p>
                    <?php echo $totalQuantity; ?>
                </p>
            </div>

        </div>

        </div>
    </section>

    <!-- About section -->
    <section class="about" id="about">
        <div class="about-img">
            <img src="img/about.jpg">
        </div>
        <div class="about-text">
            <!-- <h3>i am designer</h3> -->
            <h2>Why BloodSpot?</h2>
            <p>The existing blood management system in Nepal is manual, cumbersome, and inefficient. Most blood banks
                record
                the information on blood collection or supply manually in registers.

                Maintaining an inventory of blood supply requires a lot of labor, and processing data on blood
                availability and shortages is a difficult task.

                An effort on behalf of society to manage blood from collection to supply in an intelligent, open, and
                comprehensive manner.

                The difference between life and death when it comes to blood may depend on obtaining the appropriate
                information at the right time.</p>
        </div>
    </section>

    <!-- request and donate blood section -->
    <section class="request" id="request">
        <div class="request-img">
            <img src="img/request.jpg">
        </div>
        <div class="request-text">
            <!-- <h3>i am designer</h3> -->
            <h2>रगत चाहियो?</h2>
            <p>Fill in the form and send us your details.
                Someone will get back to you asap. If it’s an emergency,
                call us @ +977 123456789 or msg us at Facebook</p>

            <button class="btn_a"><a href="login.php">Donate bloood</a></button>
            <button><a href="login.php">Request bloood</a></button>
        </div>
    </section>

    <!-- Footer section -->

    <hr>

    <footer>
        <div class="links">
            <div class="short_description">
                <img src="./img/bloodspot.png" width="100px" alt="" />
                <p>
                    BloodSpot is an online blood donation web app where people can donate and request blood.

                </p>
            </div>
            <div class="quick_links">
                <p class="sub_heading">Contact Info</p>
                <p> Address : Balkumari-02,
                    Lalitpur, Nepal <br>
                    Phone : +977 1234567 <br>
                    Email : team@bloodspot.com</p>
            </div>
            <div class="about_us">
                <p class="sub_heading">About us</p>
                <ul class="about_footer">
                    <li><a href="#about">About Bloodspot</a></li>
                    <li><a href="#">Donor login</a></li>
                    <li><a href="#"> </a></li>
                    <li><a href="#">Privacy policy</a></li>
                    <li><a href="#"> </a></li>
                </ul>
            </div>
            <div class="social_media">
                <ul>

                    <li>
                        <a href="#" class="social-media-icon"><i class="fab fa-facebook"></i></a>
                    </li>

                    <li>
                        <a href="#" class="social-media-icon"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#" class="social-media-icon"><i class="fab fa-dribbble"></i></a>
                    </li>
                    <li>
                        <!-- <a href="#" class="social-media-icon"><i class="fab fa-tiktok"></i></a> -->
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright_sec">2023 Bloodspot - All rights Reserved</div>
    </footer>


    <!-- go to top -->
    <a href="#" class="go-to-top" title="Go to Top">
        <i class="fas fa-arrow-up"></i>
        <span class="button-text">Go to Top</span>
    </a>

    <!-- link to javascript -->
    <script>
        const header = document.querySelector("header");
        window.addEventListener("scroll", function () {
            header.classList.toggle("sticky", window.scrollY > 0);
        });
        let menu = document.querySelector('#menu-icon');
        let navlist = document.querySelector('.navlist');
        menu.onclick = () => {
            menu.classList.toggle('bx-x');
            navlist.classList.toggle('active');
        };
        window.onscroll = () => {
            menu.classList.remove('bx-x');
            navlist.classList.remove('active');
        };
    </script>
</body>

</html>