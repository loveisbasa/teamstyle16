<div class="container">
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>

    <h1>战队列表</h1>
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
  position: 
}
</style>
<div class="row">

<?php foreach ($all_team as $team) { ?>
  <div class="col-sm-3">
    <div class="thumbnail">
      <img data-src="holder.js/300x300" alt="">
      <div class="caption">
        <h1><?php if (isset($team->team_name)) echo $team->team_name; ?></h1>
        <p><?php if (isset($team->team_slogan)) echo "队式口号  ".$team->team_slogan; ?></p>
        <p><?php if (isset($team->team_captain)) echo "舰长    ".$team->team_captain; echo '<br/>';
                     if (isset($team->team_member1)) echo $team->team_member1; echo '<br/>'; 
                     if (isset($team->team_member2)) echo $team->team_member2; else echo '<br/>'?></p>
        <?php if (!$team->team_full) { ?>
        <a href="#testModal<?php echo $team->team_id;?>" rel = "leanModal" class="btn btn-primary">加入战队</a>
        <?php } else {?>
        <a href="#" class="btn btn-default" role="button">人员已满</a>
        <?php }?>
    </div>
  </div>
</div>
<?php } ?>

</div>
<?php
 $sql = "SELECT team_id FROM teams ORDER BY team_id DESC";
 $query = $this->db->prepare($sql);
 $query->execute();
 $result = $query->fetch();
 $team_number = $result->team_id;
 $i = 1; 
?>
<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <?php while ($i*8<$team_number+8){?>
  <li><a href="<?php echo URL. 'team/team_display/'.$i?>"><?php echo $i?></a></li>
  <?php $i++;}?>
  <li><a href="#">&raquo;</a></li>
</ul>




