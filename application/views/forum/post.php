<style>
#wrap{word-break:break-all; width:850px;}
p{white-space: pre-line;}
</style>

<link rel='stylesheet' href="<?php echo URL; ?>public/css/uikit.css">

    <title><?php echo $thread_link->subject;?></title>

<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
  <div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-3-4">
      <article class="uk-article">
        <h1 class="uk-article-title"><?php echo $thread_link->subject;?></h1>
        <p class="uk-article-meta">作者：<?php echo $thread_link->user_nickname;?> 发表于<?php echo $thread_link->establish_date; ?>. 
        </p>
        <p id="wrap"><?php echo $thread_link->content;?></p>
        <p><img src="<?php echo URL;?>public/img/theme.jpg" width="900" height="300" alt=""></p>

      </article>

    <h3 class="uk-h2">评论(<?php echo $thread_link->reply_count;?>)</h3>

        <ul class="uk-comment-list">
            <?php foreach ($posts as $posts) { ?>
            <li>
                <article class="uk-comment">
                    <header class="uk-comment-header">
                        <img class="uk-comment-avatar" width="50" height="50" src="<?php echo $posts->user_avatar_link; ?>" alt="">
                        <h4 class="uk-comment-title"><?php echo $posts->user_nickname; ?></h4>
                        <p class="uk-comment-meta"><?php echo $posts->posted ;?></p>
                    </header>
                    <div class="uk-comment-body"><?php echo $posts->message; ?></div>
										<hr />
                </article>
            </li>
            <?php } ?>
        </ul>
<div class="container">   
   <h3>快速回复</h3>
        <form action="<?php echo URL; ?>forum/create_post_action" method="post" class="auth-form form-horizontal">
           <div class="form-field">
            <textarea type="text" name="message" placeholder='回复' autocomplete="off" required cols=50></textarea>
            <span class="icon icon-user-bold"></span>
          </div>
          
                        <input type="hidden" checked='checked' name='thread_id' value="<?php echo $thread_id; ?>"/>
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
           回复
          </button>
        </form>
</div>

    </div>

                <div class="uk-width-medium-1-4   uk-hidden-small">
                    <div class="uk-panel uk-panel-box uk-text-center">
                        <img class="uk-border-circle" width="120" height="120" src="<?php echo $thread_link->user_avatar_link; ?>" alt="">
                        <h3><a href="<?php echo URL. 'message/send_mail/'. $thread_link->user_nickname;?>"><?php echo $thread_link->user_nickname;?></a></h3>
                        <p><?php echo $thread_link->user_email;?></p>
                    </div>
                    <div class="uk-panel">
                        <h3 class="uk-panel-title">作者其他热帖</h3>
                        <ul class="uk-list uk-list-line">
														<?php
														foreach ($writer_link as $result) {
															
														?>
                            <li><a target="_blank" href="<?php echo URL . 'forum/posts/' . $result->thread_id;?>"><?php echo $result->subject;?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="uk-panel">
                        <h3 class="uk-panel-title">关注队式</h3>
                        <ul class="uk-list">
                            <li><a href="#">清华队式</a></li><!--人人网链接-->
                            <li><a href="#">电子科协</a></li>
                        </ul>
                    </div>
                </div>

            </div>
</div>

<div style="display:none"><script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0c44dcd3aa48076b3e0a91169a4ac665' type='text/javascript'%3E%3C/script%3E"));
</script></div>
