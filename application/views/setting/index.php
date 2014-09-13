
 <?php $this->renderFeedbackMessages(); ?>
 <div class="row">
        <div class="col-sm-2 col-xs-offset-1">
          <div class="list-group">
            <a href="#profile" class="list-group-item">Public Profile</a>
            <a href="#account" class="list-group-item">Account Settings</a>
          </div>
        </div>

        <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">/opt/lampp/htdocs/index.php</h3>
            </div>
            <div class="panel-body">
            <?php echo '<img src="'.$_SESSION['src'].'" />'; ?>
                <form action="<?php echo URL; ?>login/uploadavatar_action" method="post" enctype="multipart/form-data">
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
