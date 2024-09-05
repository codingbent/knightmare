<?php 
include 'connection.php';
include 'nav.php';

if (isset($_SESSION['e_id'])) {
    $product_id = $_SESSION['e_id'];
    $sql = "SELECT * FROM PRODUCT WHERE p_id = ?";
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

    $sql1 = "SELECT * FROM CATEGORY";
    $result1 = mysqli_query($con, $sql1);

    $sql2 = "SELECT * FROM Brand";
    $result2 = mysqli_query($con, $sql2);

    $stmt->close();
} else {
    echo "No product ID specified.";
    exit;
}

// Handle form submission
if (isset($_POST['submit'])) {
    $titlenew = $_POST['title'];
    $labelnew = $_POST['label'];
    $cost = $_POST['cost'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    
    // Check if image1 is uploaded
    if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
        $img1 = $_FILES['image1']['tmp_name'];
        $img1_name = $_FILES['image1']['name'];
        $target_file1 = "images/" . basename($img1_name);
        move_uploaded_file($img1, $target_file1);
    } else {
        $target_file1 = $row['image']; 
    }

    // Check if image2 is uploaded
    if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
        $img2 = $_FILES['image2']['tmp_name'];
        $img2_name = $_FILES['image2']['name'];
        $target_file2 = "images/" . basename($img2_name);
        move_uploaded_file($img2, $target_file2);
    } else {
        $target_file2 = $row['image2']; 
    }

    if (isset($_FILES['image3']) && $_FILES['image3']['error'] === UPLOAD_ERR_OK) {
        $img3 = $_FILES['image3']['tmp_name'];
        $img3_name = $_FILES['image3']['name'];
        $target_file3 = "images/" . basename($img3_name);
        move_uploaded_file($img3, $target_file3);
    } else {
        $target_file3 = $row['image3']; 
    }
   
    $updatesql = "UPDATE PRODUCT SET 
                    TITLE = ?,
                    LABEL = ?,
                    price = ?,
                    c_id = ?,
                    brand_id = ?,
                    image = ?,
                    image2 = ?,
                    image3 = ?
                    WHERE P_ID = ?";
    
    $stmt = $con->prepare($updatesql);
    $stmt->bind_param("ssdissssi", $titlenew, $labelnew, $cost, $category, $brand, $target_file1, $target_file2, $target_file3, $product_id);

    if ($stmt->execute()) {
        echo '<script>alert("Product Updated");</script>';
    } else {
        echo '<script>alert("Error updating product: ' . $stmt->error . '")</script>';
    }

    $stmt->close();
}

?>

<div class="edit_product">
    <p class="fs-4 text">Edit Product</p>
    <form class="product_form" method="post" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Product title <sup>*</sup></label>
            <input type="text" required name="title" class="form-control" id="formGroupExampleInput" placeholder="Enter product title" value="<?php echo $row['title']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Label <sup>*</sup></label>
            <textarea class="form-control" required name="label" id="exampleFormControlTextarea1" rows="3"><?php echo $row['label']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image 1 <sup>*</sup></label>
            <input class="form-control imageinput" name="image1" type="file" id="formFile">
            <img src="<?php echo $row['image']; ?>" alt="" class="image1" style="width:15rem;">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image 2</label>
            <input class="form-control imageinput" name="image2" type="file" id="formFile">
            <img src="<?php echo $row['image2']; ?>" alt="" class="image2" style="max-width: 150px; height: 150px;">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image 3</label>
            <input class="form-control imageinput" name="image3" type="file" id="formFile">
            <img src="<?php echo $row['image3']; ?>" alt="" class="image3" style="max-width: 150px; height: 150px;">
        </div>
        <div class="mb-3">
            <label for="inlineFormSelectPref" class="form-label">Category <sup>*</sup></label>
            <select required name="category" class="form-select" id="inlineFormSelectPref">
                <option>Choose...</option>
                <?php 
                if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        echo '<option value="' . $row1['category_id'] . '"';
                        if ($row['c_id'] == $row1['category_id']) {
                            echo ' selected';
                        }
                        echo '>' . $row1['category_name'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="inlineFormSelectPref" class="form-label">Brand <sup>*</sup></label>
            <select required name="brand" class="form-select" id="inlineFormSelectPref">
                <option>Choose...</option>
                <?php 
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        echo '<option value="' . $row2['brand_id'] . '"';
                        if ($row['brand_id'] == $row2['brand_id']) {
                            echo ' selected';
                        }
                        echo '>' . $row2['brand_name'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Cost <sup>*</sup></label>
            <input type="number" required name="cost" class="form-control" id="formGroupExampleInput" placeholder="Enter the amount" value="<?php echo $row['price']; ?>">
        </div>
        <p>* required field</p>
        <button type="submit" class="btn btn-primary" name="submit">Edit Product</button>
    </form>
</div>

<?php
include 'footer.php';
?>
