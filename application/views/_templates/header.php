<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TeamStyle 16 Beta</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo URL;?>public/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>public/js/jquery.leanModal.min.js"></script>
     <!-- css -->
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>public/js/application.js"></script>
</head>
<body>
<?php
if (!isset($_SESSION['user_logged_in'])) {?>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo URL; ?>"><strong>TeamStyle 16</strong></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo URL; ?>">主页</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
            <li calss="active"><a href="<?php echo URL.'login/login'?>">登陆</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div> 
<?php } else { ?>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo URL; ?>"><strong>TeamStyle 16</strong></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo URL; ?>">主页</a></li>
            <li ><a><?php echo "hello!". $_SESSION['user_nickname'].'!';?></a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
            <li calss="active"><a href="<?php echo URL.'login/login'?>">论坛</a></li>
	    <li><a href="<?php echo URL.'login/login'?>">公告</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div> 
<?php } ?>


