<?php
// Include necessary files
include 'connection.php'; // Ensure this file initializes and handles sessions
include 'nav.php'; // Assuming this file contains your navigation structure

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

$user_id = $_SESSION['user_id'];

// Handle order confirmation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmOrder'])) {
    // Retrieve cart items for the user
    $sql_cart = "SELECT * FROM cart WHERE user_id = $user_id";
    $result_cart = $con->query($sql_cart);

    if ($result_cart->num_rows > 0) {
        // Insert order into orders table
        $order_date = date("Y-m-d H:i:s");
        $order_status = 'Pending'; // Or whatever initial status you need

        while ($row_cart = $result_cart->fetch_assoc()) {
            $product_id = $row_cart['product_id'];
            $quantity = $row_cart['quantity'];

            $sql_order = "INSERT INTO orders (user_id, order_date, status, product_id, quantity) 
                          VALUES ('$user_id', '$order_date', '$order_status', '$product_id', '$quantity')";
            $con->query($sql_order);

            // Decrease product stock
            // $sql_update_stock = "UPDATE product SET stock = stock - $quantity WHERE product_id = $product_id";
            // $con->query($sql_update_stock);
        }

        // Clear cart for the user
        $sql_clear_cart = "DELETE FROM cart WHERE user_id = $user_id";
        $con->query($sql_clear_cart);

        echo "<script>alert('Order placed successfully!')</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Your cart is empty.')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Order</title>
    <!-- Add your CSS and JS files here -->
</head>
<body>
    <div class="container">
        <h2>Confirm Order</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Add any necessary form fields for confirmation, like payment method -->
            <div class="form-group">
                <label for="paymentMethod">Payment Method</label>
                <select class="form-control" id="paymentMethod" name="paymentMethod" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="Net Banking">Net Banking</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                </select>
            </div>
            <button type="submit" name="confirmOrder" class="btn btn-primary">Confirm Order</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
