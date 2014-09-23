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
    <link href="<?php echo URL; ?>public/css/bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/docs.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/highlight.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/uikit.css" rel="stylesheet">
    <!-- our JavaScript -->

    <script src="<?php echo URL; ?>public/js/uikit.min.js"></script>
    <script src="<?php echo URL; ?>public/js/jquery.js"></script>
    <script src="<?php echo URL; ?>public/js/application.js"></script>
    <script src="<?php echo URL; ?>public/js/uikit.js"></script>
    <script src="<?php echo URL; ?>public/js/highlight.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap-checkbox.js"></script>

<?php if (isset($_SESSION['user_logged_in'])) {?>
<style>
body{
  padding-top:140px;
}
</style>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="padding-top:50px;background-color:#87CEFA">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <ul class="nav navbar-nav">
          <li><a href="<?php echo URL. 'dashboard';?>" style="color:#FFFFFF;font:bold"><?php echo $_SESSION['user_nickname'];?></a></li>
          <li><a href="<?php echo URL.'setting'?>"><span class="glyphicon glyphicon-cog"></span> </a></li>
        </ul>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">我的消息<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo URL. 'message/send_mail';?>">发送消息</a></li>
            <li><a href="<?php echo URL. 'message/all_message';?>">所有消息</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">战队<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo URL. 'team/create_team'; ?>">组建战队</a></li>
            <li><a href="<?php echo URL. 'team/team_display/1'; ?>">所有战队</a></li>
          </ul>
        </li>
      </ul>
      <form action="<?php echo URL; ?>team/team_search" method="post" class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input name="keyword" type="text" class="form-control" placeholder="输入战队名">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php } else {?>
<style>
body{
  padding-top: 70px;
}
</style>
<?php }?>
<header>

<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#101010">
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
        <li><a href="<?php echo URL; ?>">主页</a></li>
      </ul>
    <!--if not logged in,provide a button to log-->
    <?php
      if (!isset($_SESSION['user_logged_in'])) {?>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="<?php echo URL.'login'?>">登陆</a></li>
      </ul>
    <?php } else {?>
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
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo URL.'forum/index'?>">论坛</a></li>
        <li ><a href="<?php echo URL. 'message/all_message';?>" id="result">未读</a></li>
        <li><a href="<?php echo URL.'login/logout'?>">退出</a></li>  
      </ul>
    <?php }?>
          <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">文档下载<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
  </div> 
</header>

