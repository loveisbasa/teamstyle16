<div class="uk-container">
	<div class="uk-grid uk-grid-medium" data-uk-grid-match data-uk-grid-margin >
		<?php
		foreach($All_user as $user){?>
		<div class="uk-width-medium-1-6 uk-width-small-1-3">
		<div class="thumbnail">
			<div class="uk-panel">
				<a class="uk-overlay" href=<?php echo URL . "home/index/" . $user->user_id;?>>
				<img title="<?php echo $user->user_nickname;?>" src="<?php echo  $user->user_avatar_link;?>" width="150px" height="150px">
			    <div class="uk-overlay-area">
                    <div class="uk-overlay-area-content"><?php echo $user->user_real_name;?></div>
                </div>
            </a>
				<a href=<?php echo URL . "home/index/" . $user->user_id;?>><h4 style="color:blue"><?php echo $user->user_nickname;?></h4></a>
			<p><?php echo $user->user_class;?></p>
		</div>
</div>
		</div>
		<?php }?>
	</div>
</div>

