    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
<link rel='stylesheet' href="<?php echo URL; ?>public/css/stylesheet-register.css">


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
            <input style="height:48px;width:100%;margin-bottom:20px;font-size:16px" type="text" name="user_nickname" placeholder="队式昵称或邮箱" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input style="height:48px;width:100%;margin-bottom:20px;font-size:16px" type="password" name="user_password" placeholder='密码' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
            <input type="checkbox" class = "checkbox" name="user_rememberme" value="Remember me">保持登陆
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
            登 录
          </button>
          <div class="action-wrapper">
            <a href="<?php echo URL; ?>login/register" class="signup pull-right">尚未注册?</a>
          </div>
        </form>
      </div>
    </section> 
<script type="text/javascript">  
$('.checkbox').checkbox();
</script>
