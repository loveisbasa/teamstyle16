<div class="container">
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>

	<ul>
            <?php foreach ($all_file as $file) {?>
                    <li><a href="<?php echo URL. 'file/download/'.$file->file_title;?>"><?php echo $file->file_title;?></a></li>
            <?php }?>
            </ul>
</div>