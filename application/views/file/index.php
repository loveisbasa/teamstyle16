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
                        <h3 class="panel-title">上传文件</h3>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo URL; ?>file/upload" method="post" enctype="multipart/form-data">
                            <label for="file">文件名:</label>
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
                    <h2 class = "text-center"><strong>资源列表</strong></h2>
                </div>
                <div class= "panel-body">
            <table class = "table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>文件名</th>
                        <th>上传时间</th>
                    </tr>
                </thead>
                <tbody>
										<?php
												$i=1;
												foreach ($all_file as $file) {?>

                        <tr>
                            <td><?php echo $i; ?></td>
            	               <td>
                                <li><a href="<?php echo URL. 'file/download/'. $file->file_id;?>"><?php echo $file->file_title;?></a></li>
            	               </td>
                            <td><?php echo $file->file_date; ?></td>
														<?php if($_SESSION['user_type']='admin'){
																echo "<td><a href='".URL."file/delete/".$file->file_id."'>删除资源</a></td>";} ?>
                        </tr>
                    <?php $i=$i+1; }?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
        </div>
</div>
