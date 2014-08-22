<div class="container">
	<?php require 'application/views/_templates/feedback.php';
		Session::set('feedback_positive',null);
		Session::set('feedback_negative',null); ?>
	<div>
		<form action = "<?php echo URL;?>team/create_action" method = "post">
		<label>Teamname</label><br/>
		<input type = "text" name = "team_name" required><br/>
		<label>Team password</label><br/>
		<input tpye = "password" name = "team_password_new" required><br/>
		<label>Repeat Password</label><br/>
		<input type = "password" name = "team_password_repeat" required><br/>
		<label>Team Slogan</label><br/>
		<input type = "text" name = "team_slogan" ><br/>
		<label>Team members</label><br/>
		<!--TODO:运用JavaScript做出动态菜单的效果-->
		<input type = "text" name = "team_member1"><br/>
		<input type = "text" name = "team_member2"><br/>
		<input type = "submit" name = "CREATE NOW">
		</form>
	</div>
