<?php
session_start();
include 'connection.php';

if (isset($_POST['p_id'])) {
    $p_id = $_POST['p_id'];
    $sqlDeleteCart = "DELETE FROM favorite WHERE product_id = $p_id";
   
    if ($con->query($sqlDeleteCart) === TRUE) {
        echo "Product removed from cart successfully";

    } else {
        echo "Error deleteing product from cart: " . $con->error;
    }
} else {
    echo "Product ID not received";
}

$con->close();
?>
