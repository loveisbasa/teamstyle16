<div class="container">   
<?php foreach ($threads as $threads) { ?>
<div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
						<h3 class="panel-title"><?php echo $threads->subject; ?></h3>
            </div>
            <div class="panel-body">
                <ul>
									   
										<li><?php echo "创建于  " . $threads->first . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;最新回复于" . $threads->last .  "<br/>共有" . $threads->response . "个回复"; ?></li> 
										<li><a href="<?php echo URL . 'forum/posts/' . $threads->thread_id; ?>">点击查看</a></li>
                </ul>
            </div>
        </div>
    </div> 

<?php } ?>
</div class="col-sm-6">
<div class= 
   <h3>Create threads</h3>
        <form action="<?php echo URL; ?>forum/create_thread_action" method="post" class="auth-form form-horizontal">
           <div class="form-field">
            <input type="text" name="thread_subject" placeholder='话题' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
          <div class="form-field">
					<input type="text" placeholder="消息" value="" name="message" required class="form-control name" />
						<span class="icon icon-envelope-bold"></span>
          </div>
						<input type="hidden" checked='checked' name="forum_id" value="<?php echo $forum_id; ?>"/>
<!--不太明白如何不用input来post一个值-->
					<button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
           创建 
          </button>
        </form>
</div>
