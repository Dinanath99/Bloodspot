<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodspoot</title>
    <link rel="stylesheet" href="stylenav.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- adding font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,300&display=swap" rel="stylesheet">
</head>

<body>


    <footer>
        <div class="links">
            <div class="short_description">
                <img src="" alt="LOGO" />
                <p>
                    BookEx is an online book echanging platform. The platform aids
                    readers to exchange their books with others.
                </p>
            </div>
            <div class="quick_links">
                <p class="sub_heading">Contact Info</p>
                <p> Address : Balkumari-02,
                    Lalitpur, Nepal



                    Phone : +977 1234567

                    Email : team@bloodspot.com</p>
            </div>
            <div class="about_us">
                <p class="sub_heading">About us</p>
                <ul class="about_footer">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy policy</a></li>
                    <li><a href="#">FAQ</a></li>
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
                        <a href="#" class="social-media-icon"><i class="fab fa-tiktok"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright_sec">2023 Bloodspot - All rights Reserved</div>
    </footer>



    <!-- link to javascript -->
    <script>
    const header = document.querySelector("header");
    window.addEventListener("scroll", function() {
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