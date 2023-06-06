<?php
include('dbconn.php');
include('adminsession.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donor_id = $_POST['donor_id'];

    // if (isset($_POST['status'])) {
    //     $status = $_POST['status'];
    //     $stmt = $pdo->prepare("UPDATE donatelist SET status = :status WHERE id = :donor_id");
    //     $stmt->bindParam(':status', $status);
    //     $stmt->bindParam(':donor_id', $donor_id);
    //     $stmt->execute();
    // }

    if (isset($_POST['bank'])) {
        $bloodbank = $_POST['bank'];
        // Fetch the blood group of the donor
        $stmt = $pdo->prepare("SELECT blood_group FROM donatelist WHERE id = :donor_id");
        $stmt->bindParam(':donor_id', $donor_id);
        $stmt->execute();
        $donorBloodGroup = $stmt->fetchColumn();
        // Increase quantity by 1 if the donor visited
        if ($bloodbank == 'Visited') {
            $stmt = $pdo->prepare("UPDATE viewstock SET qty = qty + 1 WHERE bloodGroup = :blood_group");
            $stmt->bindParam(':blood_group', $donorBloodGroup);
            $stmt->execute();
        }
        $stmt = $pdo->prepare("UPDATE donatelist SET bloodbank = :bloodbank WHERE id = :donor_id");
        $stmt->bindParam(':bloodbank', $bloodbank);
        $stmt->bindParam(':donor_id', $donor_id);
        $stmt->execute();
    }
}

$stmt = $pdo->query('SELECT * FROM donatelist');
$value = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
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
        <nav>
            <ul>
                <li>
                    <div class="logo">
                        <img src="../img/bloodspot.png" alt="">
                    </div>
                </li>
                <li><a href="admin.php">
                        <i class="fa-solid fa-house"></i>
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                <li><a class="active href=" donorlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Donor list</span>
                    </a></li>
                <li><a href="bloodstock.php">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="nav-item">Blood stock</span>
                    </a></li>
                <li><a href="requestlist.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Blood Request</span>
                    </a></li>

            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>Blood Donor list</h1>
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-user-cog"></i></button>
                    <div class="dropdown-content">
                        <a href="adminsetting.php">Edit Profile</a>
                        <a href="logoutadmin.php">Logout</a>
                    </div>
                </div>
            </div>

            <div class="table-wrapper">
                <table class="fl-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Blood Group</th>
                            <th>Address</th>
                            <th>Time Stamp</th>
                            <!-- <th>Status</th>
                            <th>Action</th> -->
                            <th>Visit Status</th>
                            <th>BloodBank</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;
                        foreach ($value as $item) { ?>
                            <tr>
                                <td>
                                    <?php echo $count ?>
                                </td>
                                <td>
                                    <?php echo $item['name'] ?>
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
                                    <?php echo $item['address'] ?>
                                </td>
                                <td>
                                    <?php echo $item['timestamp'] ?>
                                </td>
                                <!-- this code helps to update specific cell e.g status-2  -->
                                <!-- <td id="status-<?php echo $item['id']; ?>">
                                <?php
                                $status = $item['status'];
                                if ($status == 'Accepted' || $status == "Rejected") {
                                    echo $status;
                                } else {
                                    echo 'Pending';
                                }
                                ?> 
                            </td> 
                            <td>
                                <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" > 

                                <select name="status" onchange="updateStatus(this,<?php echo $item['id']; ?>)">
                                    <option value="" disabled selected>Update</option>
                                    <option class="accept" value="Accepted">Accept</option>
                                    <option class="reject" value="Rejected">Reject</option>
                                </select>
                            </td> -->
                                <td id="bank-<?php echo $item['id']; ?>">
                                    <?php
                                    $status = $item['bloodbank'];
                                    if ($status == 'Visited') {
                                        echo $status;
                                    } else {
                                        echo 'Not Visited';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <select name="bank" onchange="updatebank(this,<?php echo $item['id']; ?>)">
                                        <!-- <option value="Not Visited">Not Visited</option> -->
                                        <option value="" disabled selected>Not Visited</option>
                                        <option value="Visited">Visit</option>
                                    </select>
                                </td>

                            </tr>
                            <?php $count++;
                        } ?>

                    <tbody>
                </table>
            </div>
        </section>
    </div>
    <script>
        // function updateStatus(selectElement, donorId) {
        //     var status = selectElement.value;
        //     var xhr = new XMLHttpRequest();
        //     xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>', true);
        //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //     xhr.onreadystatechange = function() {
        //         if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        //             // yesley  databasema k aayo bhanera dekhaucha hai
        //             console.log(xhr.responseText);

        //             // This will dynamically update the data in status cell 
        //             var statusCell = document.getElementById('status-' + donorId);
        //             statusCell.textContent = status;
        //         }
        //     };
        //     xhr.send('donor_id=' + donorId + '&status=' + status);
        // }

        function updatebank(selectElement, donorId) {
            var bank = selectElement.value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // yesley  databasema k aayo bhanera dekhaucha hai
                    console.log(xhr.responseText);

                    // This will dynamically update the data in bank cell 
                    var statusCell = document.getElementById('bank-' + donorId);
                    statusCell.textContent = bank;
                }
            };
            xhr.send('donor_id=' + donorId + '&bank=' + bank);
        }
    </script>




</body>

</html>