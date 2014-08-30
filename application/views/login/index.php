    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
<link rel='stylesheet' href="<?php echo URL; ?>public/css/stylesheet-register.css">
<!--<div class = "container">
    <div class="col-md-3">
        <h2>Sign In</h2>
        <form class="form-signin" role="form" action="<?php echo URL; ?>login/login" method="post">
                <input type="text" name="user_nickname" class="form-control" placeholder="nickname or email" required autofocus>
                <input type="password" name="user_password" class="form-control" placeholder="Password"required ><br/>
                <label>
                    <input type="checkbox" name="user_rememberme"> Remember me
                </label><br/>
                <button type="submit" class="btn btn-lg btn-primary" >Log In</button>
        </form>
        <a href="<?php echo URL; ?>login/register">Register</a>
        |
        <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a>

    </div>
</div>-->

<section class="content">
      <div class="form-unit">
        <div class="brand">
          <h1>Teamstyle16 深蓝</h1>
        </div>
        <h3>登录你的队式账户</h3>
        <form action="<?php echo URL; ?>login/login" method="post" class="auth-form form-horizontal">
          <div class="face"></div>
          
          <input type="hidden" name="source" value="">
          <div class="form-field">
            <input style="height:48px;width:100%;margin-bottom:20px;font-size:16px" type="text" name="user_nickname" placeholder="nickname or email" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input style="height:48px;width:100%;margin-bottom:20px;font-size:16px" type="password" name="user_password" placeholder='Password' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
            <input type="checkbox" name="user_rememberme" value="Remember me">Remember me
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
            Log in
          </button>
          <div class="action-wrapper">
            <a href="/login" class="signup pull-right">Already have an account?</a>
          </div>
        </form>
      </div>
    </section>   
