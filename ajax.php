<?php
include 'connection.php';
    if(isset($_POST)){
        $role_id = $_POST['val_role'];
        $userId = $_POST['user_id'];
        
        $sql="UPDATE CUSTOMER SET role=? where user_id=?";

        $stmt = mysqli_prepare($con, $sql);

        mysqli_stmt_bind_param($stmt, 'ii', $role_id, $userId);

        if (mysqli_stmt_execute($stmt)) {
            echo "1";
        } else {
            echo "2";
        }
    }
?>