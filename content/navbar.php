<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodspoot</title>
    <!-- <link rel="stylesheet" href="stylenav.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- adding font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,300&display=swap" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,300&display=swap');



    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        list-style: none;
        text-decoration: none;
        scroll-behavior: smooth;
    }

    :root {
        --bg-color: #ffffff;
        --text-color: #000;
        --second-color: #a09dab;
        --big-font: 5rem;
        --h2-font: 3rem;
        --p-font: 1.1rem;
        --main-color: #CF1217;
        /* --main-color: rgb(234, 28, 28); */

    }

    body {
        background-color: var(--bg-color);
        color: var(--text-color);
    }

    header {
        position: fixed;
        width: 100%;
        top: 0;
        right: 0;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: var(--main-color);
        padding: 15px 18%;
        transition: .4s;
        /* box shadow for header */
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
        /* curve for left side */
        border-bottom-left-radius: 60px;
        border-top-right-radius: 60px;

    }

    .logo img {
        max-width: 100%;
        width: 100px;
        height: auto;
        border-radius: 20px;
    }

    .navlist {
        display: flex;
    }

    .navlist li {
        position: relative;
    }

    .navlist a {
        font-size: var(--p-font);
        color: var(--bg-color);
        font-weight: 600;
        padding: 10px 27px;
        text-decoration: none;
        background: transparent;
        transition: ease.50s;

    }




    .navlist a:hover {
        /* width: 100%; */
        transform: scale(1.5);
        background-color: var(--main-color);
        border: 2px solid var(--main-color);
        color: var(--bg-color);
        text-decoration: none;

    }

    #menu-icon {
        font-size: 35px;
        color: var(--text-color);
        z-index: 10001;
        cursor: pointer;
        cursor: pointer;
        display: none;
        /*hiding the menu icon*/
    }

    .top-btn {
        display: inline-block;
        padding: 9px 30px;
        background: transparent;
        border: 2px solid var(--main-color);
        border-radius: 30px;
        color: var(--bg-color);
        letter-spacing: 1px;
        font-size: var(--p-font);
        font-weight: 600;
        transition: ease.50s;


    }

    .top-btn:hover {
        transform: scale(1.5);
        background-color: var(--main-color);
        border: 2px solid var(--main-color);
        color: var(--bg-color);
        text-decoration: none;
    }

    /* home section start */
    section {
        padding: 100px 18%;
    }

    .home {
        min-height: 100vh;
        height: 110vh;
        width: 80%;
        background: url(background1.jpg);
        background-size: cover;
        background-position: bottom;
        margin: auto;
    }

    .hero {
        position: absolute;
        right: 50px;
        display: inline-block;
        margin-top: 60px;
        transition: ease .40s;
        overflow: hidden;
    }

    .hero:hover {
        transform: scale(1.1);
        box-shadow: 18px 0px 87px 0px rgba(255, 0, 0, 0.7);
    }

    .home-img img {
        max-width: 100%;
        width: 540px;
        height: auto;
    }

    header.sticky {
        background: var(--main-color);
        padding: 5px 18%;
        box-shadow: red;
        /* boreder radius */
    }

    /* items section */

    .items {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, auto));
        grid-gap: 2rem;
        align-items: center;
        text-align: center;

    }

    .sub-box {
        padding: 45px 45px 45px 45px;
        transition: ease.50s;
        cursor: pointer;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }

    .sub-img img {
        max-width: 100%;
        width: 60px;
        height: auto;
        margin-bottom: 20px;
    }

    .sub-box h3 {
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: 500;
    }

    .sub-box p {
        /* font-size: var(--p-font); */
        font-size: 30px;
        /* color: var(--second-color); */
        color: var(--main-color);
        line-height: 29px;
    }

    .sub-box:hover {
        background: #ffffff;
        box-shadow: 18px 0px 87px 0px rgba(255, 0, 0, 0.7);

        border-radius: 12px;
        transform: scale(1.1);
    }

    .about {
        display: grid;
        grid-template-columns: repeat(2, 2fr);
        align-items: center;
        grid: gap 2rem;
    }

    .about-img img {
        max-width: 100%;
        width: 540px;
        height: auto;
    }

    .about-text h2 {
        font-size: var(--h2-font);
        font-weight: 500;
        margin: 8px 0px 25px;
        line-height: 1.1;
        margin-left: 70px;
        color: var(--main-color);
    }

    .about-text h3 {
        color: var(--main-color);
        font-size: 20px;
        font-weight: 500;
    }

    .about-text p {
        max-width: 550px;
        font-size: var(--p-font);
        color: var(--second-color);
        line-height: 28px;
        margin-bottom: 45px;
    }

    /* request section */
    .request {
        display: grid;
        grid-template-columns: repeat(2, 2fr);
        align-items: center;
        grid: gap 2rem;
        /* background: #CF1217; */
    }

    .request-img img {
        max-width: 100%;
        width: 540px;
        height: auto;
    }

    .request-text h2 {
        font-size: var(--h2-font);
        font-weight: 500;
        margin: 8px 100px 25px;
        line-height: 1.1;
        color: var(--main-color);
    }


    .request-text p {
        max-width: 550px;
        font-size: var(--p-font);
        color: var(--second-color);
        line-height: 28px;
        margin-bottom: 45px;
        margin: 8px 100px 25px;
    }


    .request button {

        padding: 15px;
        /* margin: 10px; */
        margin: 8px 10px 10px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 20px;
        font-weight: 600;
        background-color: var(--main-color);
        transition: background-color 0.5s ease;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
    }

    .request button a {
        color: var(--bg-color);
    }

    .request button:hover {
        background: rgba(255, 0, 0, 0.7);
    }

    /* request section end */


    /* footer section */
    footer .links {
        display: grid;
        grid-template-columns: repeat(5, 2fr);
        align-items: center;
        column-gap: 8rem;

    }

    .short_description {
        grid-column: 1/3;
        padding-left: 2.5rem;
        margin-top: 1rem;
        color: red;
        font-size: 700;
        margin-left: 3rem;
    }

    div.short_description~div>.sub_heading {
        color: red;
        margin: 15px 15px;
        font-weight: 700;
    }


    .about_footer a {
        position: relative;
        text-decoration: none;
        color: var(--text-color);
        font-size: 1rem;
        font-weight: bold;
        margin-left: 1rem;

    }

    .about_footer a:hover {
        color: #CF1217;
    }

    .social_media {
        grid-column: 1/-1;
        padding: 0.5rem 0;
        margin: 5px;
    }

    .social_media ul {
        display: flex;
        align-items: center;
        justify-content: center;
        column-gap: 1.25rem;
    }

    .social-media-icon:hover::after {
        content: none;
    }

    .social-media-icon i {
        font-size: var(--fnt-size-medium);
    }

    .copyright_sec {
        padding: 0rem 0;
        text-align: center;
        color: var(--primary-color);
        background-color: var(--txt-secondary-color);
    }

    @media screen and (max-width: 800px) {
        footer .links {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            padding: 96px 84px 12px 84px;
            /* reduced each by 40% of desktop version... */
            row-gap: 2rem;
        }

        .short_description {
            grid-column: 1/-1;
        }

        .copyright_sec {
            padding: 1.25rem 0;
        }
    }

    /* Footer copyright */
    .footer-copyright {
        margin-top: 20px;
        color: #292929;
        opacity: 0.7;
    }


    /* Footer social media */
    .footer-social {
        margin-top: 5px;
    }

    .footer-social ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-social ul li {
        display: inline-block;
        margin-right: 10px;
    }

    .footer-social ul li a {
        color: #292929;
        text-decoration: none;
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }

    .footer-social ul li a:hover {
        opacity: 1;
    }

    footer p {
        margin-top: 5px;
    }



    /* media query section for landing page*/
    @media(max-width:1425px) {
        header {
            padding: 16px 3%;
            transition: .3s;
        }

        header.sticky {
            padding: 10px 3%;
            transition: .3s;
        }

        section {
            padding: 70px 3%;
            transition: .3s;
        }

        :root {
            --big-font: 4rem;
            --h2-font: 2.3rem;
            --p-font: 1rem;
            transition: .3s;
        }

    }

    @media(max-width:970px) {
        #menu-icon {
            display: block;
        }

        .home {
            min-height: 80vh;
        }

        .navlist {
            position: absolute;
            top: -600px;
            left: 0;
            right: 0;
            flex-direction: column;
            background: var(--main-color);
            text-align: right;
            transition: all .40s;
        }

        .navlist a {
            display: block;
            padding: 1.2rem;
            margin: 1.5rem;
            border-right: 2px solid var(--bg-color);
            color: var(--bg-color);
        }

        .navlist a:hover {
            background: var(--bg-color);
            color: var(--main-color);

        }

        .navlist a::after {
            display: none;
        }

        .navlist.active {
            top: 100%;

        }
    }

    @media(max-width:800px) {
        .home {
            grid-template-columns: 1fr;
            min-height: 130vh;
            grid-gap: 1rem;

        }

        .home-text {
            padding-top: 55px;
        }

        .home-img {
            text-align: center;
        }

        .home-img {
            width: 440px;
            height: auto;
        }

        .about {
            grid-template-columns: 1fr;

        }

        .about-img {
            text-align: center;
            margin-bottom: 30px;

        }

        :root {
            --big-font: 3.4rem;
            --h2-font: 2rem;

        }

        section {
            padding: 65% 3%;
            transform: .3s;

        }

        .hero {
            display: none;

        }
    }
    </style>
</head>

<body>

    <!-- header -->
    <header>
        <a href="#" class="logo"><img src="img/logo.png"></a>
        <div class="bx bx-menu" id="menu-icon"><i class="fa-solid fa-bars"></i></div>

        <ul class="navlist">
            <li><a href="/bloodspot/index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">BloodBank information</a></li>
            <li><a href="#">service</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
        <a href="memberlogin.php" class="top-btn">Admin</a>
    </header>



    <!--  your content -->




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