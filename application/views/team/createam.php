<div class="container">
	<h2>You are in the View: application/views/team/createam.php</h2>
	<?php require 'application/views/_templates/feedback.php';
		Session::set('feedback_positive',null);
		Session::set('feedback_negative',null); ?>
	<div>
		<h3>Now create your own team!</h3>
		<form action = "<?php echo URL;?>team/create_action" method = "post">
		<label>Teamname</label><br/>
		<input type = "text" name = "team_name" required><br/>
		<label>Teampassword</label><br/>
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
</div>
