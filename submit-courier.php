<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $parcelType = htmlspecialchars($_POST['parcelType']);
    $weight = htmlspecialchars($_POST['weight']);
    $pickupLocation = htmlspecialchars($_POST['pickupLocation']);
    $dropoffLocation = htmlspecialchars($_POST['dropoffLocation']);
    $deliveryDate = htmlspecialchars($_POST['deliveryDate']);
    $deliveryTime = htmlspecialchars($_POST['deliveryTime']);

    // Here, you would typically save this information to a database
    // or send it via email. For demonstration, we will just display the data.
    
    echo "<h1>Booking Confirmation</h1>";
    echo "<p>Parcel Type: $parcelType</p>";
    echo "<p>Weight: $weight kg</p>";
    echo "<p>Pick-Up Location: $pickupLocation</p>";
    echo "<p>Drop-Off Location: $dropoffLocation</p>";
    echo "<p>Delivery Date: $deliveryDate</p>";
    echo "<p>Delivery Time: $deliveryTime</p>";
} else {
    // Redirect to the courier page if the form was not submitted
    header("Location: /courier.php");
    exit();
}
?>
