    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
<link rel='stylesheet' href="<?php echo URL; ?>public/css/stylesheet-register.css">


<section class="content">
      <div class="form-unit">
        <div class="brand">
          <h1>Teamstyle16 深蓝</h1>
        </div>
        <h3>找回密码</h3>
        <form action="<?php echo URL; ?>login/refindapply" method="post" class="auth-form form-horizontal">
          <div class="face"></div>
          
          <input type="hidden" name="source" value="">
          <div class="form-field">
              <input style="height:48px;width:100%;margin-bottom:20px;font-size:16px" 
              type="text" name="email" placeholder="队式昵称或邮箱" autocomplete="off" 
              value="<?php if (isset($_POST['user_nickname'] )) {echo $_POST['user_nickname']; }?>" required class="form-control email" autofocus/> 
              <span class="icon icon-envelope-bold"></span>
          </div>
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
           找回 
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
