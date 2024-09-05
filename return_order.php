<?php
include 'connection.php';
session_start();

// Check if user_id and order_id are set
if (isset($_SESSION['user_id']) && isset($_GET['order_id'])) {
    $user_id = $_SESSION['user_id'];
    $order_id = $_GET['order_id'];

    // Validate order_id (Ensure it's an integer to prevent SQL injection)
    if (filter_var($order_id, FILTER_VALIDATE_INT)) {
        // Prepare and execute the update query
        $sql = "UPDATE orders SET status = 'Returned' WHERE order_id = ? AND user_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ii", $order_id, $user_id);

        if ($stmt->execute()) {
            // Successfully updated the order status
            $_SESSION['message'] = "Order returned successfully.";
        } else {
            // Error occurred
            $_SESSION['message'] = "Failed to return the order. Please try again.";
        }

        // Close the statement
        $stmt->close();
    } else {
        $_SESSION['message'] = "Invalid order ID.";
    }
} else {
    $_SESSION['message'] = "You need to be logged in to return an order.";
}

// Close the connection
mysqli_close($con);

// Redirect back to the order history page
header("Location: order_history.php"); // Change to your actual order history page
exit();
?>
