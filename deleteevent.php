<?php
include 'db_connection.php';

// Check if event ID is provided
if (isset($_GET['id'])) {
    // Escape event ID to prevent SQL injection
    $event_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Start a transaction
    mysqli_begin_transaction($conn);

    // Delete from favorites table first
    $sql1 = "DELETE FROM favorites WHERE event_id = '$event_id'";

    // Delete from cart table
    $sql2 = "DELETE FROM cart WHERE event_id = '$event_id'";

    // Delete from booking_details table
    $sql3 = "DELETE FROM booking_details WHERE event_id = '$event_id'";

    // Finally, delete from event table
    $sql4 = "DELETE FROM event WHERE event_id = '$event_id'";

    // Execute queries
    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)) {
        // Commit transaction if all queries are successful
        mysqli_commit($conn);
        echo "<script>alert('Event deleted successfully'); window.location.href = 'editevent.php';</script>";
    } else {
        // Rollback transaction if any query fails
        mysqli_rollback($conn);
        echo "Error deleting event: " . mysqli_error($conn);
    }
} else {
    // Event ID not provided
    echo "Event ID not provided";
}

mysqli_close($conn);
?>
