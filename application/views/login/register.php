
<br/>
<?php $this->renderFeedbackMessages(); ?>
<br/>
<link rel='stylesheet' href="<?php echo URL; ?>public/css/stylesheet-createam.css">


    <section class="content">
      <div class="form-unit">
        <a href="/" class="brand">
          <h1>Teamstyle16 深蓝</h1>
        </a>
        <h3>创建队式账户</h3>
        <form action="<?php echo URL; ?>login/register_action" method="post" class="auth-form form-horizontal">
          <div class="face"></div>
          
          <input type="hidden" name="source" value="">

          <div class="form-field">
            <input type="text" name="user_nickname" placeholder='队式昵称' autocomplete="off" 
            value="<?php if (isset($_POST['user_nickname'] )) {echo $_POST['user_nickname']; }?>" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
          <div class="form-field">
            <input type="password" placeholder="密  码" autocomplete="off" name="user_password_new" 
            value = "<?php if (isset($_POST['user_password_new'] )) {echo $_POST['user_password_new']; }?>" required class="form-control password" />
            <span class="icon icon-lock"></span>
          </div>
          <div class="form-field">
            <input type="password" placeholder="确认密码" autocomplete="off" name="user_password_repeat" 
            value = "<?php if (isset($_POST['user_password_repeat'] )) {echo $_POST['user_password_repeat']; }?>" required class="form-control password" />
            <span class="icon icon-lock"></span>
          </div>
           <div class="form-field">
            <input type="email" name="user_email" placeholder="电子邮箱" autocomplete="off" 
            value="<?php if (isset($_POST['user_email'] )) {echo $_POST['user_email']; }?>" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
            </div>
          <div class="form-field">
            <input type="text" name="user_real_name" placeholder="姓  名" autocomplete="off" 
            value="<?php if (isset($_POST['user_real_name'] )) {echo $_POST['user_real_name']; }?>" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input type="text" name="user_class" placeholder="班 级" autocomplete="off" 
            value="<?php if (isset($_POST['user_class'] )) {echo $_POST['user_class']; }?>" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input type="text" name="user_phone" placeholder="手机号码" autocomplete="off" 
            value="<?php if (isset($_POST['user_phone'] )) {echo $_POST['user_phone']; }?>" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input type="text" name="vcode" placeholder="请输入验证码" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
					</div>
						
					<img title="点击刷新"src=<?php echo URL ."vcode.php";?> align="absbottom"  onclick="this.src='<?php echo URL .'vcode.php';?>'"/> 
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
            注册
          </button>
          <div class="action-wrapper">
            <a href="/login" class="signup pull-right">已有账户，速去登陆</a>
          </div>
        </form>
      </div>
    </section>
   
