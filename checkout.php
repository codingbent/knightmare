<?php
include 'connection.php'; // Ensure this file initializes and handles sessions
include 'nav.php'; // Assuming this file contains your navigation structure

// Fetch user's addresses
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM address WHERE user_id=$user_id";
$result = $con->query($sql);
$total=0;
$shipping=0;

$sqlcart = "SELECT * FROM cart WHERE user_id=$user";
$resultcart = $con->query($sqlcart);
while ($rowcart = $resultcart->fetch_assoc()) {
    $product_id = $rowcart["product_id"];
    $query = "SELECT p.title, p.price, p.image
              FROM product p
              WHERE p.p_id = $product_id";
    $result1 = $con->query($query);
    $row = $result1->fetch_assoc();
$total += $rowcart['quantity'] * $row['price'];
$shipping = $total * 0.01;}



$cartItems = []; // Placeholder for cart items

// Example: Fetching cart items from session or database
if (isset($_SESSION['cart'])) {
    $cartItems = $_SESSION['cart'];
}
?>

    <div class="container my-4">
        <h2 class="mb-4">Checkout</h2>

        <!-- Address Section -->
        <div class="card mb-4">
            <div class="card-header">
                Address Details
            </div>
            <div class="card-body">
                <?php if ($result->num_rows > 0) { ?>
                    <form method="POST">
                        <div class="form-group">
                            <label for="addressSelect">Select Address:</label>
                            <select class="form-control" id="addressSelect" name="address_id" required>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['address_id']; ?>">
                                        <?php echo "{$row['house_no']}, {$row['house_name']}, {$row['line1']}, {$row['line2']}, {$row['city']}, {$row['state']} - {$row['pincode']}"; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </form>
                <?php } else { ?>
                    <p>No addresses found. <a href="index.php">Add an address</a></p>
                <?php } ?>
            </div>
        </div>

        <!-- Payment Section -->
        <div class="card mb-4">
            <div class="card-header">
                Payment Options
            </div>
            <div class="card-body">
                <!-- Replace with your payment options and integration -->
                <p>Payment gateway options and integration will go here.</p>
                <p>For example, you can integrate PayPal, Stripe, or other payment gateways.</p>
            </div>
        </div>

        <!-- Cart Summary -->
        <div class="card">
            <div class="card-header">
                Cart Summary
            </div>
            <div class="card-body">
                <ul class="list-group mb-3">
                    <?php foreach ($cartItems as $item) { ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><?php echo $item['name']; ?></h6>
                                <small class="text-muted"><?php echo $item['quantity']; ?> x ₹<?php echo $item['price']; ?></small>
                            </div>
                            <span class="text-muted">₹<?php echo $item['quantity'] * $item['price']; ?></span>
                        </li>
                    <?php } ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (INR)</span>
                        <strong>₹<?php echo $total+$shipping;
                                    ?></strong>
                    </li>
                </ul>
                <form action="confirmOrder.php" method="post">
                    <button type="submit" class="btn btn-primary btn-block">Place Order</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

