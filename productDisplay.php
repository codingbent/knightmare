<?php 

include 'connection.php';
include 'nav.php';
if (isset($_GET['display_id'])){
    $product_id = $_GET['display_id'];
    $sql = "SELECT * FROM product WHERE  p_id= ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No product found with the given ID.";
        exit;
}
}

?>
<?php 
    
    echo '<div class="card d-flex" style="width: 18rem;">';
    echo '<img src="' . $row['image'] . '" class="card-img-top" alt="...">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $row['title'] . '</h5>';
    echo '<p class="card-text">' . $row['label'] . '</p>';
    echo '<a href="#" class="btn btn-primary">Go somewhere</a>';
    echo '</div>';
    echo '</div>';
?>


<?php
include 'footer.php';
?>