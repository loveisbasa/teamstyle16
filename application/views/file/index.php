<div class="container">
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
        <br/>
             <h2 class = "text-center"><strong>文档列表</strong></h2>
	<div class = "row">
	<div class = "col-md-6 col-xs-8 col-xs-offset-2 col-md-offset-3 ">
	<ul>
            <?php foreach ($all_file as $file) {?>
            	       <div class = "well">
                    <li><a href="<?php echo URL. 'file/download/'.$file->file_title;?>"><?php echo $file->file_title;?></a></li>
            	       </div>
            <?php }?>
            </ul>
            </div>
            </div>
</div>
