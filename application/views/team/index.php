<div class="container">
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
    <div>
    <h3>List of teams</h3>
        <table class='table table-bordered'>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <th>Id</th>
                <th>name</th>
                <th>slogan</th>
                <th>members</th>
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
                    <td><a href="#testModal" id = "team-password">join</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

<div id = "testModal" style="display:none;">
    <form class="form-signin" role="form" action="<?php echo URL.'team/join_team/'.$team->team_id;?>" method="post">
        <h2 class = "form-signin-heading">Join Team Now!</h2>
        <input type="password" class="form-control" placeholder="Team Password" name="team_password" required /><br/><br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Join</button>
    </form>
</div>

<script type="text/javascript">
$(function(){
   // $('#loginform').submit(function(e){
   //   return false;
   // });
  
  $('#team-password').leanModal();
  //$("a[rel*=leanModal]").leanModal();
});
</script>
