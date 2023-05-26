<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user dashboard</title>
    <link rel="stylesheet" href="../css/adminsidebar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style for admin setting -->
    <style>
    .setting {
        display: flex;
        justify-content: column;
        align-items: center;
        margin: 30px;
        /* background-color: orange; */


    }

    h2 {
        text-align: center;
    }

    form {
        min-width: 400px;
        margin: 0 auto;
        /* background: rebeccapurple; */
        border-radius: 20px;
        padding: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, .2);
    }

    .form-group {
        margin-bottom: 0px;
    }

    .form-group label {
        display: block;
        font-weight: 700;
        margin-bottom: 0.5em;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="number"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 6px;
        border: 1px solid #ccc;
        border-radius: 4px;

    }

    .btn-group {
        margin: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-group button {
        padding: 8px 16px;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 700;
    }

    #saveBtn {
        background-color: green;
    }

    #deleteBtn {
        background-color: red;
    }

    .btn-group button:hover {
        opacity: 0.8;
    }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="admin.php" class="logo">
                        <img src="../img/bloodspot.png" alt="">
                        <!-- <span class="nav-item">Admin Panel</span> -->
                    </a></li>
                <li><a href="#">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span class="nav-item">History</span>
                    </a></li>
                <li><a href="donorlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Donor list</span>
                    </a></li>
                <li><a href="bloodstock.php">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="nav-item">blood stock</span>
                    </a></li>
                <li><a href="requestlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Blood Request</span>
                    </a></li>
                <!-- <li><a href="#">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-item">Event</span>
                    </a></li> -->
                <!-- <li><a href="adminsetting.php">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Setting</span>
                    </a></li> -->
                <!-- <li><a href="#">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Help</span>
                    </a></li> -->
                <!-- <li><a href="logoutadmin.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout</span>
                    </a></li> -->
            </ul>
        </nav>
        <!-- admin setting -->


        <section class="main">
            <div class="main-top">
                <h1>Bloodspot Admin Area</h1>
                <!-- addding dropdown -->
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="adminsetting.php">Edit Profile</a>
                        <a href="logoutadmin.php">Logout</a>
                    </div>
                </div>
            </div>


            <div class="setting">

                <form method="post" action="#">
                    <h2>Account Management</h2>

                    <div class="form-group">
                        <label for="name">User:</label>
                        <input type="text" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Old password:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your old password">
                    </div>

                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input type="password" id="password" name="password" placeholder="enter your new password">
                    </div>

                    <div class="btn-group">
                        <button type="submit" id="saveBtn">Save Changes</button>
                        <button id="deleteBtn">Delete</button>
                    </div>

                </form>
            </div>
        </section>

    </div>
</body>

</html>