
 <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
 <div class="row">


    <div class="col-sm-6">
        <div class="panel panel-default" id="profile">
            <div class="panel-heading">
                <h3 class="panel-title">提交代码</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo URL; ?>online_battle/compile" method="post" enctype="multipart/form-data">
                    <label for="file">Select source file(C || Cpp <50k)):</label>
                    <input type="file" name="file" id="file" />
                    <input type="hidden" name="MAX_FILE_SIZE" value="50000" />
                    <button type="submit" class="btn  btn-default" >编译</button>
                </form>
            </div>
        </div>
    </div>

</div>
