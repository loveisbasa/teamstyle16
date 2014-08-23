<div class="container">
<br/>
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);
        //Session::set('row_count', null);
        ?>
    <div>
<br/>
        <form class = "form-horizontal" role="form" action="<?php echo URL; ?>login/register_action" method="post">
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
                    <label class="col-sm-2 control-label">电子邮箱</label>
                    <div class="col-sm-3">
                        <input type="text" name="user_email" class="form-control" placeholder="Email" required >
                        </div>
                        </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> 姓  名 </label>
                    <div class="col-sm-3">
                        <input type="text" name="user_real_name" class="form-control" placeholder="Real name" required>
                        </div>
                        </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">手机号码</label>
                    <div class="col-sm-3">
                        <input type="text" name="user_phone" class="form-control" placeholder="phone number" required>
                        </div>
                        </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> 班 级</label>
                    <div class="col-sm-3">
                        <input type="text" name="user_class" class="form-control" placeholder="class" required>
                        </div>
                        </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
        </form>

       

        

    </div>

   <!--   <div class="int">
    <label for="username">用户名  :</label><input type="text" name="username"/><br/></div>
    <div class="int"><label for="key">密码   :</label><input type="password" name="password"/></div>
    <div class="int">
        <label for="makesure">
            确认密码:</label><input type="password" name="confirm"/>
    </div> -->

   