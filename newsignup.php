<?php
session_start();
include 'connection.php';
?>


<html>
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
  <style>
   body {
            background-color: #e9eef5;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            overflow: hidden;
        }
        .left-panel, .right-panel {
            padding: 40px;
            flex: 1;
        }
        .left-panel {
            background-color: #fff;
        }
        .right-panel {
            background-color: #0052cc;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .right-panel img {
            max-width: 100%;
        }
        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .logo h1 {
            font-size: 24px;
            color: #0052cc;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 5px;
            height: 45px;
        }
        .btn-primary {
            background-color: #0052cc;
            border: none;
            border-radius: 5px;
            height: 45px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #0041a8;
        }
        .social-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .social-buttons .btn {
            flex: 1;
            margin: 0 5px;
            border-radius: 5px;
            height: 45px;
            font-size: 16px;
        }
        .social-buttons .btn:first-child {
            margin-left: 0;
        }
        .social-buttons .btn:last-child {
            margin-right: 0;
        }
        .form-check-label {
            margin-left: 10px;
        }
        .forgot-password {
            text-align: right;
        }
        .forgot-password a {
            color: #0052cc;
        }
        .create-account {
            text-align: center;
            margin-top: 20px;
        }
        .create-account a {
            color: #0052cc;
        }
  </style>
 </head>
 <body>
  <div class="container">
   <div class="left-panel">
    <div class="logo">
    </div>
    <h2>
     Create your Account
    </h2>
    <p>
     Welcome! Select method to sign up:
    </p>
    <div class="social-buttons">
     <button class="btn btn-light">
      <i class="fab fa-google">
      </i>
      Google
     </button>
    </div>
    <p class="text-center">
     or sign up with email
    </p>
    <form action="signup.php" method="post">
     <div class="form-group">
      <input class="form-control" placeholder="Name" type="text"/>
     </div>
     <div class="form-group">
      <input class="form-control" placeholder="Email" type="email"/>
     </div>
     <div class="form-group">
      <input class="form-control" placeholder="Password" type="password"/>
     </div>
     <div class="form-group">
      <input class="form-control" placeholder="Confirm Password" type="password"/>
     </div>
     <button class="btn btn-primary w-100 mt-3" type="submit">
      Sign up
     </button>
    </form>
    <div class="create-account">
     <p>
      Already have an account?
      <a href="newlogin.php">
       Log in
      </a>
     </p>
    </div>
   </div>
   <div class="right-panel">
    <img alt="Illustration of connecting with various applications" src ="./images/logo.jpg">
    <h4>
     Connect Your Store with Google.
    </h4>
    <p>
     Know your own dashboard.
    </p>
   </div>
  </div>
 </body>
</html>