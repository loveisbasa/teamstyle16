<div class="container">   
<?php foreach ($posts as $posts) { ?>
<div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
						<h3 class="panel-title"><?php echo $posts->user_nickname . "于" . $posts->posted; ?></h3>
            </div>
            <div class="panel-body">
                <ul>
									   
										<li><?php echo $posts->message; ?></li>
                </ul>
            </div>
        </div>
    </div> 

<?php } ?>

   <h3>Create Forums</h3>
        <form action="<?php echo URL; ?>forum/create_post_action" method="post" class="auth-form form-horizontal">
           <div class="form-field">
            <input type="text" name="message" placeholder='回复' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
						<input type="radio" checked='checked' name='thread_id' value="<?php echo $thread_id; ?>"/>确认

          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
           创建 
          </button>
        </form>
</div>
