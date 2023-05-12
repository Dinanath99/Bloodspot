<?php
include('dbconn.php');
include('adminsession.php');
if (isset($_POST['donor_id']) && isset($_POST['status'])) {
    $donor_id = $_POST['donor_id'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE donatelist SET status= :status WHERE id= :donor_id");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':donor_id', $donor_id);
    $stmt->execute();

    echo $status;
    exit;
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
                <li><a href="admin.php" class="logo">
                        <img src="../img/bloodspot.png" alt="">
                        <span class="nav-item">Admin Panel</span>
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
                <!-- <li><a href="#">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Setting</span>
                    </a></li> -->
                <!-- <li><a href="#">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Help</span>
                    </a></li> -->
                <li><a href="logoutadmin.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout</span>
                    </a></li>
            </ul>
        </nav>

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
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Blood Group</th>
                                <th>Address</th>
                                <th>Time Stamp</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($value as $item) { ?>
                            <tr>
                                <td><?php echo $item['id'] ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['email'] ?></td>
                                <td><?php echo $item['contact'] ?></td>
                                <td><?php echo $item['dob'] ?></td>
                                <td><?php echo $item['gender'] ?></td>
                                <td><?php echo $item['blood_group'] ?></td>
                                <td><?php echo $item['address'] ?></td>
                                <td><?php echo $item['timestamp'] ?></td>
                            <!-- this code helps to update specific cell e.g status-2  -->
                                <td id="status-<?php echo $item['id']; ?>">
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
                                    <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="statusForm"> -->
                                        
                                        <select name="status" onchange="updateStatus(this,<?php echo $item['id'];?>)">
                                            <option value="" disabled selected>Update</option>
                                            <option value="Accepted">Accept</option>
                                            <option value="Rejected">Reject</option>
                                        </select>
                                        <!-- <input type="submit" name="update_status" value="submit" /> -->
                                    <!-- </form> -->
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </center>

            </div>
        </section>
    </div>
    <script>
       function updateStatus(selectElement, donorId) {
  var status = selectElement.value;
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // yesley  databasema k aayo bhanera dekhaucha hai
      console.log(xhr.responseText);

      // This will dynamically update the data in status cell 
      var statusCell = document.getElementById('status-' + donorId);
      statusCell.textContent = status;
    }
  };
  xhr.send('donor_id=' + donorId + '&status=' + status);
}


    </script>
   
</body>

</html>