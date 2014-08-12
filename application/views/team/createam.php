<div class="container">
	<h2>You are in the View: application/views/team/createam.php</h2>
	<?php require 'application/views/_templates/feedback.php';
		Session::set('feedback_positive',null);
		Session::set('feedback_negative',null);?>
	<div>
		<h3>Now create your own team!</h3>
		<form action = "<?php echo URL;?>team/create_action" method = "post">
		<label>Teamname</label>
		<input type = "text" name = "team_name" required><br/>
		<label>Teampassword</label>
		<input tpye = "password" name = "team_password_new" required><br/>
		<label>Repeat Password</label>
		<input type = "password" name = "team_password_repeat" required><br/>
		<label>Team Slogan</label>
		<input type = "text" name = "team_slogan" value = "we are champions"><br/>
		<label>Team members</label>
		<input type = "text" name = "team_member1"><br/>
		<input type = "text" name = "team_member2"><br/>
		<input type = "submit" name = "CREATE NOW">
		</form>
	</div>
</div>