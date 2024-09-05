<?php
include 'connection.php';
include 'nav.php';
?>
<?php
$a=1;
$sql="SELECT * FROM favorite where user_id=$user";
$result1=$con->query($sql);
echo ' <p class="fs-4 text p-2 bg-body-secondary">
        Shopping Cart</p>';
echo '<table class="table">';
echo '<tr>';
echo '<th scope="col" style="width:5%">S.no</th>';
ECHO '<th scope="col" style="width:20%">Image</th>';
echo '<th scope="col" style="width:20%">Item</th>';
echo '<th scope="col" style="width:5%">Action</th>';
echo '</tr>';

if($result1->num_rows > 0){
  while($row1 = $result1->fetch_assoc()){
    $product_id = $row1["product_id"];
    $query = "SELECT p.p_id,p.title, p.price, p.image
              FROM product p
              JOIN favorite f ON p.p_id = $product_id;";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
    echo '<tr onclick="show(' . $row['p_id'] . ')">';
    echo '<td scope="row" style="width:5%">'. $a++ .'</td>';
    echo '<td><img src="'. $row["image"] . '"style="width:30%;"></td>';
    echo '<td><h3>' . $row["title"] . '</h3><h5>₹' . $row["price"] . '</h5></td>';
    echo '<td><button class="btn btn-success" onclick="removeFav(' . $row1['product_id'] . ')">Remove</button></td>';
    echo '</tr>';
  }
}

echo '</table>';
?>
<script>
function removeFav(p_id){ 
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'removeFav.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        // alert(' Product removed from Favorite successfully!');
                        location.reload();
                    } else {
                        // alert('Error adding product to cart.');
                    }
                };
                xhr.send('p_id=' + p_id);
}

function show(p_id) {
    $.ajax({
    url: "set_session.php",
    type: "POST",
    data: {p_id: p_id},
    success: function(response){
      window.location.href = "description.php";
    },
    error: function(xhr, status, error){
      console.error(error);
    }
  });
  console.log(c_id);
}
</script>
<?php 
include 'footer.php';
?>
