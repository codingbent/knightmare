<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM customer WHERE email = '$email' AND pass = '$password'";
    $result = mysqli_query($con, $sql);
    $row_result = mysqli_fetch_assoc($result);
   
    
    if (!empty($row_result)) {
        $_SESSION['user_id']=$row_result['user_id'];
        $_SESSION['email'] = $row_result['email'];
        $_SESSION['name'] = $row_result['firstname'];
        $_SESSION['lname'] = $row_result['lastname'];
        $_SESSION['password'] = $row_result['pass'];
        $_SESSION['is_admin'] = $row_result['role'];
        header("Location: index.php"); 
        exit();
    } else {
        echo "<script>alert('Invalid email or password')</script>";
    }
}
mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="index.js"></script>
</head>
<body>
    <form class="p-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" >Email address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" required aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
        </div>
        <button type="submit" class="btn btn-success my-2">Log In</button>
        <br>
        <p>New user?<a type="button" class="justify-content-end" href="registration.php">Sign Up</a></p>
      </form>
</body>
<style>
    form{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
</style>
</html>
