<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title id="print_name1"></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&amp;display=swap">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>vendor/modal-video/css/modal-video.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>vendor/leaflet/leaflet.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>vendor/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>vendor/owl.carousel2/assets/owl.theme.default.min.css">    
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/custom.css">
    <link rel="shortcut icon" href="<?php echo base_url('assets/');?>img/favicon.png">
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <div class="top-bar bg-dark text-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 bg-primary py-2 text-center text-lg-left">
              <p class="mb-0 text-small"><i class="fas fa-clock mr-2"></i><span id="print_address1"><?php echo $address; ?></span></p>
            </div>
            <div class="col-lg-8 text-right py-2 text-center text-lg-right">
              <ul class="list-inline mb-0">
                <li class="list-inline-item"><a class="font-weight-normal text-small reset-anchor" href="javascript:void(0);"><i class="fas fa-mobile mr-2"></i><span id="print_number1"><?php echo $mobno; ?></span></a></li>
                <li class="list-inline-item">|</li>
                <li class="list-inline-item"><a class="font-weight-normal text-small reset-anchor" href="javascript:void(0);"><i class="fas fa-envelope mr-2"></i><span id="print_email1"><?php echo $email; ?></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light py-3 bg-white shadow-sm">
        <div class="container"><a class="navbar-brand" href="<?php echo base_url();?>" id="print_name2"><?php echo $name; ?></a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item mx-2 active"><a class="nav-link text-uppercase" href="<?php echo base_url();?>">Home </a></li>
              <li class="nav-item mx-2"><a class="nav-link text-uppercase" href="<?php echo base_url('home/biography'); ?>">Biography</a></li>
              <li class="nav-item mx-2"><a class="nav-link text-uppercase" href="<?php echo base_url('home/speeches'); ?>">Speeches</a></li>
              <li class="nav-item mx-2"><a class="nav-link text-uppercase" href="<?php echo base_url('home/media_coverage');?>">Media Coverage</a></li>
              <li class="nav-item ml-2 dropdown"><a class="nav-link text-uppercase dropdown-toggle pr-0" id="navbarDropdownMenuLink" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gallery</a>
                <div class="dropdown-menu mt-lg-4" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item font-weight-bold text-small" href="<?php echo base_url('home/photos');?>">Photos</a>
                  <a class="dropdown-item font-weight-bold text-small" href="<?php echo base_url('home/videos');?>">Videos</a>
              </li>
              <li class="nav-item ml-2 dropdown"><a class="nav-link text-uppercase dropdown-toggle pr-0" id="navbarDropdownMenuLink" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Links</a>
                <div class="dropdown-menu mt-lg-4" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item font-weight-bold text-small" href="<?php echo base_url('home/register');?>">Register</a>
                  <a class="dropdown-item font-weight-bold text-small" href="<?php echo base_url('home/blog');?>">Blog</a>
              </li>
              <li class="nav-item ml-lg-3 pl-lg-3"><a class="btn btn-outline-primary btn-sm" href="<?php echo base_url('home/contact');?>">Contact</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>