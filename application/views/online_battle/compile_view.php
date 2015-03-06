
 <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
<link href="<?php echo URL; ?>public/css/online.css" rel="stylesheet" type="text/css">

<main class="container" role="main">
 <div class="row">
    <div class="col-lg-8 col-lg-push-2" style="background-image:'<?php echo URL; ?>public/img/online_background.jpg'">
        <h1 class="blog-title" style="text-align:center">
                在线编译
        </h1>
        <h2 class="blog-desc" style="text-align:center">
            下面，就是见证奇迹的时刻
        </h2>

        <div class="col-sm-10 col-sm-push-1">
        <div class="panel panel-info" id="profile">
            <div class="panel-heading">
                <h3 class="panel-title">提交代码<code>.C</code> || <code>.Cpp</code></h3>
            </div>
            <div class="panel-body">
						<form action="<?php echo URL; ?>online_battle/uploads/<?php echo $_SESSION['user_team'];?>" method="post" enctype="multipart/form-data">
                    <label for="file">选择文件(小于50kib)</label>
                    <input type="file" name="file" id="file" />
                    <input type="hidden" name="MAX_FILE_SIZE" value="50000" />
                    <button type="submit" class="btn  btn-default" >上传</button>
										<a href="<?php echo  URL . 'online_battle/compile_action/'.$_SESSION['user_team'];?>" rel="leanModal" class="btn btn-primary">编译</a>
										<?php if($_SESSION['with_ai'])
										echo  "<a href='" .URL . "online_battle/battle' rel='leanModal' class='btn btn-primary'>PK</a>";
										?>
                </form>
            </div>
        </div>
    </div>
    </div>    



</div>
</main>
