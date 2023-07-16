<?php
include('dbconn.php');
include('adminsession.php');
$id = $_SESSION['username'];
$stmt = $pdo->prepare("SELECT * FROM admin WHERE username = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $oldPassword = $_POST['old_password'];
    $password = $_POST['password'];


    if ($oldPassword === $user['password']) {
        $stmt = $pdo->prepare('UPDATE admin SET username = :name, password = :password WHERE username = :id');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $success = 1;
        }
    } else {
        $invalid = "Invalid Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="../css/adminsidebar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style for admin setting -->
    <style>
    .setting {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        width: 100%;
        height: 100vh;
        background: #fff;
    }

    .edit {
        width: 500px;
        max-height: 600px;
        /* margin: 50px auto; */
        padding: 15px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    }

    /* Form title */
    h2 {
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Form labels */
    label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
    }

    /* signup success*/
    .message {
        margin-top: 15px;
        padding: 10px;
        color: red;
        text-align: center;
        font-weight: bold;
        font-size: 16px;
    }

    input {
        width: 95%;
        padding: 10px;
        border-radius: 5px;
        border: none;
        margin-bottom: 15px;
        color: black;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    }

    input:focus {
        outline: none;
        border: 2px solid red;
    }


    /* Form submit button */
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
        background-color: #cf1217;
    }


    .error-message {
        font-size: 14px;
        margin-bottom: 5px;
        color: rgb(182, 35, 35);
    }

    #hideclose,
    #Chideclose {
        display: none;
    }

    .toggle-password {
        position: relative;
    }

    .toggle-password i {
        position: absolute;
        right: 30px;
        top: 39px;
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
                <li><a href="admin.php">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                <li><a href="donorlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Donor list</span>
                    </a></li>
                <li><a href="bloodstock.php">
                        <i class="fa-solid fa-droplet"></i>
                        <span class="nav-item">Blood stock</span>
                    </a></li>
                <li><a href="requestlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Blood Request</span>
                    </a></li>

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
                <div class="edit">


                    <form method="post" action="#">
                        <h2>Account Management</h2>
                        <?php if (isset($success) && $success == 1): ?>
                        <div class="success">Password updated successfully!</div>
                        <?php elseif (isset($invalid)): ?>
                        <div class="invalid">
                            <?php echo $invalid; ?>
                        </div>
                        <?php endif; ?>


                        <div class="form-group">
                            <label for="name">User:</label>
                            <input type="text" id="name" name="name" value="<?php echo $user['username'] ?>" readonly>
                        </div>

                        <div class="toggle-password">
                            <label for="password">Old Password:</label>
                            <input type="password" id="old_password" name="old_password"
                                placeholder="Enter your old password">
                            <span class="eye" onclick="togglePassword()">
                                <i id="hideopen" class="fa-solid fa-eye" style="color: #849a9a;"></i>
                                <i id="hideclose" class="fa-solid fa-eye-slash" style="color: #849a9a;"></i>
                            </span>
                            <div id="old-password-error" class="error-message"></div>
                        </div>

                        <div class="toggle-password">
                            <label for="password">New Password:</label>
                            <input type="password" id="password" name="password" placeholder="Enter your new password">
                            <span class="eye" onclick="toggleCPassword()">
                                <i id="Chideopen" class="fa-solid fa-eye" style="color: #849a9a;"></i>
                                <i id="Chideclose" class="fa-solid fa-eye-slash" style="color: #849a9a;"></i>
                            </span>
                        </div>
                        <div id="password-error" class="error-message"></div>
                        <div class="btn-group">
                            <button type="submit" id="saveBtn">Save Changes</button>
                        </div>

                    </form>
                    <script src="../setting_js.js"></script>

                </div>
            </div>
        </section>

    </div>
</body>

</html>