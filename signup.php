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
        echo "<script>alert('Password should not exceed 20 characters. Please try again.');window.location.href = 'newsignup.php';</script>";
        exit;
    }

    // Validate password complexity if needed

    if ($pass !== $confirm_pass) {
        echo "<script>alert('Passwords do not match. Please try again.');window.location.href = 'newsignup.php';</script>";
        exit; 
    }

    // Hash the password
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO customer (firstname, lastname, email, pass) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fname, $lname, $email, $hashed_pass);

    // Execute and check
    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        error_log("Error: " . $stmt->error);
        echo "<script>alert('An error occurred. Please try again later.');window.location.href = 'newsignup.php';</script>";
    }

    $stmt->close();
}

mysqli_close($con);
?>
