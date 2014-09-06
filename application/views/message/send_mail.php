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
    <section class="content">
      <div class="form-unit">
        <a href="/" class="brand">
          <h1>Teamstyle16 深蓝</h1>
        </a>
        <h3>Create Teamstyle Account</h3>
        <form action="<?php echo URL; ?>message/send_mail_action" method="post" class="auth-form form-horizontal">
           <div class="form-field">
            <input type="text" name="message_title" placeholder='消息标题		' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
          <div class="form-field">
					<input type="text" placeholder="收信人昵称" <?php
				if($send_to_name!="") echo "value=$send_to_name";
				?>
				 name="user_to_nickname" required class="form-control name" />
						<span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field"> 
            <input type="text" name="message_content" placeholder="内容" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
						<select name="message_type">
						<option value='sec'>私信</option>
						<?php if($_SESSION['user_type']=='admin'){
						echo "<option value='pub'>公告</option>";
						}
						?>
						</select>
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
           发送 
          </button>
        </form>
      </div>
    </section>
   
