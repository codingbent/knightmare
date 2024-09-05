<?php
include 'connection.php';
include 'nav.php';

if ($_SESSION['is_admin'] == "") { ?>
    <script type="text/javascript">
        window.location.href = 'http://localhost/ecommerce/login.php';
    </script>
<?php 
}

$sqlusers = "SELECT * FROM CUSTOMER";
$resultCountRows = $con->query($sqlusers);

if ($resultCountRows->num_rows > 0) { ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Email</th>
                <th scope="col">Post</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $row_number = 1;
            while ($row_result = mysqli_fetch_assoc($resultCountRows)) { ?>
                <tr>
                    <th scope="row"><?php echo $row_number++; ?></th>
                    <td><?php echo ($row_result['firstname']); ?></td>
                    <td><?php echo ($row_result['lastname']); ?></td>
                    <td><?php echo ($row_result['email']); ?></td>
                    <td>
                <select class="roleSelect_" data-attr="<?php echo $row_result['user_id']?>">
                    <option value="2" <?php if ($row_result['role'] == 2) echo 'selected'; ?>>Super Admin</option>
                    <option value="1" <?php if ($row_result['role'] == 1) echo 'selected'; ?>>Admin</option>
                    <option value="0" <?php if ($row_result['role'] == 0) echo 'selected'; ?>>User</option>
                </select>
            </td>
        </tr>
            <?php } ?>
        </tbody>
    </table>
<?php 
} else {
    echo "No results found.";
}

include 'footer.php';
?>

<script>
   $( document ).ready(function() {
    $(".roleSelect_").change(function(){
        var val_role = this.value;
        var id = $(this).attr('data-attr');
       
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {val_role : val_role,user_id:id},
            dataType: "json",
            success: function(data){
                if(data==1){
                    alert("update sucssesfull");
                    return;
                }else{
                    alert("Somthing went wrong please contact to admin");
                    return;
                }
            }
        });
        <?php
        $sql1="UPDATE `customer` SET `role` = 'var_role' WHERE `customer`.`user_id` = 2";
        $result2=$con->query($sql1);
        ?>
    });
    });
</script>
