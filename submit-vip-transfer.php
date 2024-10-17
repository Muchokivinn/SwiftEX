<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $transferType = htmlspecialchars($_POST['transferType']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $passengers = htmlspecialchars($_POST['passengers']);
    $pickupLocation = htmlspecialchars($_POST['pickupLocation']);
    $dropoffLocation = htmlspecialchars($_POST['dropoffLocation']);

    // Here, you could save this information to a database or send it via email
    // For demonstration, we will display the data.
    
    echo "<h1>Booking Confirmation</h1>";
    echo "<p>Transfer Type: $transferType</p>";
    echo "<p>Transfer Date: $date</p>";
    echo "<p>Transfer Time: $time</p>";
    echo "<p>Number of Passengers: $passengers</p>";
    echo "<p>Pick-Up Location: $pickupLocation</p>";
    echo "<p>Drop-Off Location: $dropoffLocation</p>";
} else {
    // Redirect to the VIP transfer page if the form was not submitted
    header("Location: /vip-transfer.php");
    exit();
}
?>
