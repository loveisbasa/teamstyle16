<div class="container">
<div class="jumbotron">
<!-- <img src="<?php echo URL;?>public/css/test.jpg" alt="hero背景图大小为940*358" />  --> 
    <div class="container">
        <h1 style="position:right">Teamstyle16 深蓝</h1>
        <p>寻找队（da）友（tui）</p>
        <p>规则讨（tu）论（cao）</p>
        <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
    </div>
</div>
</div>
<div class="container">   
<?php foreach ($forums as $forums) { ?>
<div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
						<h3 class="panel-title"><?php echo $forums->title; ?></h3>
            </div>
            <div class="panel-body">
                <ul>
									   
										<li><?php echo $forums->intro; ?></li>
										<li><?php echo "已有" . $forums->count_thread . " 个主题" . $forums->count_post . "个帖子" . "最后回复于" . $forums->latest_reply; ?></li> 
										<li><a href="<?php echo URL . 'forum/threads/' . $forums->forum_id; ?>">点击查看</a></li>
                </ul>
            </div>
        </div>
    </div> 

<?php }?>
</div>
<div class="container">
<?php 
		if($_SESSION['user_type']='admin')
			include 'create_forum.php';
?>
</div>
