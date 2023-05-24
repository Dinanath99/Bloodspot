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
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,300&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
    }

    .blood_type {
        position: relative;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        margin: 100px;
        width: auto;
        height: auto;
        border: 4px solid rgb(239, 60, 75);

    }

    .blood_type .card {
        flex-direction: wrap;
        width: 25%;
        margin: 25px;
        background: #fff;
        text-align: center;
        border-radius: 20px;
        padding: 20px;
        transition: ease.50s;
        cursor: pointer;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }

    .blood_type .card:hover {
        background: #ffffff;
        /* box-shadow: 18px 0px 87px 0px rgba(118, 22, 22, 0.7); */

        box-shadow: 0.5px 0.5px 7.5px 0px rgba(219, 6, 6, 0.7);

        border-radius: 12px;
        transform: scale(1.1);
    }

    .blood_type .card h3 {
        width: auto;
        margin: 10px;
        text-transform: capitalize;
        box-sizing: border-box;
        overflow: auto;
    }

    .blood_type p {
        font-size: 20px;
    }

    .blood_type.card button {
        background: orangered;
        color: #fff;
        padding: 7px 15px;
        border-radius: 10px;
        margin-top: 15px;
        cursor: pointer;
    }

    .blood_type .card button:hover {
        background-color: rgb(322, 145, 33, 355);
    }

    .blood_type.card i {
        font-size: 32px;
        padding: 10px;
    }
</style>

<body>

    <!-- header -->
    <header>
        <a href="#" class="logo"><img src="img/logo.png"></a>
        <div class="bx bx-menu" id="menu-icon"><i class="fa-solid fa-bars"></i></div>

        <ul class="navlist">
            <li><a href="index.php">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="#">BloodBank information</a></li>
            <li><a href="#request">service</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
        <a href="./admin/memberlogin.php" class="top-btn">Admin</a>
    </header>

    <!-- hero section -->

    <h4>
        Major blood banks in and around Kathmandu Valley.
    </h4>
    <div class="blood_type">
        <div class="card">
            <i class="fa-solid fa-house-medical"></i>
            <h3>
                Bhaktapur NRCS Blood Bank,
            </h3>
            <p>
                Bhaktapur
                01-6611661, 01-6612266
            </p>

        </div>
        <div class="card">
            <i class="fa-solid fa-house-medical"></i>
            <h3>
                Central NRCS Blood Bank,
            </h3>
            <p>
                Soaltee-Mode
                01- 4288485
            </p>

        </div>
        <div class="card">
            <i class="fa-solid fa-house-medical"></i>
            <h3>
                Lalitpur NRCS Blood Bank,
            </h3>
            <p>
                Pulchowk
                +97715427033
            </p>

        </div>
        <div class="card">
            <i class="fa-solid fa-house-medical"></i>
            <h3>
                Teaching Hospital,
            </h3>
            <p>
                Maharajgunj, Kathmandu
                01-44123030, 01-4410911
            </p>

        </div>
        <div class="card">
            <i class="fa-solid fa-house-medical"></i>
            <h3>
                Bir Hospital,
            </h3>
            <p>
                New road gate, Kathmandu
                01-4221119, 01-4221988
            </p>

        </div>
        <div class="card">
            <i class="fa-solid fa-house-medical"></i>
            <h3>
                Patan Hospital,
            </h3>
            <p>
                Patan, Lalitpur,
                01-5522295
            </p>

        </div>
        <div class="card">
            <i class="fa-solid fa-house-medical"></i>
            <h3>
                Civil Hospital
            </h3>
            <p>
                Minbhawan, Kathmandu
                01-4107000
            </p>

        </div>
        <div class="card">
            <i class="fa-solid fa-house-medical"></i>
            <h3>
                Nepal Medical College,
            </h3>
            <p>
                Gokarneswor, Kathmandu
                01-4911008
            </p>

        </div>

    </div>

    <!-- Footer section -->

    <hr>

    </footer>
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
                    <li><a href="#">About Bloodspot</a></li>
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