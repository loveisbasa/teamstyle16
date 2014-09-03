<div class="container">   
<?php foreach ($posts as $posts) { ?>
<div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
						<h3 class="panel-title"><?php echo $posts->user_nickname . "于" . $posts->posted; ?></h3>
            </div>
            <div class="panel-body">
                <ul>
									   
										<li><?php echo $posts->message; ?></li>
                </ul>
            </div>
        </div>
    </div> 

</div> 
<?php } ?>
