<?php
session_start(); // Start the session

$c_id = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['c_id'])) {
        $c_id = $_POST['c_id'];
        $_SESSION['c_id'] = $c_id;
    }
} else {
    if (isset($_SESSION['c_id'])) {
        $c_id = $_SESSION['c_id'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['p_id'])) {
        $_SESSION['p_id'] = $_POST['p_id']; // Set p_id in session
        echo "Session set";
    } }


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['e_id'])) {
        $_SESSION['e_id'] = $_POST['e_id']; 
        echo "Session set";
    } }

?>
