<?php 
include 'connection.php';
include 'nav.php';

if (isset($_SESSION['e_id'])) {
    $product_id = $_SESSION['e_id'];
    
    // Fetch the product details
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
    
    // Fetch the categories
    $sql1 = "SELECT * FROM CATEGORY";
    $result1 = mysqli_query($con, $sql1);

    // Fetch subcategories for the selected category
    $selected_category_id = $row['c_id'];
    $sql3 = "SELECT * FROM sub_category WHERE c_id = ?";
    $stmt = $con->prepare($sql3);
    $stmt->bind_param("i", $selected_category_id);
    $stmt->execute();
    $result3 = $stmt->get_result();

    $subcategories = [];
    while ($sub_row = $result3->fetch_assoc()) {
        $subcategories[] = [
            'sub_c_id' => $sub_row['sub_c_id'], 
            'sub_category_name' => $sub_row['sub_category_name']
        ];
    }

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
    $sub_category = $_POST['sub-category'];  // Changed from brand to sub-category

    // Image upload handling
    $target_file1 = $row['image'];
    $target_file2 = $row['image2'];
    $target_file3 = $row['image3'];

    if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
        $img1 = $_FILES['image1']['tmp_name'];
        $img1_name = $_FILES['image1']['name'];
        $target_file1 = "images/" . basename($img1_name);
        move_uploaded_file($img1, $target_file1);
    }

    if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
        $img2 = $_FILES['image2']['tmp_name'];
        $img2_name = $_FILES['image2']['name'];
        $target_file2 = "images/" . basename($img2_name);
        move_uploaded_file($img2, $target_file2);
    }

    if (isset($_FILES['image3']) && $_FILES['image3']['error'] === UPLOAD_ERR_OK) {
        $img3 = $_FILES['image3']['tmp_name'];
        $img3_name = $_FILES['image3']['name'];
        $target_file3 = "images/" . basename($img3_name);
        move_uploaded_file($img3, $target_file3);
    }

    // Update query
    $updatesql = "UPDATE PRODUCT SET 
                    TITLE = ?, LABEL = ?, price = ?, c_id = ?, sub_c_id = ?, 
                    image = ?, image2 = ?, image3 = ? WHERE P_ID = ?";
    $stmt = $con->prepare($updatesql);
    $stmt->bind_param("ssdissssi", $titlenew, $labelnew, $cost, $category, $sub_category, 
                      $target_file1, $target_file2, $target_file3, $product_id);

    if ($stmt->execute()) {
        echo '<script>alert("Product Updated");</script>';
    } else {
        echo '<script>alert("Error updating product: ' . $stmt->error . '")</script>';
    }

    $stmt->close();
}
?>

<!-- HTML Form for Editing the Product -->
<div class="edit_product">
    <p class="fs-4 text">Edit Product</p>
    <form class="product_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Product title <sup>*</sup></label>
            <input type="text" required name="title" class="form-control" placeholder="Enter product title" value="<?php echo htmlspecialchars($row['title']); ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Label <sup>*</sup></label>
            <textarea class="form-control" required name="label" rows="3"><?php echo htmlspecialchars($row['label']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image 1 <sup>*</sup></label>
            <input class="form-control imageinput" name="image1" type="file" id="formFile">
            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="" class="image1" style="width:15rem;">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image 2</label>
            <input class="form-control imageinput" name="image2" type="file" id="formFile">
            <img src="<?php echo htmlspecialchars($row['image2']); ?>" alt="" class="image2" style="max-width: 150px; height: 150px;">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image 3</label>
            <input class="form-control imageinput" name="image3" type="file" id="formFile">
            <img src="<?php echo htmlspecialchars($row['image3']); ?>" alt="" class="image3" style="max-width: 150px; height: 150px;">
        </div>
        <div class="mb-3">
            <label for="categorySelect" class="form-label">Category <sup>*</sup></label>
            <select required name="category" class="form-select" id="categorySelect">
                <option>Choose...</option>
                <?php 
                if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        echo '<option value="' . htmlspecialchars($row1['category_id']) . '"';
                        if ($row['c_id'] == $row1['category_id']) {
                            echo ' selected';
                        }
                        echo '>' . htmlspecialchars($row1['category_name']) . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="subCategorySelect" class="form-label">Sub Category <sup>*</sup></label>
            <select required name="sub-category" class="form-select" id="subCategorySelect">
                <option>Choose...</option>
                <?php 
                foreach ($subcategories as $subcategory) {
                    echo '<option value="' . htmlspecialchars($subcategory['sub_c_id']) . '"';
                    if ($row['sub_c_id'] == $subcategory['sub_c_id']) {
                        echo ' selected';
                    }
                    echo '>' . htmlspecialchars($subcategory['sub_category_name']) . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Cost <sup>*</sup></label>
            <input type="number" required name="cost" class="form-control" placeholder="Enter the amount" value="<?php echo htmlspecialchars($row['price']); ?>">
        </div>
        <p>* required field</p>
        <button type="submit" class="btn btn-primary" name="submit">Edit Product</button>
    </form>
</div>

<!-- JavaScript for Dynamic Subcategory Fetch -->
<script>
    document.getElementById('categorySelect').addEventListener('change', function() {
        var categoryId = this.value;
        var subCategorySelect = document.getElementById('subCategorySelect');

        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?category_id=' + categoryId, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var subCategories = JSON.parse(xhr.responseText);
                subCategorySelect.innerHTML = '<option disabled selected value="">Choose...</option>';
                subCategories.forEach(function(subCategory) {
                    var option = document.createElement('option');
                    option.value = subCategory.sub_c_id;
                    option.textContent = subCategory.sub_category_name;
                    subCategorySelect.appendChild(option);
                });
            }
        };
        xhr.send();
    });
    // Trigger change event on initial load to populate subcategories
    document.getElementById('categorySelect').dispatchEvent(new Event('change'));
</script>

<?php
include 'footer.php';
?>
