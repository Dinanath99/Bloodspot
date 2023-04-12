<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Blood</title>
    <link rel="stylesheet" href="home.css">

</head>

<body>

    <section id="donors">
        <div class="container">
            <h3>Donors</h3>
            <p>Donating blood is easy and can save lives. If you are interested in becoming a donor, please fill out the
                form below and we will contact you to schedule an appointment.</p>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone"><br>

                <label for="blood-type">Blood Type:</label>
                <select id="blood-type" name="blood-type">
                    <option value="a+">A+</option>
                    <option value="a-">A-</option>
                    <option value="b+">B+</option>
                    <option value="b-">B-</option>
                    <option value="o+">O+</option>
                    <option value="o-">O-</option>
                    <option value="ab+">AB+</option>
                    <option value="ab-">AB-</option>
                </select><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <h3>Contact Us</h3>
            <p>If you have any questions or comments, please fill out the form below and we will get back to you as soon
                as possible.</p>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br>

                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </section>


</body>

</html>