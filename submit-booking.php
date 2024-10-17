<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $eventType = $_POST['eventType'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $passengers = $_POST['passengers'];
    $pickupLocation = $_POST['pickupLocation'];
    $dropoffLocation = $_POST['dropoffLocation'];

    // Process data (e.g., store in a database, send an email, etc.)
    // For example, sending an email confirmation:
    $to = "your-email@example.com";
    $subject = "New Booking Request";
    $message = "Event Type: $eventType\nDate: $date\nTime: $time\nPassengers: $passengers\nPick-Up: $pickupLocation\nDrop-Off: $dropoffLocation";
    $headers = "From: webmaster@example.com";

    mail($to, $subject, $message, $headers);

    // Redirect to a thank you page or show a success message
    header("Location:index.html");
    exit();
}
?>
