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

</div> 
<?php } ?>
