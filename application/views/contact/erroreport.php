<div class="container">
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);
        //Session::set('row_count', null);
        ?>
<br/>
<link rel='stylesheet' href="<?php echo URL; ?>public/css/stylesheet-register.css">

<section class="content">
      <div class="form-unit">
        <div class="brand">
          <h1>Teamstyle16 深蓝</h1>
        </div>
        <h3>tucao</h3>
        <form action="<?php echo URL; ?>contact/erroreporting" method="post" class="auth-form form-horizontal">
          <div class="face"></div>
          
          <input type="hidden" name="source" value="">
          <div class="form-field">
            <input style="height:48px;width:100%;margin-bottom:20px;font-size:16px" type="text" name="error_theme" placeholder="nickname or email" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input style="height:480px;width:100%;margin-bottom:20px;font-size:16px" type="text" name="error_text" placeholder="tucao" value="" required />
            <span class="icon icon-user-bold"></span>
          </div>
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
            Send
          </button>
        </form>
      </div>
    </section>   
