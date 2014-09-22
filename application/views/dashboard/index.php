<div class="container">
 <!--    <h1 >Dashboard</h1> -->
    <!-- echo out the system feedback (error and success messages) -->
        <?php 
        require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);
        ?>
</div>


<div class="row">

<div class="col-xs-3 col-xs-offset-1">
    <div class="thumbnail">
     <?php echo '<img src="'.$this->user->user_avatar_link.'" class="img-rounded"/>'; ?>
      <div class="caption">
        <h3 class="text-center"><?php echo $this->user->user_nickname; ?></h3>
        <p class="text-center"><?php echo $this->user->user_email; ?></h3>
        <p class="text-center">Welcome!<?php
        if ($_SESSION['user_first_login'] == 1) {
            echo 'This is your first login!';
        }
    ?></p>
      </div>
    </div>
  </div>
    <div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Messege</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="<?php echo URL. 'message/send_mail';?>">Send messages</a></li>
                    <li><a href="<?php echo URL. 'message/is_read';?>">All messages</a></li>
                </ul>
            </div>
        </div>
    </div>
        <div class="col-xs-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">我的战队</h3>
            </div>

            <div class="panel-body">
                <?php if ($_SESSION['user_team']==null){?>
                <ul>
                    <h3 style="position:center">您尚未加入战队哦</h3>
                    <li><a href="<?php echo URL. 'team/create_team'; ?>">创建战队</a></li>
                    <li><a href="<?php echo URL. 'team/team_display'; ?>">显示所有战队</a></li>
                </ul>
                <?php } else {?>
                <div class="thumbnail">
                         <p><?php echo $this->user->team_name;?></p>
                </div>
                <?php }?>
            </div>
          </div>
        </div>


</div>

<form action="<?php echo URL; ?>file/upload" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="userfile" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>


