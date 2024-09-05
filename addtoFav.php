<?php

session_start();
include 'connection.php';

if (isset($_POST['proId'])) {
    $productId = $_POST['proId'];
    $customerId = $_SESSION['user_id'];

    $sqlcheck = "SELECT * FROM favorite WHERE USER_ID = $customerId AND product_id = $productId";
    $resultcheck = $con->query($sqlcheck);

    if ($resultcheck->num_rows > 0) {
        $sqlupdate = "DELETE FROM favorite WHERE USER_ID = $customerId AND product_id = $productId";

        if ($con->query($sqlupdate) === TRUE) {
            echo 1; // Removed from favorites
            die();
        } else {
            echo 2; // Failed to remove
            die();
        }
    } else {
        $sqlInsertCart = "INSERT INTO favorite (user_id, product_id) VALUES ($customerId, $productId)";

        if ($con->query($sqlInsertCart) === TRUE) {
            echo 3; // Added to favorites
            die();
        } else {
            echo 2; // Failed to add
            die();
        }
    }
} else {
    echo "Product ID not received";
}

$con->close();
?>
