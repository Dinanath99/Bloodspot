<!-- blooddonordashboard.html -->

<!DOCTYPE html>
<html>

<head>
    <title>Blood Donor Dashboard</title>
    <link rel="stylesheet" href="dboard.css" />
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Donation History</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Welcome to Blood Donor Dashboard</h1>
        <div class="donation-stats">
            <div class="stat-item">

                <table>
                    <tr>
                        <td>Total Donations :
                        </td>
                    </tr>
                    <tr>
                        <td>Last Donation Date :
                        </td>
                    </tr>
                    <tr>
                        <td>Total Donations:
                        </td>
                    </tr>
                </table>

            </div>
            <div class="stat-item">
                <h2>Last Donation Date</h2>
                <p class="stat-value">March 25, 2023</p>
            </div>
            <div class="stat-item">
                <h2>Eligibility Status</h2>
                <p class="stat-value">Eligible</p>
            </div>
        </div>
        <div class="donation-history">
            <h2>Donation History</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Donation Type</th>
                </tr>
                <tr>
                    <td>March 25, 2023</td>
                    <td>New York Blood Center</td>
                    <td>Whole Blood</td>
                </tr>
                <tr>
                    <td>February 15, 2023</td>
                    <td>Red Cross Blood Center</td>
                    <td>Plasma</td>
                </tr>
                <!-- Add more rows as needed -->
            </table>
        </div>
    </div>
    <div class="footer-container">
        <p class="footer-bottom">© 2023 Bloodspot. All Rights Reserved.</p>
    </div>
</body>

</html>