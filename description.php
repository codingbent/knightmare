<?php
include 'connection.php';
include 'nav.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['p_id'])) {
        $p_id = $_POST['p_id'];
        $_SESSION['p_id'] = $p_id; 
    } else {
        die("p_id not received");
    }
}
$isfavorite=false;
if (isset($_SESSION['p_id'])) {
    $p_id = $_SESSION['p_id'];

    $sqlproduct = "SELECT * FROM product WHERE p_id=?";
    $stmt = $con->prepare($sqlproduct);
    $stmt->bind_param("i", $p_id);
    $stmt->execute();
    $resultproduct = $stmt->get_result();

    $sqlcart = "SELECT * FROM cart WHERE product_id=?";
    $stmt = $con->prepare($sqlcart);
    $stmt->bind_param("i", $p_id);
    $stmt->execute();
    $resultcart = $stmt->get_result();

    $sqldetails="SELECT * FROM product_details where p_id=?";
    $stmt = $con->prepare($sqldetails);
    $stmt->bind_param("i", $p_id);
    $stmt->execute();
    $resultdetails = $stmt->get_result();


    if (!$resultproduct) {
        die("Error in product query: " . $con->error);
    }

    if ($resultproduct->num_rows > 0) {
        $rowproduct = $resultproduct->fetch_assoc();
    } else {
        $rowproduct = null; 
    }
    $category=$rowproduct['c_id'];
    $sqlcategory="SELECT * FROM category where category_id=$category";
    $resultcategory=$con->query($sqlcategory);
    if($resultcategory->num_rows>0){
        while($rowcategory=$resultcategory->fetch_assoc()){
            $categoryType= $rowcategory['category_name'];
        }
    }
    if ($resultcart->num_rows > 0) {
        $totalProduct = $resultcart->fetch_assoc();
    } else {
        $totalProduct = 0; 
    }
} else {
    echo "p_id not found in session";
}
?>
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-xl-6">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $rowproduct['image']?>" style="width: 25rem; margin: 10px" class="d-block" alt="...">
                        </div>
                        <?php
                        if($rowproduct['image2']!=0){
                            echo ' <div class="carousel-item">';
                            echo '<img src="' . $rowproduct['image2'] . '" style="width: 25rem; margin: 10px" class="d-block" alt="...">';
                            echo '</div>';
                        }
                        if($rowproduct['image3']!=0){
                            echo ' <div class="carousel-item">';
                            echo '<img src="' . $rowproduct['image3'] . '" style="width: 25rem; margin: 10px" class="d-block" alt="...">';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-5 col-xl-6">
                <div class="ps-lg-10 mt-6 mt-md-0">
                    <h1 class="mb-1"><?php echo $rowproduct['title'] ?></h1>
                    <div class="fs-4">
                        <span class="text-dark"><?php echo $rowproduct['label'] ?></span>
                        <!-- <span class="text-decoration-line-through text-muted"><?php echo $rowproduct['original_price'] ?></span>
                        <span><small class="fs-6 ms-2 text-danger"><?php echo $rowproduct['discount'] ?></small></span> -->
                    </div>
                    <hr class="my-6">
                    <!-- <div class="mb-5">
                        <button type="button" class="btn btn-outline-secondary">250g</button>
                        <button type="button" class="btn btn-outline-secondary">500g</button>
                        <button type="button" class="btn btn-outline-secondary">1kg</button>
                    </div> -->
                    <div>
                        <?php
                        echo '<div class="input-group input-spinner">';
                        echo '    <button class="btn btn-light" onclick="decrementQuantity(' . $rowproduct['p_id'] . ')">-</button>';
                        echo '    <input type="text" id="productQuantity_' . $rowproduct['p_id'] . '" class="w-25 border-0 text-center mx-1 input" value=0>';
                        echo '    <button class="btn btn-light" onclick="incrementQuantity(' . $rowproduct['p_id'] . ')">+</button>';
                        echo '</div>';
                        ?>
                    </div>
                    <div class="mt-3 row justify-content-between g-2 align-items-center d-flex">
                        <!-- <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid"> -->
                        <?php echo'<div class=""><button type="button" class="btn btn-success w-25 ms-3 me-3">';
                              echo'  <i class="feather-icon icon-shopping-bag me-2"></i>';
                              echo ' Buy Now';
                            echo '</button>';
                            echo'<button type="button" onclick="addToFav(' . $rowproduct['p_id'] . ')" class="btn btn-danger w-30 ms-2">';
                              echo'  <i class="feather-icon icon-shopping-bag me-2"></i>';
                              echo '  <span id="fav">Add To Favorite</span>';
                            echo '</button></div>';
                            echo'<button type="button" onclick="addToCart(' . $rowproduct['p_id'] . ')" class="btn btn-warning w-50 px-5 ms-4">';
                            echo'  <i class="feather-icon icon-shopping-bag me-2"></i>';
                            echo '  Add To Cart';
                          echo '</button>';
                            ?>
                        </div>
                    <!-- </div> -->
                    <!-- <div class="col-md-4 col-4">
                        <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare">
                            <i class="bi bi-arrow-left-right"></i>
                        </a>
                        <a class="btn btn-light" href="shop-wishlist.html" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Wishlist">
                            <i class="feather-icon icon-heart"></i>
                        </a>
                    </div> -->
                </div>
                <hr class="my-6">
                <div>
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td>Product Code</td>
                            <td>FBB00255</td>
                        </tr>
                        <tr>
                            <td>Availability</td>
                            <td>In Stock</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td><?php echo '' . $categoryType . ''?></td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>
                                <small>01 days Shipping
                                    <span class="text-muted">( Free pickup today)</span>
                                </small>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="mt-8">
                    <div class="dropdown">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Share</a>
                        <ul class="dropdown-menu" style>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
                            <li><a class="dropdown-item" href="#">Twitter</a></li>
                            <li><a class="dropdown-item" href="#">Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-lg-14 mt-8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="product-details-tab" data-bs-toggle="tab" data-bs-target="#product-details-pane" role="tab" aria-controls="product-details-pane" aria-selected="true"> Product Details </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="information-tab" data-bs-toggle="tab" data-bs-target="#information-pane" role="tab" aria-controls="information-pane" aria-selected="false"> Information </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-pane" role="tab" aria-controls="reviews-pane" aria-selected="false"> Reviews </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seller-info-tab" data-bs-toggle="tab" data-bs-target="#seller-info-pane" role="tab" aria-controls="seller-info-pane" aria-selected="false"> Seller Info </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="product-details-pane" role="tabpanel" aria-labelledby="product-details-tab">
                        <div class="my-8">
                            <div class="mb-5">
                                <?php
                                if($resultdetails->num_rows > 0){
                                    if($rowdetails=$resultdetails->fetch_assoc()){
                                        echo '<h4 class="mb-1">Features</h4>';
                                        echo '<p class="mb-0">' . $rowdetails['features'] .'</p>';
                                        echo '</div>';
                                        echo '<div class="mb-5">';
                                        echo '<h5 class="mb-1">Storage Tips</h5>';
                                        echo '<p class="mb-0">' . $rowdetails['storage_tips'] .'</p>';
                                        echo '</div>';
                                        echo '<div class="mb-5">';
                                        echo '<h5 class="mb-1">Units</h5>';
                                        echo '<p class="mb-0">' . $rowdetails['unit'] .'</p>';
                                        echo '</div>';
                                        echo '<div class="mb-5">';
                                        echo '<h5 class="mb-1">Seller</h5>';
                                        echo '<p class="mb-0">' . $rowdetails['seller'] .'</p>';
                                        echo '</div>';
                                        echo '<div class="mb-5">';
                                        echo '<h5 class="mb-1">Disclaimer</h5>';
                                        echo '<p class="mb-0">' . $rowdetails['disclaimer'] .'</p>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="information-pane" role="tabpanel" aria-labelledby="information-tab">
                        <div class="my-8">
                            <div class="mb-5">
                                <h4 class="mb-1">Information</h4>
                                <p class="mb-0">Detailed product information goes here.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews-pane" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="my-8">
                            <div class="mb-5">
                                <h4 class="mb-1">Reviews</h4>
                                <p class="mb-0">Customer reviews and ratings go here.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="seller-info-pane" role="tabpanel" aria-labelledby="seller-info-tab">
                        <div class="my-8">
                            <div class="mb-5">
                                <h4 class="mb-1">Seller Info</h4>
                                <p class="mb-0">Information about the seller goes here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
<?php
include 'footer.php';
?>
<script>
    var q =document.getElementsByClassName('input').value;
    if(!isNaN(q))
    document.getElementByClassName('input').value=0;
    console.log(q);
function incrementQuantity(productId) {
    var q =document.getElementById('productQuantity_' + productId).value;
    console.log(q);
    if(q==''||q===undefined){
        document.getElementById('productQuantity_' + productId).value=0;}
        var quantityInput = document.getElementById('productQuantity_' + productId);
        var quantity = parseInt(quantityInput.value);
        quantity++;
        quantityInput.value = quantity;
    }

    function decrementQuantity(productId) {
        var quantityInput = document.getElementById('productQuantity_' + productId);
        var quantity = parseInt(quantityInput.value);
        if (quantity > 0) {
            quantity--;
            quantityInput.value = quantity;
        }
    }

    function addToCart(productId) {
        var isLoggedIn = <?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>;
        var productID = <?php echo $rowproduct['p_id']; ?>;
        var quantity = document.getElementById('productQuantity_' + productID).value;
        console.log(quantity);

        if (!isLoggedIn) {
            alert("Please log in");
        } else {
            $.ajax({
                url:"addtoCart.php",
                type:"POST",
                data:{proId:productId, quantity:quantity},
                success: function(res){
                if(res==1){
                    // alert("Product added to cart successfully");
                    window.location.reload();
                    return;
                }else{
                    alert("error");
                    return;
                }
                }
            })
        }
}
function addToFav(productId) {
    document.getElementById('fav').innerText="Add to favorite";
    var isLoggedIn = <?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>;
    if (!isLoggedIn) {
        alert("Please log in");
    } else {
        $.ajax({
            url: "addtoFav.php",
            type: "POST",
            data: { proId: productId },
            success: function(res) {
                if (res == 1) {
                    alert("Product removed from favorite successfully");
                    document.getElementById('fav').innerText="Add to favorite";
                    // window.location.reload();÷
                } else if (res == 3) {
                    alert("Product added to favorite successfully");
                    document.getElementById('fav').innerText="Remove";
                    window.location.reload();
                } else {
                    alert("Error occurred");
                }
            },
            error: function() {
                alert("Error occurred");
            }
        });
    }
}


</script>
