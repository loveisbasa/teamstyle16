<link rel='stylesheet' href="<?php echo URL; ?>public/css/uikit.css">
<link rel='stylesheet' href="<?php echo URL; ?>public/css/bootstrap.css">
<div calss = "uk-container-center">
  <div class = "col-md-6 col-offset-md-3">  
    <div class = "panel panel-info">
      <div calss = "panel-heading">
        <h2 class = "panel-title">Create Forums</h2>
      </div>
      <div class = "panel-body">
        <form action="<?php echo URL; ?>forum/create_forum_action" method="post" class="auth-form form-horizontal">
           <div class="form-field">
            <input type="text" name="forum_title" placeholder='论坛标题		' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
           <div class="form-field">
            <input type="text" placeholder="论坛简介" value="" name="forum_intro" required class="form-control name" />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input type="text" placeholder="请输入验证码" value="" name="vcode" required class="form-control name" />
            <span class="icon icon-envelope-bold"></span>
            <img title="点击刷新"src=<?php echo URL ."vcode.php";?> align="absbottom"  onclick="this.src='<?php echo URL .'vcode.php';?>'"/> 
          </div>
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
           创建 
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

