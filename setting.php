<?php
include('dbconn.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
@$invalid = $_GET['invalid'];
$id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM signup WHERE user_id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$item = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user dashboard</title>
    <link rel="stylesheet" href="./css/userdashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="userdashboard.php" class="logo" class="active">
                        <img src="./img/bloodspot.png" alt="">
                        <!-- <span class="nav-item">Welcome<span class="username"> User</span></span> -->
                    </a></li>
                <li><a href="history.php">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span class="nav-item">History</span> </a></li>
                <li><a href="donateblood.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Donate Blood</span>
                    </a></li>
                <li><a href="requestblood.php">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="nav-item">Request Blood</span>
                    </a></li>
                <li><a href="bloodstock.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Blood stock</span>
                    </a></li>

                <li><a href="#">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Help</span>
                    </a></li>
            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>my profile</h1>

                <!-- addding dropdown -->
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="setting.php">Edit Profile</a>
                        <a href="userlogout.php">Logout</a>
                    </div>
                </div>

            </div>


            <!-- setting section -->
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit Profile</title>
                <style>
                .setting {
                    display: flex;
                    justify-content: column;
                    align-items: center;
                    margin: 30px;
                    /* background-color: orange; */

                }

                form {
                    min-width: 450px;
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

                .message {
                    margin-top: 15px;
                    padding: 10px;
                    color: red;
                    text-align: center;
                    font-weight: bold;
                    font-size: 16px;
                }
                #hideclose,
                #Chideclose {
                    display: none;
                } 
               .setting .toggle-password {
        position: relative;
        display: inline-block;
    }

   .setting .toggle-password i {
        position: absolute;
        right: 8px;
        top: 90%;
        transform: translateY(-50%);
        color: #849a9a;
        cursor: pointer;
    }                              
                </style>
            </head>

            <body>
                <div class="setting">
                    <form method="post" action="setting_update.php">
                        <h2>Edit Profile</h2>
                        <div class="message">
                            <?php echo isset($invalid) ? $invalid : ''; ?>
                        </div>
                        <div class="form-group">
                            <input type="text" id="id" name="id" value="<?php echo $item['user_id'] ?>" hidden>
                        </div>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="<?php echo $item['name'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo $item['email'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Old Password:</label>
                            <input type="password" id="old_password" name="old_password"
                                placeholder="enter your old password">
                            <span class="eye" onclick="togglePassword()">
                            <i id="hideopen" class="fa-solid fa-eye" style="color: #849a9a;"></i>
                            <i id="hideclose" class="fa-solid fa-eye-slash" style="color: #849a9a;"></i>
                        </span>
                        </div>

                        <div class="form-group">
                            <label for="password">New Password:</label>
                            <input type="password" id="password" name="password" placeholder="enter your new password">
                            <span class="eye" onclick="toggleCPassword()">
                            <i id="Chideopen" class="fa-solid fa-eye" style="color: #849a9a;"></i>
                            <i id="Chideclose" class="fa-solid fa-eye-slash" style="color: #849a9a;"></i>
                        </span>
                        </div>

                        <div class="btn-group">
                            <button type="submit" id="saveBtn" onclick="submitForm(event)">Save Changes</button>
                            <button id="deleteBtn"
                                onclick="confirmDelete(event,<?php echo $item['user_id']; ?>)">Delete</button>
                        </div>

                    </form>
                    <script>
                    function togglePassword() {
                        const x = document.getElementById('old_password');
                        const show = document.getElementById('hideopen');
                        const hide = document.getElementById('hideclose');
                        if (x.type === "password") {
                            x.type = "text";
                            show.style.display = "none";
                            hide.style.display = "block";

                        } else {
                            x.type = "password";
                            show.style.display = "block";
                            hide.style.display = "none";
                        }
                    }

                    function toggleCPassword() {
                    const y= document.getElementById('password');
                    const show=document.getElementById('Chideopen');
                    const hide=document.getElementById('Chideclose');
                    if (y.type === "password") {
                      y.type = "text";
                      show.style.display="none";
                      hide.style.display="block";    
                    } else{
                      y.type = "password";
                      show.style.display="block";
                      hide.style.display="none";   
                    }
                  }
                </script>
                </div>
            </body>

            </html>

        </section>
    </div>
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        ?>
    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer)
            toast.addEventListener("mouseleave", Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: "success",
        title: "Data Updated Successfully"
    }).then(() => {
        // Remove the success flag from the URL
        window.history.replaceState(null, null, window.location.pathname);
    });
    </script>
    <?php
    } ?>

    <script>
    function submitForm(event) {
        event.preventDefault();
        // Get the form element
        var form = document.querySelector('form');
        form.submit();
    }

    function confirmDelete(event, userId) {
        event.preventDefault(); // Prevent form submission

        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone.",
            icon: "warning",
            showCancelButton: true,
            cancelButtonColor: "green",
            confirmButtonColor: "red",
            cancelButtonText: "Cancel",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "setting_delete.php?id=" + userId;
            }
        });
    }
    </script>



</body>

</html>