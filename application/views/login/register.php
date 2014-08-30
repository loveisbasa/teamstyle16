<div class="container">
<br/>
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);
        //Session::set('row_count', null);
        ?>
    <div>
<br/>
<link rel='stylesheet' href="<?php echo URL; ?>public/css/stylesheet-createam.css">

<!--        <form class = "form-horizontal" role="form" action="<?php echo URL; ?>login/register_action" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">队式昵称</label>
                    <div class="col-sm-3">
                        <input type="text" name="user_nickname" class="form-control" placeholder="Nickname" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> 密  码 </label>
                    <div class="col-sm-3">
                        <input type="password" name="user_password_new" class="form-control" placeholder="Password"required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-3">
                        <input type="password" name="user_password_repeat" class="form-control" placeholder="Password repeat" required >
                        </div>
                        </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">电子邮箱</label>
                    <div class="col-sm-3">
                        <input type="text" name="user_email" class="form-control" placeholder="Email" required >
                        </div>
                        </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> 姓  名 </label>
                    <div class="col-sm-3">
                        <input type="text" name="user_real_name" class="form-control" placeholder="Real name" required>
                        </div>
                        </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">手机号码</label>
                    <div class="col-sm-3">
                        <input type="text" name="user_phone" class="form-control" placeholder="phone number" required>
                        </div>
                        </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> 班 级</label>
                    <div class="col-sm-3">
                        <input type="text" name="user_class" class="form-control" placeholder="class" required>
                        </div>
                        </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
        </form>
    </div>-->

    <section class="content">
      <div class="form-unit">
        <a href="/" class="brand">
          <h1>Teamstyle16 深蓝</h1>
        </a>
        <h3>Create Teamstyle Account</h3>
        <form action="<?php echo URL; ?>login/register_action" method="post" class="auth-form form-horizontal">
          <div class="face"></div>
          
          <input type="hidden" name="source" value="">
          <div class="form-field">
            <input type="email" name="user_email" placeholder="电子邮箱" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input type="text" name="user_nickname" placeholder='队式昵称' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
          <div class="form-field">
            <input type="password" placeholder="密  码" autocomplete="off" name="user_password_new" required class="form-control password" />
            <span class="icon icon-lock"></span>
          </div>
          <div class="form-field">
            <input type="password" placeholder="确认密码" autocomplete="off" name="user_password_repeat" required class="form-control password" />
            <span class="icon icon-lock"></span>
          </div>
          <div class="form-field">
            <input type="text" name="user_real_name" placeholder="姓  名" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input type="text" name="user_class" placeholder="班 级" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input type="text" name="user_phone" placeholder="手机号码" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
            Sign up
          </button>
          <div class="action-wrapper">
            <a href="/login" class="signup pull-right">Already have an account?</a>
          </div>
        </form>
      </div>
    </section>
   