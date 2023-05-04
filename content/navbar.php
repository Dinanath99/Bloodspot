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