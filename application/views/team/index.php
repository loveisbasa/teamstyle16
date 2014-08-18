<div class="container">
    <h2>You are in the View: application/views/team/index.php (everything in this box comes from that file)</h2>
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
    <div>
    <h3>List of teams</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>name</td>
                <td>slogan</td>
                <td>members</td>
                <td> </td>
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
<h1>Join Team Now!</h1>
<form action="<?php echo URL.'team/join_team/'.$team->team_id;?>" method="post">
<label>Team Password:</label><br/>
<input type="password" name="team_password" required /><br/><br/>
<div class="center"><input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="JOIN" tabindex="3"></div>
</form>
</div>
<script type="text/javascript">
$(function(){
   // $('#loginform').submit(function(e){
   //   return false;
   // });
  
  $('#team-password').leanModal();
});
</script>
