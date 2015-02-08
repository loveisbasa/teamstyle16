<!DOCTYPE html>
<html lang="en">
<style>
p{font-family: sans-serif,Georgia, "Times New Roman", 
             "Microsoft YaHei", "微软雅黑", 
             STXihei, "华文细黑", 
             serif;}
h1,h2,h3,h4,h5,h6{font-family: Georgia, "Times New Roman", 
             "Microsoft YaHei", "微软雅黑", 
             STXihei, "华文细黑", 
             serif;}
a{font-family: Georgia, "Times New Roman", 
             "Microsoft YaHei", "微软雅黑", 
             STXihei, "华文细黑", 
             serif;}
li{font-family: Georgia, "Times New Roman", 
             "Microsoft YaHei", "微软雅黑", 
             STXihei, "华文细黑", 
             serif;}
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="shortcut icon" href="/logo.png" type="image/x-icon">
    <title>TeamStyle 16 Beta</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo URL;?>public/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>public/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/uikit.min.js"></script>
     <!-- css -->
    <link href="<?php echo URL; ?>public/css/bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/docs.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/highlight.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/uikit.css" rel="stylesheet">
    <!-- our JavaScript -->

    
    <script src="<?php echo URL; ?>public/js/jquery.js"></script>
    <script src="<?php echo URL; ?>public/js/application.js"></script>
    <script src="<?php echo URL; ?>public/js/uikit.js"></script>
    <script src="<?php echo URL; ?>public/js/highlight.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap-checkbox.js"></script>

<?php if (!isset($_SESSION['user_logged_in'])) {?>
<style>
body{
  padding-top: 50px;
}
</style>
<?php } else {?>
<style>
body{
  padding-top: 70px;
}
</style>
<?php }?>

<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#101010">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand"  style="font:bold;color:white" href="<?php echo URL; ?>"><strong>TeamStyle 16</strong></a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li ><a style="font:bold;color:white" href="<?php echo URL; ?>">主页</a></li>
        <?php if (isset($_SESSION['user_logged_in'])) {?>
        <li><a href="<?php echo URL. 'dashboard';?>" style="font:bold;color:white"><?php echo $_SESSION['user_nickname'];?></a></li>
        <?php }?>
      </ul>
    <!--if not logged in,provide a button to log-->
    <?php if (!isset($_SESSION['user_logged_in'])) {?>
      <ul class="nav navbar-nav navbar-right">
        <li style = "color:white"><a style="font:bold;color:white" href="<?php echo URL . 'login'?>">登录</a></li>
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
        <li><a  style="font:bold;color:white" href="<?php echo URL.'forum/index'?>">论坛</a></li>
				<?php
						if($_SESSION['user_team']!=NULL)
						 echo "<li><a  style='font:bold;color:white' href='". URL."online_battle/index'>在线编译</a></li>"
				?>
        <li ><a style="font:bold;color:white" href="<?php echo URL. 'message/all_message';?>" id="result">未读</a></li>
        
            <li><a style="font:bold;color:white" href = "<?php echo URL.'file';?>">资源列表</a></li>

        <li><a style="font:bold;color:white" href="<?php echo URL.'login/logout'?>">退出</a></li>  
      </ul>
    <?php }?>
      
    </div><!--/.nav-collapse -->
  </div>
  </div> 
</header>
