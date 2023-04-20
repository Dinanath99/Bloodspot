<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --background-color: #ff2d2d;
        --font-color: #fff;
        --link-hover: #f00;
    }

    /* Style for the navbar */
    .navbar {
        background-color: #CF1217;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 5px;
        overflow: hidden;

    }

    /* Add sticky class to the navbar */
    .navbar {
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .logo img {
        width: 100px;
        height: auto;
        /* border-radius: 5px; */
    }

    .nav-links {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        list-style-type: none;
    }

    .nav-links li {
        margin-left: 20px;
    }

    .nav-links a {
        color: var(--font-color);
        text-decoration: none;
        transition: color 0.3s ease;
        padding: 20px 20px;
        font-size: 18px;
    }

    .nav-links a:hover {
        color: var(--link-hover);
    }

    .dropdown {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: var(--background-color);
        padding: 10px;
    }

    .nav-links li:hover .dropdown {
        display: block;
    }

    .dropdown li {
        margin-bottom: 10px;
    }

    .dropdown a {
        color: #fff;
    }

    .dropdown a:hover {
        color: var(--link-hover);
    }

    .sign-in,
    .create-account {
        margin-left: 20px;
    }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="http://localhost/bloodspot/index.php">
                <img src="\Bloodspot\img\bloodspot.png" alt="Bloodspot" />
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


</body>

</html>