<link rel='stylesheet' href="<?php echo URL; ?>public/css/uikit.gradient.min.css">
<link rel='stylesheet' href="<?php echo URL; ?>public/css/awesome.css">
<style>
#wrap{word-break:break-all; width:800px;}
</style>
<div class="container">   
  <h1 class="uk-heading-large"><?php echo $_SESSION['forum_theme']?></h1>
  <div class="uk-article">
    <div class="uk-article-lead">
      <p style="text-indent:3em"><?php echo $_SESSION['forum_intro']; ?></p>
    </div>
  </div>
  <div class="uk-container uk-container-center">
    <div class="uk-grid">
      <div class="uk-width-medium-3-4">
        <?php foreach ($threads as $threads) { 
          $sql="SELECT user_nickname FROM users WHERE user_id={$threads->user_id}";
          $query=$this->db->prepare($sql);
          $query->execute();
          $result = $query->fetch();?> 
        <article class="uk-article">
          <h2><a target="_blank" href="<?php echo URL. 'forum/posts/'. $threads->thread_id; ?>;"><?php echo $threads->subject; ?></a></h2>
          <p class="uk-article-meta">
            <?php echo $result->user_nickname; ?>发表于<?php echo $threads->establish_date."  ";?>回复(<?php echo $threads->reply_count; ?>)
          </p>
          <p id="wrap"><?php echo $threads->content?></p>
            <p class="uk-article-meta">最新回复:<?php echo $threads->latest_reply?></p>
            <a href="<?php echo URL. 'forum/posts/'. $threads->thread_id; ?>;">继续阅读<i class="uk-icon-angle-double-right"></i>
            </a>

        </article>
        <?php } ?>
        <br><br>
      </div>
      <div class="uk-width-medium-1-4">
        <div class="uk-panel uk-panel-header">
            <h3 class="uk-panel-title">热帖排行</h3>
            <ul class="uk-list uk-list-line">
              <?php
              $sql="SELECT subject,thread_id FROM threads ORDER BY reply_count";
              $query = $this->db->prepare($sql);
              $query->execute();$n=0;
              ?>
              <?php while (($row = $query->fetch()) and ($n<=7)) {$n++;?>
                <li><i class="uk-icon-thumbs-o-up"></i> <a target="_blank" href="<?php echo URL. 'forum/posts/'.$row->thread_id?>"><?php echo $row->subject;?></a></li>
                <?}?>
                <br><br>
             </ul>
        </div>
      </div>

      <div class="uk-width-medium-1-4">
        <div class="uk-panel uk-panel-header">
            <h3 class="uk-panel-title">最新帖子</h3>
            <ul class="uk-list uk-list-line">
              <?php
              $sql="SELECT subject,thread_id FROM threads ORDER BY establish_date DESC";
              $query = $this->db->prepare($sql);
              $query->execute();$n=0;
              ?>
              <?php while (($row = $query->fetch()) and ($n<=7)) {$n++;?>
                <li><i class="uk-icon-thumbs-o-up"></i> <a target="_blank" href="<?php echo URL. 'forum/posts/'.$row->thread_id?>"><?php echo $row->subject;?></a></li>
                <?}?><br><br>
             </ul>
        </div>
      </div>

      <div class="uk-width-medium-1-4">
        <div class="uk-panel uk-panel-header">
            <h3 class="uk-panel-title">论坛链接</h3>
            <ul class="uk-list uk-list-line">
              <?php
              $sql="SELECT forum_id,title FROM forums";
              $query = $this->db->prepare($sql);
              $query->execute();
              ?>
              <?php while ($row = $query->fetch()) {?>
                <li><i class="uk-icon-thumbs-o-up"></i> <a target="_blank" href="<?php echo URL. 'forum/threads/'.$row->forum_id?>"><?php echo $row->title;?></a></li>
                <?}?>
             </ul>
        </div>
      </div>

<div class="uk-width-medium-3-4">
   <h3>发表新帖</h3>
        <form action="<?php echo URL . 'forum/create_thread_action/'. $forum_id; ?>" method="post" class="auth-form form-horizontal">
           <div class="form-field">
            <input type="text" name="thread_subject" placeholder='请填写标题' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
          <div class="form-field">
          <textarea type="text" placeholder="我是萌萌的内容O(∩_∩)O~~" value="" name="message" required class="form-control name" ></textarea>
            <span class="icon icon-envelope-bold"></span>
          </div>
            <input type="hidden" checked='checked' name="forum_id" value="<?php echo $forum_id; ?>"/>
<!--不太明白如何不用input来post一个值-->
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
           创建 
          </button>
        </form>
</div>

    </div>
  </div>

</div>