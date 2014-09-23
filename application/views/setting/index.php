
 <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
 <div class="row">

    <div class="col-sm-2 col-xs-offset-1">
        <div class="list-group">
            <a href="#profile" class="list-group-item">Public Profile</a>
            <a href="#account" class="list-group-item">Account Settings</a>
            <a href="#password" class="list-group-item">Change Password</a>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-default" id="profile">
            <div class="panel-heading">
                <h3 class="panel-title">修改头像</h3>
            </div>
            <div class="panel-body">
                <?php echo '<img src="'.$_SESSION['src'].'" />'; ?>
                <form action="<?php echo URL; ?>login/uploadAvatar_action" method="post" >
                    <label for="avatar_file">Select an avatar image from your hard-disk (will be scaled to 44x44 px):</label>
                    <input type="file" name="avatar_file" required />
                    <!-- max size 5 MB (as many people directly upload high res pictures from their digital cameras) -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <button type="submit" class="btn  btn-default" >Upload</button>
                </form>
            </div>
        </div>
        
    </div>
</div>
