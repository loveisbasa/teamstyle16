<div class="container">
 <!--使用javascript代码作为客户端接受数据-->
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>


<div class="sunken-menu vertical-right repo-nav js-repo-nav js-repository-container-pjax js-octicon-loaders" data-issue-count-url="/JYWa/teamstyle16/issues/counts" style="float:left">
  <div class="sunken-menu-contents">
    <ul class="sunken-menu-group">
      <li class="tooltipped tooltipped-w" aria-label="Message">
        <a href="" aria-label="Message" class="selected js-selected-navigation-item sunken-menu-item" data-hotkey="g c" data-pjax="true" data-selected-links="repo_source repo_downloads repo_commits repo_releases repo_tags repo_branches /JYWa/teamstyle16">
          <span class="octicon octicon-code"></span> 
          <span class="full-word">Message</span>
        </a>      
      </li>

      <?php foreach ($new_message as $message) {
      if($message->message_is_read==1) break; ?>
	     <li class="tooltipped tooltipped-w" aria-label="Pulse">
			<a href="<?php echo URL . 'message/is_read/' . $message->message_id; ?>" aria-label="Pulse" class="js-selected-navigation-item sunken-menu-item" data-pjax="true">
			    <span class="full-word">
                    <font color='#FF0000'>
                    <?php  if (isset($message->message_title))  echo $message->message_title;?>
                    </font>
                </span>
            </a>        
        </li>
	  <?php } ?>
    </ul>

	<div class="sunken-menu-separator"></div>
	    <ul class="sunken-menu-group">
        <?php foreach ($new_message as $message) {
						if($message->message_is_read==1){
				?>
        <li class="tooltipped tooltipped-w" aria-label="Pulse">
			<a href="<?php echo URL . 'message/is_read/' . $message->message_id; ?>" aria-label="Pulse" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" >
			<span class="full-word"><?php  if (isset($message->message_title))  echo $message->message_title;?></span>
            </a>      
        </li>

<?php }
				}?>
  </div>
</div>
</ul>

<?php 
				$j=count($new_message);
				  $i=-1;
					foreach($new_message as $message)
					{
						$i++;
						if($message->message_id==$message_id)
								break;
					}
					if($j)		$message=$new_message[$i];
?>
<div class="row">
  <div class="col-sm-6" style="width:800px;margin:60px 0 0 80px">
    <div class="panel panel-default">
      <div class="panel-heading">
				<h3 class="panel-title"><?php if ($j==0) echo "empty message box</h3></div>"; else{ echo $message->message_title; ?></h3>
			</div>
      <div class="panel-body">
        <ul>
					<h8><?php if ($i!=-1) echo $message->message_content; ?></h8>"
          <hr>
          <li><?php if ($i!=-1) echo "From <a href="; echo URL . "home/index/" .  $message->user_nickname . "><font color='0x1E90FF'>" . $message->user_nickname ."</font></a>@" . $message->message_send_date; ?></li>
          <li data-uk-offcanvas="{target:'#offcanvas-5'}"><button>回复</button></li>
        </ul>
			</div>
      <?php } ?>
    </div>
  </div> 
</div>
<div id="offcanvas-5" class="uk-offcanvas">
  <div class="uk-offcanvas-bar uk-offcanvas-bar-flip" style="background-color:white;padding-top:70px">
    <section class="content">
      <div class="form-unit">
        <h3 style="text-align:center">回复消息</h3>
        <form action="<?php echo URL; ?>message/send_mail_action" method="post" class="navbar-form navbar-right">
          <input type="text" name="message_title" placeholder='消息标题' autocomplete="off" value="" required class="form-control" />
          <span class="icon icon-user-bold"></span>
          <div class="form-field">
            <input type="text" placeholder="收信人昵称" name="user_to_nickname" required class="form-control name" />
            <span class="icon icon-envelope-bold"></span>
          </div>
          <textarea type="text" name="message_content" placeholder="内容" value="" required cols="24" rows="14">
          </textarea>
          <span class="icon icon-envelope-bold"></span>
          <select name="message_type">
            <option value='sec'>私信</option>
            <?php if($_SESSION['user_type']=='admin'){
              echo "<option value='pub'>公告</option>";
            }?>
          </select>
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">发送 
          </button>
        </form>
      </div>
    </section>
  </div>
</div>
