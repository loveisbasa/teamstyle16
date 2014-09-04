<!DOCTYPE html>
<html lang="en">
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
<body>

<?php
if (!isset($_SESSION['user_logged_in'])) {?>
<div class="navbar navbar-default" role="navigation">
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
            <li calss="active"><a href="<?php echo URL.'login'?>">登陆</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
  </div> 
<?php } else { ?>
<div class="navbar  navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
<!--          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>-->
          <a class="navbar-brand" href="<?php echo URL; ?>"><strong>TeamStyle 16</strong></a>
        </div>
        <div class="navbar-collapse collapse">

		  <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo URL; ?>">主页</a></li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo URL; ?>"><?php echo $_SESSION['user_nickname'];?></a></li>
	        </ul>

	        <ul class="nav navbar-nav navbar-right">
           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
              <li><a href="<?php echo URL.'setting'?>"><span class="glyphicon glyphicon-cog"></span> </a></li>
            <li><a href="<?php echo URL.'forum/index'?>">论坛</a></li>
						<li ><a href="<?php echo URL. 'message/index';?>" id="result">未读</a></li>
            <li><a href="<?php echo URL.'login/logout'?>">退出</a></li>  
            </ul>

			<script>
			if(typeof(EventSource)!=="undefined"){
				var source=new EventSource("<?php echo URL. 'message/countmessage'; ?>");
				source.onmessage=function(event)
				{ if(event.data==0)
						document.getElementById("result").innerHTML="无未读消息";
				  else
						document.getElementById("result").innerHTML="<font color='#FF0000'>未读:"+event.data+"</font>";
				};
			}
			else
			{
		    document.getElementById("result").innerHTML="Not supported...";
			}
			</script>
<!--消息提醒-->

  

          <!-- <ul class="nav navbar-nav navbar-right">
            <button id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
              <span class="caret"></span>
            </button>
          </ul>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              <li><a href="<?php echo URL.'login/login'?>">论坛</a></li>
            </ul> -->
          
        </div><!--/.nav-collapse -->
      </div>
    </div> 
<?php } ?>


