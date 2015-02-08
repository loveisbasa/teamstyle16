<div class="container">
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
        <br/>
        <div class = "row">
            <?php if ($_SESSION['user_type'] == 'dev' OR $_SESSION['user_type'] == 'admin') {?>
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">File</h3>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo URL; ?>file/upload" method="post" enctype="multipart/form-data">
                            <label for="file">File name:</label>
                            <input type="file" name="devfile" id="file" /> 
                            <br />
                            <input type="submit" name="submit" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
           
            <div class = "col-md-8 col-xs-8">
             <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class = "text-center"><strong>文档列表</strong></h2>
                </div>
                <div class= "panel-body">
            <table class = "table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>Uploaded Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_file as $file) {?>
                        <tr>
                            <td><?php echo $file->file_id; ?></td>
            	               <td>
                                <li><a href="<?php echo URL. 'file/download/'. $file->file_id;?>"><?php echo $file->file_title;?></a></li>
            	               </td>
                            <td><?php echo $file->file_date; ?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
        </div>
</div>
