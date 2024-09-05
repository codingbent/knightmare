<?php
include 'connection.php';
if (isset($_GET['p_id'])) {
    $product_id=$_GET['p_id'];
    echo "1";
   
    // Retrieve and sanitize POST data
    // $product_id = $_POST['p_id'];
    $title_new = $_GET['title'];
    $label_new = $_GET['label'];
    $category_id = $_GET['c_id'];
    $cost = $_GET['cost'];
    $image1 = $row['image'];
    $image2 = $row['image2'];
    $image3 = $row['image3'];

    $update_sql = "UPDATE PRODUCT SET 
                    title='$title_new',
                    label='$label_new',
                    image='$image1',
                    image2='$image2',
                    image3='$image3',
                    c_id='$category_id',
                    price='$cost'
                    WHERE p_id=$product_id";

    // Execute query
    if (mysqli_query($con, $update_sql)) {
        echo '<script>alert("Product Updated")</script>';
        header('Location: productEdit.php?id=' . $product_id); // Redirect after update
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Close connection
mysqli_close($con);
?>
