<div class="container">
 <!--  <div class="jumbotron">
        <h1>Deep Blue <small>TeamStyle16 </small></h1>
        <p>清华队式程序设计大赛是清华校内规模最大的程序设计比赛。</p>
        <p><a href="<?php echo URL. 'login/register'?>" class="btn btn-primary btn-lg" role="button">现在就加入!  &raquo;</a></p>
      </div> -->
<!-- <div class="container">
    <h2>You are in the View: application/views/home/index.php (everything in the box comes from this file)</h2>
    <p>In a real application this could be the homepage.</p>
</div> -->
</div>
<form class = "form-horizontal" role="form" action="<?php echo URL; ?>login/register" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">队式昵称</label>
                    <div class="col-sm-3">
                        <input type="text" name="user_nickname" class="form-control" placeholder="Nickname" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> 密  码 </label>
                    <div class="col-sm-3">
                        <input type="password" name="user_password_new" class="form-control" placeholder="Password"required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-3">
                        <input type="password" name="user_password_repeat" class="form-control" placeholder="Password repeat" required >
                    </div>
                 </div>
                 <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Fast sign in</button>
                    </div>
                </div>
                </form>
