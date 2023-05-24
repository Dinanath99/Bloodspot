<?php
include 'dbconn.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
@$userId = $_GET['user_id'];

// Retrieve donations specific to the user from the database
$stmt = $pdo->prepare('SELECT * FROM requestlist WHERE u_id = :userId');
$stmt->bindParam(':userId', $userId);
$stmt->execute();
$request = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- auto refresh -->



    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/adminsidebar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container">

        <section class="main">
            <div class="main-top">
                <h1>Blood Donor list</h1>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="donor_table">
                <center>
                    <table border="3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Blood Group</th>
                                <th>Quantity</th>
                                <th>Address</th>
                                <th>Time Stamp</th>
                                <th>Message</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($request as $item) { ?>
                                <tr>
                                    <td>
                                        <?php echo $count ?>
                                    </td>
                                    <td>
                                        <?php echo $item['Pname'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['email'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['contact'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['dob'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['gender'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['blood_group'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['qty'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['address'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['timestamp'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['message'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['status'] ?>
                                    </td>

                                    <?php $count++;
                            } ?>
                        </tbody>
                    </table>
                </center>

            </div>
        </section>
    </div>

</body>

</html>