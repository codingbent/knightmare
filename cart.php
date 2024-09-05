<?php
include 'connection.php';
include 'nav.php';

$a = 1;
$total = 0;
$shipping = 0;
$user = $_SESSION['user_id']; // Assuming user_id is stored in the session

$sqlcart = "SELECT * FROM cart WHERE user_id=$user";
$resultcart = $con->query($sqlcart);

if ($resultcart->num_rows > 0) {
    echo '<p class="container fs-4 text p-2 bg-body-secondary">Your Bag</p>';
    echo '<div class="d-flex">';
    echo '<div class="col-sm-8">';
    echo '<table class="table">';
    echo '<tr>';
    echo '<th scope="col" style="width:5%">S.no</th>';
    echo '<th scope="col" style="width:25%">Image</th>';
    echo '<th scope="col" style="width:20%">Item</th>';
    echo '<th scope="col" style="width:20%">Price</th>';
    echo '<th scope="col" style="width:5%">Action</th>';
    echo '</tr>';

    while ($rowcart = $resultcart->fetch_assoc()) {
        $product_id = $rowcart["product_id"];
        $query = "SELECT p.title, p.price, p.image
                  FROM product p
                  WHERE p.p_id = $product_id";
        $result = $con->query($query);
        $row = $result->fetch_assoc();

        echo '<tr>';
        echo '<th scope="row">' . $a++ . '</th>';
        echo '<td><a onclick="description(' . $product_id . ')"><img src="' . $row["image"] . '" style="width:50%;height:50%;"><br><h5 class="mt-3">' . $row["title"] . '</h5></a></td>';
        echo '<td><button class="btn btn-light decrement" onclick="decrementQuantity(' . $product_id . ')">-</button><input type="text" id="productQuantity_' . $product_id . '" class="w-25 text-center mx-1 border border-0" value="' . $rowcart['quantity'] . '"><button class="btn btn-light" onclick="incrementQuantity(' . $product_id . ')">+</button></td>';
        echo '<td><h5 class="mt-2">₹' . $row["price"] . '</h5></td>';
        $total += $rowcart['quantity'] * $row['price'];
        $shipping = $total * 0.01;
        echo '<td><button class="btn btn-light" onclick="removeProduct(' . $rowcart['cart_id'] . ')"><i class="fa-solid fa-xmark"></i></button></td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</div>';
    echo '<div class="col-sm-4">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Order Summary</th>';
    echo '<th scope="col"></th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    echo '<tr>';
    echo '<td scope="row">' . ($a - 1) . ' Products </td>';
    echo '<td>₹' . $total . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Shipping</td>';
    echo '<td>₹' . $shipping . '</td>';
    echo '</tr>';
    echo '<tr class="">';
    echo '<td>Total</td>';
    echo '<td>₹' . ($total + $shipping) . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td><a href="index.php"><button class="btn btn-primary w-100">Continue Shopping</button></a></td>';
    echo '<td><a href="checkout.php"><button class="btn btn-success w-100">Check Out</button></a></td>';
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
} else {
    echo '<p>continue Shopping</p>';
}
?>

<script>
function incrementQuantity(productId) {
    var quantityInput = document.getElementById('productQuantity_' + productId);
    var quantity = parseInt(quantityInput.value);
    quantity++;
    quantityInput.value = quantity;
    updateCart(productId, quantity);
}

function decrementQuantity(productId) {
    var quantityInput = document.getElementById('productQuantity_' + productId);
    var quantity = parseInt(quantityInput.value);
    if (quantity > 0) {
        quantity--;
        quantityInput.value = quantity;
    }
    updateCart(productId, quantity);
}

function updateCart(productId, quantity) {
    var isLoggedIn = <?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>;

    if (!isLoggedIn) {
        alert("Please log in");
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateCart.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status == 200) {
                location.reload();
            } else {
                alert('Error updating cart.');
            }
        };
        xhr.send('productId=' + productId + '&quantity=' + quantity);
    }
}

function removeProduct(cartId) {
    location.href = "removeproductCart.php?cartId=" + cartId;
}

function description(p_id) {
    $.ajax({
        url: "set_session.php",
        type: "POST",
        data: {p_id: p_id},
        success: function(response) {
            window.location.href = "description.php";
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
</script>

<?php 
include 'footer.php';
?>
