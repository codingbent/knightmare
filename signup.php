<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirm_pass = $_POST['cpass'];

    // Validate password length
    if (strlen($pass) > 20) {
        echo "<script>alert('Password should not exceed 20 characters. Please try again.');window.location.href = 'registration.php';</script>";
        exit;
    }

    // Validate password complexity if needed

    if ($pass !== $confirm_pass) {
        echo "<script>alert('Passwords do not match. Please try again.');window.location.href = 'registration.php';</script>";
        exit; 
    }

    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = $con->prepare("INSERT INTO customer (firstname, lastname, email, pass) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fname, $lname, $email, $pass);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    } else {
        // echo "<script>alert('Error occurred. Please try again later.');window.location.href = 'registration.php';</script>";
        // You might also log the actual error for debugging purposes
        error_log("Error: " . $stmt->error);
    }

    $stmt->close();
}

mysqli_close($con);
?>
