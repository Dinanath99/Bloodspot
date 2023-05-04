<!DOCTYPE html>
<html>

<head>
    <style>
        h1 {
            text-align: center;
        }

        table,
        th {
            border: 2px solid red;
            padding: 20px;
            text-align: center;
            font-size: 25px;

        }

        table,
        tr,
        td {
            border: 2px solid red;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <!--include side bar tab  -->
    <?php
    include 'adminsidebar.php';
    ?>

    <div class="content">
        <h1>Blood donor list</h1>
        <center>

            <table>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact Details</th>
                    <th>Blood Type</th>
                </tr>
                <!-- retrive your data from database using php -->
                <tr>
                    <td>unkown</td>
                    <td>unkown</td>
                    <td>unkown</td>
                    <td>unkown</td>
                    <td>unkown</td>
                </tr>
            </table>
        </center>
    </div>
</body>

</html>