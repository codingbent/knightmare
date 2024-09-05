<?php 
include 'nav.php';
$sqlcategory="SELECT * FROM CATEGORY";
$resultcategory=$con->query($sqlcategory);

?>
  <section class=" two">
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/cover1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/cover2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/cover3.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
   </section>
   <section class="three container my-5">
    <h4>Shop By Category</h4>
    <div class="d-flex">
    <?php
    if($resultcategory->num_rows>0){
      while($rowcategory=$resultcategory->fetch_assoc()){
        echo '<div>';
        echo '<div class="border border-dark rounded-circle m-4 p-3"> <image onclick="category(' . $rowcategory['category_id'] . ')"src="' . $rowcategory['image'] . '" style="width:80px;height:80px;"></div>';
        echo '<p class="fs-5 text text-center">' . $rowcategory['category_name'] .'</p>';
        echo '</div>';
      }
    }
    ?>
    </div>
   </section>
  <?php
  include 'product.php';
  include 'footer.php'
  ?>
  <script>
   function category(c_id){
  $.ajax({
    url: "set_session.php",
    type: "POST",
    data: {c_id: c_id},
    success: function(response){
      window.location.href = "category.php";
    },
    error: function(xhr, status, error){
      console.error(error);
    }
  });
  console.log(c_id);
}
//abhedddddd
    </script>