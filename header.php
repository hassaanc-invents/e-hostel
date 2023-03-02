<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: http://localhost/webquiz/login.php");
} 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Stylesheet Link -->
    <link rel="stylesheet" href="style/style.css">

    <!-- Font Awesome Link -->
    <script src="https://kit.fontawesome.com/ffea063f11.js" crossorigin="anonymous"></script>

    <title>Login</title>
    <style>
        .li-gradient, #actionButton{
background: linear-gradient(to right, #2d4eac, #23eaf8);
}
    </style>
  </head>
  <body>