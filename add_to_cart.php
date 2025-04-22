<?php

include 'db_connection.php';
session_start();

if (isset($_SESSION['user_id']) && isset($_POST['event_id'])) {
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$event_id = mysqli_real_escape_string($conn, $_POST['event_id']);

$check_cart = "SELECT * FROM cart WHERE user_id = '$user_id' AND event_id = '$event_id'";
$cart_result = mysqli_query($conn, $check_cart);

if (mysqli_num_rows($cart_result) > 0) {
$_SESSION['message'] = "Event is already in the cart.";
} else {
$insert_cart = "INSERT INTO cart (user_id, event_id) VALUES ('$user_id', '$event_id')";
if (mysqli_query($conn, $insert_cart)) {
$_SESSION['message'] = "Event added to cart successfully.";
} else {
$_SESSION['message'] = "Error adding event to cart: " . mysqli_error($conn);
}
}

// Redirect back to the event details page
header("Location: event_details.php?event_id=$event_id");
exit;
} else {
$_SESSION['message'] = "You must be logged in to add items to your cart.";
header('Location: login.php');
exit;
}
?>
