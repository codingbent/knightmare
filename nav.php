<?php
session_start();
include 'connection.php';
// $email=$_SESSION['email'];
// $sql="SELECT user_id FROM customer where email =$_SESSION['email']";
// $result5=mysqli_query($con,$sql);
// echo $result5;
// die();

if(empty(@$_SESSION['email']))
{
  $totalRows=0;
  $totalFav=0;
}
else if(isset($_SESSION['user_id'])){
  $user=$_SESSION['user_id'];
  $sqlCountRows = "SELECT SUM(quantity) AS total_rows FROM cart where user_id=$user";
  $resultCountRows = $con->query($sqlCountRows);
  if ($resultCountRows) {
    $rowTotalRows = $resultCountRows->fetch_assoc();
      $totalRows = $rowTotalRows['total_rows'];
  } else {
    $totalRows = 0;
  }
  $sqlFav="SELECT COUNT(*) AS total_fav FROM favorite where user_id=$user";
  $resultFav = $con->query($sqlFav);
  if ($resultFav) {
    $rowTotalFav = $resultFav->fetch_assoc();
    $totalFav = $rowTotalFav['total_fav'];
  } else {
    $totalFav = 0;
  }
}
$sqlcat="SELECT * FROM product";
$resultcat=$con->query($sqlcat);
$rowcat=$resultcat->fetch_assoc();

$sqlcategory="SELECT * FROM category";
$resultcategory=$con->query($sqlcategory);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="om-javascript-range-slider.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
<div class="container">                           
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
                  <a class="navbar-brand fs-3 fw-bold" href="index.php"><img src="images/logo.jpg" style="width:30px;transform:scale(3.0);" alt=""></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex align-items-center mx-auto"  onsubmit="return false;">
                    <input class="form-control text" id="search_text" type="search" placeholder="Search" aria-label="Search" list="product">
                        <?php
                          // if ($resultcat->num_rows > 0) {
                          //     while ($rowcat = $resultcat->fetch_assoc()) {
                          //         echo '<option value="' . $rowcat['title'] . '" data-id="' . $rowcat['p_id'] . '"></option>';
                          //     }
                          // }
            ?> 
          <button class="btn btn-outline-success" onclick="search()">Search</button>
        </form>
                    <div class="icons">
                          <?php
                          if (empty(@$_SESSION['email'])) {
                              echo '<a href="newlogin.php">Login</a>/<a href="newsignup.php">Registration</a>';
                          } else {
                            echo '<a type="button" class="btn position-relative" href="favorite.php">
                            <i class="fa fa-heart"style="font-size:36px;"></i>
                            <span class="position-absolute translate-middle badge rounded-pill bg-success" style="top: 10px;left: 50px;">
                                ' . $totalFav .'
                                <span class="visually-hidden">New Alerts</span>
                              </span>
                          </a>';
                          echo '
                          <div class="btn-group">
                              <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">'
                              . @$_SESSION['name'] .
                              '</button>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" onclick="dashboard(' . @$_SESSION['user_id'] . ')">My Profile</a></li>';
                                  
                      if (@$_SESSION['is_admin'] == 1) {
                          echo '<li><a class="dropdown-item" href="admin_dashboard.php">Admin Dashboard</a></li>';
                      }
                      if (@$_SESSION['is_admin'] == 0) {
                        echo '<li><a class="dropdown-item" href="user_dashboard.php">Dashboard</a></li>';
                    }
                      
                      echo '<li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                              </ul>
                          </div>';
                      
                            echo'<a type="button" class="btn position-relative" href="cart.php">'; 
                              echo '<i class="fa fa-shopping-cart"style="font-size:36px;"></i>';
                              echo '<span class="position-absolute translate-middle badge rounded-pill bg-success" style="top: 10px;left: 50px;">';
                              if($totalRows == 0) {
                              echo '0'; }
                              else { echo $totalRows;}
                              echo '<span class="visually-hidden">New Alerts</span>';
                              echo '</span>';
                            echo '</a>';
                          }
                          ?>
                          
                    </div>
                </div>
                </div>
              </nav> 
        </div>
        <div class="nav navbottom-nav px-5 d-flex bg-primary">
            <!-- <button class="btn btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                All Departments
              </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul> -->
            <a class="btn btn-lg text-light" type="button" href="index.php">Home</a>
            <button class="btn btn-lg dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">Category</button>
            <ul class="dropdown-menu bg-primary">
              <?php
               if($resultcategory->num_rows>0){
                while($rowcategory=$resultcategory->fetch_assoc()){
              echo'<li><a class="dropdown-item text-light" onclick="viewAll(' . $rowcategory['category_id'] .')">' . $rowcategory['category_name'] . '</a></li>';
                }
              }
              ?>
            </ul>
            <!--
            <button class="btn btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item text-light" href="#">Action</a></li>
              <li><a class="dropdown-item text-light" href="#">Another action</a></li>
              <li><a class="dropdown-item text-light" href="#">Something else here</a></li>
            </ul>
            <button class="btn btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dashboard</button>
            <ul class="dropdown-menu bg-primary">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul> -->
            <!-- <button class="btn btn-lg" type="button">Docs</button> -->
            <?php if(@$_SESSION['is_admin']==="1" || @$_SESSION['is_admin']==="2"){?>
            <button class="btn btn-lg dropdown-toggle text-light" id="product" type="button" data-bs-toggle="dropdown" aria-expanded="false">Products</button>
            <ul class="dropdown-menu bg-primary" id="product">
              <li><a class="dropdown-item text-light" href="addProduct.php">Add Product</a></li>
              <li><a class="dropdown-item text-light" href="productList.php">Product list</a></li>
              <li><a class="dropdown-item text-light" href="category.php">Categories</a></li>
            </ul>
            
            <?php }?>
            <?php if(@$_SESSION['is_admin']==="2"){?>
              <button class="btn btn-lg dropdown-toggle text-light" id="product" type="button" data-bs-toggle="dropdown" aria-expanded="false">Role</button>
              <ul class="dropdown-menu bg-primary" id="product">
                <li><a class="dropdown-item text-light" href="user.php">All User</a></li>
              </ul>
             
            <?php }?>
        </div>
    
    </div>
<script>
function search() {
    var text = document.getElementById("search_text").value;
    console.log(text);

    sessionStorage.setItem("search_text", text);
    window.location.href = "category.php";
}
function viewAll(c_id) {
        $.ajax({
    url: "set_session.php",
    type: "POST",
    data: {c_id: c_id},
    success: function(response){
      // After the session is set, redirect to the category page
      window.location.href = "category.php";
    },
    error: function(xhr, status, error){
      // Handle error
      console.error(error);
    }
  });
  console.log(c_id);
}
function dashboard(c_id){
  $.ajax({
    url:"profile.php",
    type:"POST",
    data:{c_id: c_id},
    success:function(){
      window.location.href="profile.php"
    }
  });
  console.log(c_id);
}

</script>