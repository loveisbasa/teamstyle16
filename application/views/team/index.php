<div class="container">
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
    <div>
    <h1>战队列表</h1>
        <table class='table table-hover table-bordered'>
            <thead style="background-color: #eee; font-weight: bold;">
            <tr>
                <th>战队编号</th>
                <th>战队名称</th>
                <th>战队口号</th>
                <th>战队成员</th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($all_team as $team) { ?>
                <tr>
                    <td><?php if (isset($team->team_id))  echo $team->team_id; ?></td>
                    <td><?php if (isset($team->team_name)) echo $team->team_name; ?></td>
                    <td><?php if (isset($team->team_slogan)) echo $team->team_slogan; ?></td>
                    <td><?php if (isset($team->team_captain)) echo $team->team_captain; 
                     if (isset($team->team_member1)) echo '<br/>'. $team->team_member1; 
                     if (isset($team->team_member2)) echo '<br/>'. $team->team_member2; ?></td>
                    <td><a href="#testModal<?php echo $team->team_id;?>" rel = "leanModal" >join</a></td>
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
        <h2 class = "form-signin-heading">Join Team Now!</h2>
        <input type="password" class="form-control" placeholder="Team Password" name="team_password" required /><br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Join</button>
    </form>
</div>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>




