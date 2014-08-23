<div class="container">
    <h1>Dashboard</h1>
    <!-- echo out the system feedback (error and success messages) -->
        <?php 
        require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);
        ?>
</div>

<div class="row">

<div class="col-sm-3 col-md-2">
    <div class="thumbnail">
     <?php echo '<img src="'.$this->user->user_avatar_link.'" />'; ?>
      <div class="caption">
        <h3><?php echo $this->user->user_nickname; ?></h3>
        <p>Welcome!<?php
        if ($_SESSION['user_first_login'] == 1) {
            echo 'This is your first login!';
        }
    ?></p>
      </div>
    </div>
  </div>

    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Team</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="<?php echo URL. 'team/create_team'; ?>">Create a team</a></li>
                    <li><a href="<?php echo URL. 'team/team_display'; ?>">Show all teams</a></li>
                </ul>
            </div>
          </div>
        </div>
    

    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Messege</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="<?php echo URL. 'message/send_message';?>">Send messages</a></li>
                    <li><a href="<?php echo URL. 'message/all_message';?>">All messages</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class = "container">
    <ul>
        <li><a href="<?php echo URL. 'login/uploadAvatar';?>">Upload Avatar</a></li>
    </ul>
</div>

