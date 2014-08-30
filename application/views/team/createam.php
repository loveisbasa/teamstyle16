<div class="container">
	<?php require 'application/views/_templates/feedback.php';
		Session::set('feedback_positive',null);
		Session::set('feedback_negative',null); ?>
<!--	<div>
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

		<input type = "text" name = "team_member1"><br/>
		<input type = "text" name = "team_member2"><br/>
		<input type = "submit" name = "CREATE NOW">
		</form>
	</div>-->

<link rel='stylesheet' href="<?php echo URL; ?>public/css/stylesheet-createam.css">
<section class="content">
      <div class="form-unit">
        <div class="brand">
          <h1>Teamstyle16 深蓝</h1>
        </div>
        <h3>登录你的队式战队</h3>
        <form action="<?php echo URL; ?>team/create_action" method="post" class="auth-form form-horizontal">
          <div class="face"></div>
          
          <input type="hidden" name="source" value="">
          <div class="form-field">
            <input type="text" name="team_name" placeholder="Your teamname" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input type="password" name="team_password_new" placeholder='Team Password' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
          <div class="form-field">
            <input type="password" name="team_password_repeat" placeholder='Team Password Again' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
          <div class="form-field">
            <input type="text" name="team_slogan" placeholder="Your team slogan" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          		<!--TODO:运用JavaScript做出动态菜单的效果-->
          <div class="form-field">
         <input type = "text" name = "team_member1" placeholder="Your teammate 1"  class="form-control name">
          </div>
          <div class="form-field">
		<input type = "text" name = "team_member2" placeholder="Your teammate 2"  class="form-control name">
	</div>
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
            立刻建队
          </button>
          <div class="action-wrapper">
            <a href="/login" class="signup pull-right">Already have an account?</a>
          </div>
        </form>
      </div>
    </section>   
