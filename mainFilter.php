<?php

include 'connection.php';
$c_id='';
if (isset($_POST['brands']) && isset($_POST['categories']) && isset($_POST['minPrice']) && isset($_POST['maxPrice'])) {
$selectedBrands = $_POST['brands'];
$selectedCategories = $_POST['categories'];
$minPrice = $_POST['minPrice'];
$maxPrice = $_POST['maxPrice'];
}

// Construct SQL query to fetch filtered products
$sqlProducts = "SELECT p.p_id, p.title, p.label, p.price, p.image 
               FROM product p 
               JOIN category_brand cb ON p.p_id = cb.p_id";
$resultproduct=$con->query($sqlProducts);
// Conditions based on selected filters
$whereConditions = [];

if (!empty($selectedBrands)) {
    $brandFilter = implode(',', $selectedBrands);
    $whereConditions[] = "cb.brand_id IN ($brandFilter)";
}

if (!empty($selectedCategories)) {
    $categoryFilter = implode(',', $selectedCategories);
    $whereConditions[] = "cb.c_id IN ($categoryFilter)";
}
$sqlBrands = "SELECT DISTINCT b.brand_id, b.brand_name
              FROM category_brand cb
              JOIN product p ON cb.p_id = p.p_id
              JOIN brand b ON cb.brand_id = b.brand_id";

// if (isset($_POST['brands']) && !empty($_POST['brands'])) {
//     $brands = implode(',', $_POST['brands']); 
//     $sqlBrands .= " WHERE b.brand_id IN ($brands)";
// }

$resultBrands = $con->query($sqlBrands);

$sqlCategories = "SELECT DISTINCT c.category_id, c.category_name
                  FROM category_brand cb
                  JOIN category c ON cb.c_id = c.category_id";

if (isset($_POST['brands']) && !empty($_POST['brands'])) {
    $brands = implode(',', $_POST['brands']); 
    $sqlCategories .= " WHERE cb.brand_id IN ($brands)";
}

$resultCategories = $con->query($sqlCategories);
?>

<p class="fs-2 text ms-5">Filter</p>
<form id="filter-form">
    <div class="row">
        <aside class="col-sm-3 ms-5">
            <div class="card mb-2">
                <article class="card-group-item">
                    <header class="card-header">
                        <h6 class="title">Brands</h6>
                    </header>
                    <?php
                    if ($resultBrands->num_rows > 0) {
                        $c = 0;
                        while ($rowBrands = $resultBrands->fetch_assoc()) {
                            echo '<div class="filter-content ' . ($c >= 5 ? 'hidden' : '') . '">';
                            echo '<div class="card-body">';
                            echo '<label class="form-check">';
                            echo '<input class="form-check-input" type="checkbox" name="brand[]" value="' . $rowBrands['brand_id'] . '">' . $rowBrands['brand_name'];
                            echo '<span class="form-check-label"></span>';
                            echo '</label>';
                            echo '</div>';
                            echo '</div>';
                            $c++;
                        }
                        if ($c > 5) {
                            echo '<p><a href="" id="show-more-link" class="link-underline-primary ms-3">Show more</a></p>';
                        }
                    }
                    ?>
                </article>
            </div>
            <div class="card mb-2">
                <article class="card-group-item">
                    <header class="card-header"><h6 class="title">Category</h6></header>
                    <div class="filter-content">
                        <div class="list-group list-group-flush ms-4">
                            <div class="m-2">
                                <?php
                                if ($resultCategories->num_rows > 0) {
                                    while ($rowCategories = $resultCategories->fetch_assoc()) {
                                        echo '<input class="form-check-input me-2" type="checkbox" name="category[]" value="' . $rowCategories['category_id'] . '" id="' . $rowCategories['category_name'] . '"';
                                        if ($c_id == $rowCategories['category_id']) {
                                            echo ' checked';
                                        }
                                        echo '>';                                        
                                        echo '<label for="' . $rowCategories['category_name'] . '">' . $rowCategories['category_name'] . '</label><br>';                            
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="card">
                <article class="card-group-item">
                    <header class="card-header">
                        <h6 class="title">Price Range</h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="priceRange">Price Range</label>
                                    <div id="priceRange" class="slider"></div>
                                    <div class="mt-3">
                                        <label for="minValueDisplay">Min: </label>
                                        <span id="minValueDisplay">₹0</span>
                                        <input type="hidden" name="minPrice" id="minPrice" value="0">
                                        <label for="maxValueDisplay" class="ml-3">Max: </label>
                                        <span id="maxValueDisplay">₹<?php echo $maxPrice; ?></span>
                                        <input type="hidden" name="maxPrice" id="maxPrice" value="<?php echo $maxPrice; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <button type="reset" class="btn btn-success mt-2" onclick="resetForm()">Reset</button>
        </aside>
        <main class="col-sm-8">
            <div id="product-container">
                <?php 
                if ($resultproduct->num_rows > 0) {
                    while ($rowproduct = $resultproduct->fetch_assoc()) {
                        echo '<a onclick="description(' . $rowproduct['p_id'] . ');"><div class="card d-flex flex-row mb-3">';
                        echo '<div><img src="' . $rowproduct['image'] . '" class="card-img-top ms-2 mt-2" alt="..." style="width: 200px;"></div>';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title fs-4 text">' . $rowproduct['title'] . '</h5>';
                        echo '<p class="card-text fs-6 text">' . $rowproduct['label'] . '</p>';
                        echo '<p class="card-text fs-5 text"><b>₹' . $rowproduct['price'] . '</b></p>';
                        echo '</div>';
                        echo '</div></a>';
                    }
                }
                ?>
            </div>
        </main>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const showMoreLink = document.getElementById("show-more-link");
        const hiddenItems = document.querySelectorAll('.hidden');
        let currentIndex = 0;
        const batchSize = 5;

        function showNextBatch() {
            for (let i = currentIndex; i < currentIndex + batchSize && i < hiddenItems.length; i++) {
                hiddenItems[i].classList.remove('hidden');
            }
            currentIndex += batchSize;
            if (currentIndex >= hiddenItems.length) {
                showMoreLink.style.display = 'none';
            }
        }

        showMoreLink.addEventListener("click", function(event) {
            event.preventDefault();
            showNextBatch();
        });
    });

    function filterProducts() {
        var selectedBrands = [];
        $("input[name='brand[]']:checked").each(function() {
            selectedBrands.push(this.value);
        });

        var selectedCategories = [];
        $("input[name='category[]']:checked").each(function() {
            selectedCategories.push(this.value);
        });

        var minPrice = $("#priceRange").slider("values", 0);
        var maxPrice = $("#priceRange").slider("values", 1);

        $.ajax({
            url: 'filter.php',
            type: 'POST',
            data: {
                brands: selectedBrands,
                categories: selectedCategories,
                minPrice: minPrice,
                maxPrice: maxPrice
            },
            success: function(response) {
                $('#product-container').html(response);
            }
        });

    }

    $(document).ready(function() {
        $("input[name='brand[]']").change(function() {
            filterProducts();
        });

        $("input[name='category[]']").change(function() {
            filterProducts();
        });
    });
</script>
