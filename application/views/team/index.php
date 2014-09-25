
<div class="container">
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
    <h1>战队列表</h1>
<div class="row">

<?php foreach ($all_team as $team) { ?>
  <div class="col-sm-3">
    <div class="thumbnail">
      <img data-src="holder.js/300x300" alt="">
      <div class="caption">
        <h1><?php if (isset($team->team_name)) echo $team->team_name.".cpp"; ?></h1>
        <p><?php echo "int main()<br/>{<br/>";?>
        <?php if (isset($team->team_slogan)) echo "printf(\"<strong>".$team->team_slogan."</strong>\", %s);"; ?></p>
        <p><?php if (isset($team->team_captain)) echo "string <em>captain</em> = \"<strong>".$team->team_captain."</strong>\";"; echo '<br/>';
                     if (isset($team->team_member1)) echo "char * <em>soldier</em> = \"<strong>".$team->team_member1."</strong>\";<br/>"; 
                     if (isset($team->team_member2)) echo "char * <em>soldier</em> = \"<strong>".$team->team_member2."</strong>\";<br/>"; else echo '<br/>';?>
        <?php if(!isset($team->team_member1)) echo "<br/>"; echo "return 0;<br/>}";?></p>
        <?php if (!$team->team_full ) { ?>
            <?php if (!isset($_SESSION['user_team']) AND !isset($_SESSION['in_team'])){?>
        <a href="#testModal<?php echo $team->team_id;?>" rel = "leanModal" class="btn btn-primary">加入战队</a>
        <?php }?>
        <style type="text/css">
                #testModal<?php echo $team->team_id;?> {
                width: 300px;
                padding: 15px 20px;
                background: #eee;
                -webkit-border-radius: 6px;
                -moz-border-radius: 6px;
                border-radius: 6px;
                -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
                -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
                box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
                }
              </style>
              <div id = "testModal<?php echo $team->team_id;?>" style="display:none;">
                <form id ="loginform" class="form-signin" role="form" action="<?php echo URL.'team/join_team/'.$team->team_id;?>" method="post">
                  <h2 class = "form-signin-heading">Join <?php echo $team->team_name;?> Now!</h2>
                  <input type="password" class="form-control" placeholder="Team Password" name="team_password" required /><br/>
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Join</button>
                </form>
              </div>
        <?php } else { ?>
                <a href="#" class="btn btn-default" role="button">人员已满</a>
        <?php }?>
    </div>
  </div>
</div>
<?php } ?>


