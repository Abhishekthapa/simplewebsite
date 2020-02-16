<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="destination.php">Destination detail</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="About_us.php">About us</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="login.php">login</a>
      </li>
    </ul>
  </div>
</nav>

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/abc.jpg" alt="ABC" width="1100" height="500">
      <div class="carousel-caption">
        <h3>AnnapurnaBaseCamp</h3>
         <p>We had such a great time in ABC</p> 
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/abc1.jpg" alt="abc" width="1100" height="500">
      <div class="carousel-caption">
        <h3>ABC</h3>
      </div>   
    </div>
     <div class="carousel-item">
      <img src="images/abc3.jpg" alt="abc" width="1100" height="500">
      <div class="carousel-caption">
        <h3>ABC</h3>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/poonhill.jpg" alt="Poonhill" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Poonhill</h3>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>