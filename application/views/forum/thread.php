<div class="container">   
<?php foreach ($threads as $threads) { ?>
<div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
						<h3 class="panel-title"><?php echo $threads->subject; ?></h3>
            </div>
            <div class="panel-body">
                <ul>
									   
										<li><?php echo "创建于" . $threads->first . "最新回复于" . $threads->last .  "共有" . $threads->response . "个帖子"; ?></li> 
										<li><a href="<?php echo URL . 'forum/posts/' . $threads->thread_id; ?>">点击查看</a></li>
                </ul>
            </div>
        </div>
    </div> 

</div> 
<?php } ?>
