<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Royal Swift Express</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/transition.css">
  <link rel="stylesheet" href="css/responsive.css">

    <title> Hire - Royal Swift Express</title>
    <link href="https://fonts.googleapis.com/css2?family=Georgia:wght@400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Georgia', serif;
            background-image: url('/images/back3.jpg'); /* Adjust to your service page background */
            background-size: cover;
            color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center content horizontally */
        }
        .container {
            max-width: 800px;
            margin: 20px;
            padding: 20px;
            
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white background */
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center text */
        }
        h1, h2 {
            margin: 10px 0; /* Reduce margin for tighter layout */
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center form elements */
        }
        label {
            margin-top: 10px;
            text-align: left; /* Left align labels for better readability */
            width: 100%; /* Full width for labels */
        }
        input, select {
            width: 80%; /* Limit input width */
            padding: 8px; /* Reduced padding for tighter spacing */
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            background-color: #F4CE14; /* Button color */
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            width: 80%; /* Full width for button */
        }
        button:hover {
            background-color: #FFC107; /* Darker button color on hover */
        }
    </style>
</head>
<body>

<!-- Header Section -->
   <header style="background-color: #F5F7F8; color: #000; padding: 15px 0; position: sticky; top: 0; width: 100%; z-index: 1000;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
        <!-- Logo -->
       <div>
    <a href="/" style="text-decoration: none;">
        <img src="/images/logopic1.png" alt="Royal Swift" style="height: 40px; animation: dance 1s infinite; animation-play-state: paused;" class="logo">
    </a>
</div>

<style>
    @keyframes dance {
        0% { transform: translateY(0); }
        25% { transform: translateY(-8px); }
        50% { transform: translateY(0); }
        75% { transform: translateY(1px); }
        100% { transform: translateY(0); }
    }

    /* Apply the animation on page load */
    .logo {
        animation-play-state: running;
        animation-duration: 0.9s; /* Set duration for one cycle */
        animation-timing-function: ease-in-out;
    }
</style>

<script>
    window.onload = function() {
        const logo = document.querySelector('.logo');
        logo.style.animationPlayState = 'running'; // Start the animation on load
    };
</script>

        
       <!-- Navigation Links -->
<!-- Navigation Links -->
<!-- Navigation Links -->
<nav style="flex-grow: 1; display: flex; justify-content: center;">
    <a href="/index.html" style="text-decoration: none; color: #272829; margin: 0 15px; font-size: 16px;">Home</a>
    <a href="/about.html" style="text-decoration: none; color: #272829; margin: 0 15px; font-size: 16px;">About</a>
    <a href="/service.html" style="text-decoration: none; color: #272829; margin: 0 15px; font-size: 16px;">Services</a>
    <a href="/contact.html" style="text-decoration: none; color: #272829; margin: 0 15px; font-size: 16px;">Contact</a>
    
    
    
        <a href="/blog.html" style="text-decoration: none; color: #272829; margin: 0 15px; font-size: 16px;">Blog</a>
       
   
</nav>



        <!-- Booking -->
        <div>
    <a href="/service.html" 
       style="background-color: #F4CE14; color: #000; padding: 10px 20px; border-radius: 5px; 
              text-decoration: none; font-size: 16px; font-weight: bold;
              transition: transform 0.3s ease, box-shadow 1.5s ease;">
        <strong>Book A Service</strong>
    </a>
</div>

    </div>
</header>

