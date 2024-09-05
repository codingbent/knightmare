<?php
session_start();
include 'connection.php';

if (isset($_GET['cartId'])) {
    $cartId = $_GET['cartId'];
    $sqlDeleteCart = "DELETE FROM cart WHERE `cart_id` = $cartId";
   
    if ($con->query($sqlDeleteCart) === TRUE) {
        echo "Product Deleted from cart successfully";
        header("location:cart.php");
    } else {
        echo "Error deleteing product from cart: " . $con->error;
    }
} else {
    echo "Product ID not received";
}

$con->close();
?>
