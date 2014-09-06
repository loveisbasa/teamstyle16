   <h3>Create Forums</h3>
        <form action="<?php echo URL; ?>forum/create_forum_action" method="post" class="auth-form form-horizontal">
           <div class="form-field">
            <input type="text" name="forum_title" placeholder='论坛标题		' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
          <div class="form-field">
					<input type="text" placeholder="论坛简介" value="" name="forum_intro" required class="form-control name" />
						<span class="icon icon-envelope-bold"></span>
          </div>

          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
           创建 
          </button>
        </form>
