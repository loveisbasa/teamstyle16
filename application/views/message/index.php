<link rel='stylesheet' href="<?php echo URL; ?>public/css/uikit.gradient.min.css">
<link rel='stylesheet' href="<?php echo URL; ?>public/css/awesome.css">
<style>
#wrap{word-break:break-all; width:780px;}
p{white-space: pre-line;}
</style>

<div class="container">   
		<div class="uk-grid">
				<div class="tm-sidebar uk-width-medium-1-4 ">
						<ul class="tm-nav uk-nav" data-uk-nav="">
            <h3 class="uk-panel-title">未读消息</h3>
						     <?php foreach ($new_message as $message) {
								 if($message->message_is_read==1) break; ?>
								   <li>
											<a href="<?php echo URL . 'message/is_read/' . $message->message_id; ?>" >
										   <font color='#FF0000'>
										    <?php  if (isset($message->message_title))  echo $message->message_title;?>
										  </font>
								     </a>        
										</li>
								<?php } ?>
                  <br><br>
            <h3 class="uk-panel-title">所有消息</h3>
						     <?php foreach ($new_message as $message) {
								 if($message->message_is_read==1){ ?>
								  <li>
								    	<a href="<?php echo URL . 'message/all_message/' . $message->message_id; ?>" >
                      <?php  if (isset($message->message_title))  echo $message->message_title;?>
								      </a>        
									</li>


								<?php } } ?><br><br>

            </ul>
      </div>

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

				<div class="tm-sidebar uk-width-medium-3-4">

        <article class="uk-article">
						  <h2><?php if ($j==0) echo "empty message box</h2>"; else{ echo $message->message_title; ?></h2>

						<p id="wrap"><?php echo substr($message->message_content,0,400);?></p>
            <p class="uk-article-meta">
            <?php if ($i!=-1) echo "From <a href="; echo URL . "home/index/" .  $message->message_from_id . "><font color='0x1E90FF'>" . $message->user_nickname ."</font></a>@" . $message->message_send_date; ?>
            </p>

						<li data-uk-offcanvas="{target:'#offcanvas-5'}"><button type="button" class="btn btn-deafault">回复</button></li>
				</article>
        <br><br>
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
					<input value="<?php echo $message->user_nickname?>"type="text" placeholder="收信人昵称" name="user_to_nickname" required class="form-control name" />
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
