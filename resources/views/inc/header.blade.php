<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap -->

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>resources/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>resources/css/vertical.css">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>resources/img/logo.jpg">

    <!--ckeditor 4-->
    <script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script src="../ckeditor.js"></script>

    <title>Kid Code</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: white">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo URLROOT ?>">
            <img src="<?php echo URLROOT ?>resources/img/logo.jpg" width="80">
        </a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>page">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>page/lessons">LESSONS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>forum/index">FORUM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>FAQ/index">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>page/aboutus">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>page/teacher">TEACHER</a>
                </li>
            </ul>
            <!--log in-->
            <?php
            if(session()->get('loggedin') == false) {
              include APPROOT . "/resources/views/inc/loggedout.blade.php";
            } else {
              include APPROOT . "/resources/views/inc/loggedin.blade.php";
            }
             ?>
        </div>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
