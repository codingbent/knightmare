<?php 
include 'connection.php';

$sql1 = "SELECT * FROM CATEGORY";
$result1 = mysqli_query($con, $sql1);

$sql2 = "SELECT * FROM Brand";
$result2 = mysqli_query($con, $sql2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = $_POST['product'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $cost = $_POST['cost'];
    $brand=$_POST['brand'];

    $img1 = $_FILES['img1'];
    $img1Name = $img1['name'];
    $img1TmpName = $img1['tmp_name'];
    $img1Error = $img1['error'];

    if ($img1Error === UPLOAD_ERR_OK) {
        $img1Destination = 'images/' . $img1Name;
        move_uploaded_file($img1TmpName, $img1Destination);
    } else {
        echo "Error uploading image 1.";
    }


    $img2 = $_FILES['img2'];
    $img2Name = $img2['name'];
    $img2TmpName = $img2['tmp_name'];
    $img2Error = $img2['error'];

    if ($img2Error === UPLOAD_ERR_OK) {
        $img2Destination = 'images/' . $img2Name;
        move_uploaded_file($img2TmpName, $img2Destination);
    }
    else{
        $img2name="";
    }

    $img3 = $_FILES['img3'];
    $img3Name = $img3['name'];
    $img3TmpName = $img3['tmp_name'];
    $img3Error = $img3['error'];

    if ($img3Error === UPLOAD_ERR_OK) {
        $img3Destination = 'images/' . $img3Name;
        move_uploaded_file($img3TmpName, $img3Destination);
    }
    else{
        $img3name="";
    }

    $stmt = $con->prepare("INSERT INTO product (title, label, image, image2, image3, price, c_id, brand_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssii", $product, $description, $img1Destination, $img2Destination, $img3Destination, $cost, $category, $brand);

    if ($stmt->execute()) {
        echo "<script>alert('New product inserted successfully');</script>";
    } else {
        echo "<script>alert('Error:');</script> " . $stmt->error;
    }

    $stmt->close();
}

$con->close();
?>

<?php include 'nav.php'; ?>
<div class="add_product">
    <p class="fs-4 text">Create product</p>
    <form class="product_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Product title<sup>*</sup></label>
            <input type="text" required name="product" class="form-control" id="formGroupExampleInput" placeholder="Enter product title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Label<sup>*</sup></label>
            <textarea class="form-control" required name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile1" class="form-label">Image 1<sup>*</sup></label>
            <input class="form-control" required name="img1" type="file" id="formFile1">
        </div>
        <div class="mb-3">
            <label for="formFile2" class="form-label">Image 2</label>
            <input class="form-control" name="img2" type="file" id="formFile2">
        </div>
        <div class="mb-3">
            <label for="formFile3" class="form-label">Image 3</label>
            <input class="form-control" name="img3" type="file" id="formFile3">
        </div>
        <div class="mb-3">
            <label class="form-label" for="inlineFormSelectPref">Category<sup>*</sup></label>
            <select name="category" class="form-select" id="inlineFormSelectPref" required>
                <option disabled selected value="">Choose...</option>
                <?php 
                if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        echo '<option value="' . $row1['category_id'] . '">' . $row1['category_name'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="inlineFormSelectPref">Brand<sup>*</sup></label>
            <select name="brand"   class="form-select" id="inlineFormSelectPref" required>
                <option disabled selected valu="">Choose...</option>
                <?php 
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        echo '<option  value="' . $row2['brand_id'] . '">' . $row2['brand_name'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Cost<sup>*</sup></label>
            <input type="number" required name="cost" class="form-control" id="formGroupExampleInput" placeholder="Enter the amount">
        </div>
        <p>* required field</p>
        <button type="submit" class="btn btn-success">Add Product</button>
    </form>
</div>

<?php include 'footer.php'; ?>
