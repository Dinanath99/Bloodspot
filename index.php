<!DOCTYPE html>
<html>

<head>
    <title>Blood Bank Website</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Blood Bank</h1>
            <nav>
                <ul>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#donors">Donate Blood</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="#contact">Request blood</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="banner">
        <div class="container">
            <h2>Welcome to Blood Bank</h2>
            <p>We are here to help you save lives by donating blood. Be a hero today and donate!</p>
            <a href="#donate" class="btn">Donate Now</a>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <h3>About Us</h3>
            <p>Blood Bank is a non-profit organization dedicated to saving lives by providing blood to those in need.
                Our goal is to ensure that blood is available to everyone who needs it, when they need it.</p>
            <p>We work with hospitals, medical centers, and blood banks to ensure that there is always an adequate
                supply of blood. We also provide education and outreach to the community to promote the importance of
                donating blood.</p>
        </div>
    </section>

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

    <footer>
        <div class="container">
            <p>&copy; 2023 Blood Bank. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
<style>
    /* Add styles here */
</style>