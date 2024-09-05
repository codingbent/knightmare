<?php
include 'connection.php';
include 'nav.php';
?>
<div class="mx-5">
    <div class="container mt-3 title d-flex justify-content-between">
        <p class="fs-3 text">Product Grid</p>
        <a href="addProduct.php" class="fs-3 text btn btn-success">Add Product</a>
    </div>

    <div class="container text-center">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <?php
            // Fetch product details from database
            $query = "SELECT * FROM product";
            $resultproduct = $con->query($query);
            
            // Check if there are products in the database
            if ($resultproduct->num_rows > 0) {
                // Output data of each row
                while($rowproduct = $resultproduct->fetch_assoc()) {
                    echo '<div class="col m-1">';
                    echo '    <div class="p-3">';
                    echo '        <div class="card m-1">';
                    echo '            <div class="image">';
                    echo '              <img src="' . $rowproduct["image"] . '" class="card-img-top" alt="...">';
                    echo '            </div>';
                    echo '            <div class="card-body">';
                    echo '                <h5 class="card-title">' . $rowproduct["title"] . '</h5>';
                    echo '                <p class="card-text">' . $rowproduct["label"] . '</p>';
                    echo '                <p class="card-text">₹' . $rowproduct["price"] . '</p>';
                    echo '                <a onclick="edit(' . $rowproduct['p_id'] . ');" class="btn btn-primary">Edit</a>';
                    echo '                <button onclick="remove(\'' . $rowproduct["title"] . '\', ' . $rowproduct["p_id"] . ')" class="btn btn-danger">Delete</button>';
                    echo '            </div>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products found</p>';
            }
            
            // Close the connection
            $con->close();
            ?>
        </div>
    </div>
</div>
<script>
function remove(title, id){
    if(confirm("Do you want to remove the product " + title + "?")){
        location.href = "removeProduct.php?delete_id=" + id;
    }
}

function edit(e_id) {
    $.ajax({
        url: "set_session.php",
        type: "POST",
        data: { e_id: e_id },
        success: function(response){
            window.location.href = "productEdit.php";
        },
        error: function(xhr, status, error){
            console.error(error);
        }
    });
}
</script>
<?php
include 'footer.php';
?>