<!-- Main Content -->
<div class="container">
    <h1>Book Your Matatu Hire for Events</h1>
    <h2>Reliable and Comfortable Transport for Your Special Occasion</h2>
    <p>Fill out the form below to book your matatu for events such as weddings, corporate functions, or family gatherings. We ensure safe and comfortable travel for you and your guests!</p>
 <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli('localhost', 'username', 'password', 'database');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $eventType = htmlspecialchars($_POST['eventType']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $passengers = htmlspecialchars($_POST['passengers']);
    $pickupLocation = htmlspecialchars($_POST['pickupLocation']);
    $dropoffLocation = htmlspecialchars($_POST['dropoffLocation']);

    // Insert booking data into the database
    $stmt = $conn->prepare("INSERT INTO bookings (eventType, date, time, passengers, pickupLocation, dropoffLocation) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $eventType, $date, $time, $passengers, $pickupLocation, $dropoffLocation);

    if ($stmt->execute()) {
        // Booking Confirmation Output
        echo "<h2>Booking Confirmation</h2>";
        echo "<p>Your booking for a <strong>$eventType</strong> on <strong>$date</strong> at <strong>$time</strong> for <strong>$passengers</strong> passengers has been confirmed.</p>";
        echo "<p>Pick-Up Location: <strong>$pickupLocation</strong></p>";
        echo "<p>Drop-Off Location: <strong>$dropoffLocation</strong></p>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    // Display the booking form
    ?>
    <h2>Book Your Matatu Hire for Events</h2>
    <p>Reliable and Comfortable Transport for Your Special Occasion</p>
    <p>Fill out the form below to book your matatu for events such as weddings, corporate functions, or family gatherings. We ensure safe and comfortable travel for you and your guests!</p>

    <form action="matatu_hire.php" method="POST">
        <label for="eventType">Event Type:</label>
        <select id="eventType" name="eventType" required>
            <option value="wedding">Wedding</option>
            <option value="corporate">Corporate Event</option>
            <option value="family">Family Gathering</option>
            <option value="other">Other</option>
        </select>

        <label for="date">Event Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Event Time:</label>
        <input type="time" id="time" name="time" required>

        <label for="passengers">Number of Passengers:</label>
        <input type="number" id="passengers" name="passengers" min="1" required>

        <label for="pickupLocation">Pick-Up Location:</label>
        <input type="text" id="pickupLocation" name="pickupLocation" placeholder="Enter pick-up location" required>

        <label for="dropoffLocation">Drop-Off Location:</label>
        <input type="text" id="dropoffLocation" name="dropoffLocation" placeholder="Enter drop-off location" required>

        <button type="submit">Submit Booking</button>
    </form>
    <?php
}

$conn->close(); // Close the connection
?>

</div>

<!-- Footer Section -->

<footer id="footer" style="background-color: #1E201E; color: #F4CE14; padding: 40px 0;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;">
        <!-- Logo Holder -->
        <div style="flex: 0 0 150px; padding: 10px;">
            <a href="/" style="text-decoration: none;">
                <img src="/images/logopic1.png" alt="Your Matatu Company" style="height: 60px;">
            </a>
        </div>

        <!-- Company Info -->
        <div style="flex: 1; min-width: 200px; padding: 10px;">
            <h3 style="font-size: 18px;">Royal Swift Express Limited.</h3>
            <p style="font-size: 14px; color: #aaa;">
                Providing safe and reliable transportation across Kenya. Hire a matatu for events, private travel, or business trips.
            </p>
        </div>
        
        <!-- Navigation Links -->
        <div style="flex: 1; min-width: 150px; padding: 10px;">
            <h4 style="font-size: 16px;">Company</h4>
            <ul style="list-style: none; padding: 0;">
                <li><a href="#" style="text-decoration: none; color: #fff; font-size: 14px;">About Us</a></li>
                <li><a href="#" style="text-decoration: none; color: #fff; font-size: 14px;">Careers</a></li>
                <li><a href="#" style="text-decoration: none; color: #fff; font-size: 14px;">Blog</a></li>
                <li><a href="#" style="text-decoration: none; color: #fff; font-size: 14px;">Contact</a></li>
            </ul>
        </div>
        
        <div style="flex: 1; min-width: 150px; padding: 10px;">
            <h4 style="font-size: 16px;">Services</h4>
            <ul style="list-style: none; padding: 0;">
                <li><a href="#" style="text-decoration: none; color: #fff; font-size: 14px;">Matatu Hire</a></li>
                <li><a href="#" style="text-decoration: none; color: #fff; font-size: 14px;">Special Events</a></li>
                <li><a href="#" style="text-decoration: none; color: #fff; font-size: 14px;">Corporate Travel</a></li>
                <li><a href="#" style="text-decoration: none; color: #fff; font-size: 14px;">Custom Packages</a></li>
            </ul>
        </div>
        
        <!-- Social Media Links -->
        <div style="flex: 1; min-width: 200px; padding: 10px;">
            <h4 style="font-size: 16px;">Follow Us</h4>
            <a href="#" style="text-decoration: none; color: #fff; font-size: 14px; margin-right: 15px;">
                <img src="/icons/facebook.png" alt="Facebook" style="width: 24px; vertical-align: middle;"> Facebook
            </a><br>
            <a href="#" style="text-decoration: none; color: #fff; font-size: 14px; margin-right: 15px;">
                <img src="/icons/twitter.png" alt="Twitter" style="width: 24px; vertical-align: middle;"> Twitter
            </a><br>
            <a href="#" style="text-decoration: none; color: #fff; font-size: 14px; margin-right: 15px;">
                <img src="/icons/instagram.png" alt="Instagram" style="width: 24px; vertical-align: middle;"> Instagram
            </a>
        </div>
    </div>
    <div style="text-align: center; padding: 20px 0; color: #aaa; font-size: 12px;">
        © 2024 Royal Swift Express LTD. All rights reserved. | <a href="#" style="color: #fff; text-decoration: none;">Privacy Policy</a> | <a href="#" style="color: #fff; text-decoration: none;">Terms of Service</a>
    </div>
</footer>

</body>
</html>
