<!DOCTYPE html>
<html>
<head>
    <title>Blood Bank Request Form</title>
    <link rel="stylesheet" href="request.css"/>
</head>
<body>
    <div class="container">
        <h1>Blood Request Form</h1>
        <form id="bloodBankRequestForm">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <label for="contactNumber">Contact Number:</label>
            <input type="text" id="contactNumber" name="contactNumber" required>
            <label for="address">Address:</label>
            <input type="text" name="address" id="addresss" required>
            <label for="dateOfRequest">Date of Request:</label>
            <input type="date" id="dateOfRequest" name="dateOfRequest" required>
           
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>
            <label for="Blooodtype">Bloodtype:</label>
            <select id="bloodtype" name="bloodtype" required>
                <option value="">Select bloodtype</option>
                <option value="urgent">A-</option>
                <option value="routine">A+</option>
                <option value="routine">AB-</option>
                <option value="routine">AB+</option>
                <option value="routine">B-</option>
                <option value="routine">A+</option>
                <option value="routine">O-</option>
            </select>
            <label for="reasonForRequest">Reason for Request:</label>
            <textarea rows="4" cols="40" name="myText"></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
