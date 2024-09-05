<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['firstname'])) {
    // Redirect to the login page if user is not logged in
    header("Location: login.php");
    exit();
}

// Fetch user details from session variables
$userId = $_SESSION['user_id'];
$username = $_SESSION['firstname'];

// Display user details
echo "<h1>Welcome, $username!</h1>";
echo "<p>Your User ID: $userId</p>";

// You can fetch and display other user details from the database if needed

// Add logout option
echo '<a href="logout.php">Logout</a>';
?>
