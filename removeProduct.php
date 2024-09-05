<?php
session_start();
include 'connection.php';

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sqlDeleteFav="DELETE FROM favorite where product_id=$delete_id";
    $sqlDeleteProduct = "DELETE FROM product WHERE p_id = $delete_id";
    
    if ($con->query($sqlDeleteFav)=== TRUE  && $con->query($sqlDeleteProduct) === TRUE) {
        echo "Product Deleted from cart successfully";

    } else {
        echo "Error deleteing product from cart: " . $con->error;
    }
} else {
    echo "Product ID not received";
}

$con->close();
?>
