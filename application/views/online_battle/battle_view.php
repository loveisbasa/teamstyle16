
 <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>

 
				<form action="<?php echo URL; ?>online_battle/battle_action/<?php echo $_SESSION['user_team'];?>" method="post" enctype="multipart/form-data">
		<h2>地图</h2>
		<select name="map">
		<?php foreach($maps as $map){
		echo "<option value='$map->name'>$map->name</option>";
		}
		?>
		</select>
		<h2>对手</h2>
		<select name="player">
		<?php foreach($teams as $team){
		echo "<option value='$team->team_name'>目前得分:$team->score.$team->team_name</option>";
		}
		?>
		</select></br></br></br>
		<button type="submit" class="btn  btn-default" >战斗吧骚年</button>
		</form>
