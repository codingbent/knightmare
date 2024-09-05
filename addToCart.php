<?php

session_start();
include 'connection.php';

if (isset($_POST['proId']) && isset($_POST['quantity'])) {
    $productId = $_POST['proId'];
    $quantity = $_POST['quantity'];
    if ($quantity == 0) {
        $quantity = 1;
    }
    $customerId = $_SESSION['user_id'];

    $sqlcheck = "SELECT * FROM CART WHERE USER_ID=$customerId AND product_id=$productId";
    $resultcheck = $con->query($sqlcheck);

    if ($resultcheck->num_rows > 0) {
        $rowcheck = $resultcheck->fetch_assoc();
        $previousQuantity = $rowcheck['quantity'];
        $sqlupdate = "UPDATE CART SET quantity = $previousQuantity + $quantity WHERE USER_ID = $customerId AND product_id = $productId";

        if ($con->query($sqlupdate) === TRUE) {
            echo 1;
            die();
        } else {
            echo 2;
            die();
        }
    } else {
        $sqlInsertCart = "INSERT INTO CART (user_id, product_id, quantity) VALUES ($customerId, $productId, $quantity)";

        if ($con->query($sqlInsertCart) === TRUE) {
            echo 1;
            die();
        } else {
            echo 2;
            die();
        }
    }
} else {
    echo "Product ID or quantity not received";
}

$con->close();
?>
