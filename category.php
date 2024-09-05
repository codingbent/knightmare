<?php

include 'connection.php';
include 'nav.php';

$search_text = '';
$c_id = '';
$selectedCategories = [];
$minPrice = 0;
$maxPrice = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search_text'])) {
        $search_text = $_POST['search_text'];
    }

    if (isset($_POST['c_id'])) {
        $c_id = $_POST['c_id'];
    }

    if (isset($_POST['categories'])) {
        $selectedCategories = $_POST['categories'];
    }

    if (isset($_POST['minPrice'])) {
        $minPrice = $_POST['minPrice'];
    }

    if (isset($_POST['maxPrice'])) {
        $maxPrice = $_POST['maxPrice'];
    }
} else {
    if (isset($_SESSION['c_id'])) {
        $c_id = $_SESSION['c_id'];
        unset($_SESSION['c_id']); // Clear session variable after use
    }

    echo "<script>
        if (sessionStorage.getItem('search_text')) {
            var searchText = sessionStorage.getItem('search_text');
            sessionStorage.removeItem('search_text');
            document.write('<form id=\"hidden_form\" method=\"post\" action=\"category.php\"><input type=\"hidden\" name=\"search_text\" value=\"' + searchText + '\"></form>');
            document.getElementById('hidden_form').submit();
        }
    </script>";
}

$sqlcost = "SELECT MAX(price) as max_price FROM product";
$resultcost = $con->query($sqlcost);
$rowcost = $resultcost->fetch_assoc();
$maxPrice = $rowcost['max_price'];

$sqlproduct = "SELECT * FROM product WHERE 1=1";

if (!empty($search_text)) {
    $sqlproduct .= " AND (title LIKE ? OR label LIKE ?)";
    $like_search_text = '%' . $search_text . '%';
}

if (!empty($c_id)) {
    $sqlproduct .= " AND c_id=?";
}

if (!empty($selectedCategories)) {
    $sqlproduct .= " AND c_id IN (" . implode(',', array_fill(0, count($selectedCategories), '?')) . ")";
}

if ($minPrice >= 0 && $maxPrice > 0) {
    $sqlproduct .= " AND price BETWEEN ? AND ?";
}

$stmt = $con->prepare($sqlproduct);

$params = [];
$types = '';

if (!empty($search_text)) {
    $params[] = $like_search_text;
    $params[] = $like_search_text;
    $types .= 'ss';
}

if (!empty($c_id)) {
    $params[] = $c_id;
    $types .= 'i';
}

if (!empty($selectedCategories)) {
    $params = array_merge($params, $selectedCategories);
    $types .= str_repeat('i', count($selectedCategories));
}

if ($minPrice >= 0 && $maxPrice > 0) {
    $params[] = $minPrice;
    $params[] = $maxPrice;
    $types .= 'ii';
}

if ($types) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$resultproduct = $stmt->get_result();

$sqlcategory = "SELECT * FROM category";
$resultCategories = $con->query($sqlcategory);



?>

<script>
    var maxPrice = <?php echo $maxPrice; ?>;
</script>

<p class="fs-2 text ms-5">Filter</p>
<form id="filter-form">
    <div class="row">
        <aside class="col-sm-3 ms-5">
            <div class="card mb-2">
                <article class="card-group-item">
                    <header class="card-header"><h6 class="title">Category</h6></header>
                    <div class="filter-content">
                        <div class="list-group list-group-flush ms-4">
                            <div class="m-2">
                                <?php
                                if ($resultCategories->num_rows > 0) {
                                    while ($rowCategories = $resultCategories->fetch_assoc()) {
                                        echo '<input class="form-check-input me-2" type="checkbox" name="category[]" value="' . $rowCategories['category_id'] . '" id="' . $rowCategories['category_name'] . '">';
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
<?php
include 'footer.php';
?>
<script>
    function filterProducts() {
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
        $("input[name='category[]']").change(function() {
            filterProducts();
        });

        $("#priceRange").slider({
            range: true,
            min: 0,
            max: maxPrice,
            values: [0, maxPrice],
            slide: function(event, ui) {
                $("#minValueDisplay").text("₹" + ui.values[0]);
                $("#maxValueDisplay").text("₹" + ui.values[1]);
                $("#minPrice").val(ui.values[0]);
                $("#maxPrice").val(ui.values[1]);
            },
            stop: function() {
                filterProducts();
            }
        });

    });

    function resetForm() {
        document.getElementById("filter-form").reset();
        $("#priceRange").slider("values", [0, maxPrice]);
        filterProducts();
    }
</script>
