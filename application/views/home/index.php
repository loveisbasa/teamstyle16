<link href="<?php echo URL; ?>public/css/bootstrap.css" rel="stylesheet">
<div class="jumbotron" style = "position:relative;top:-20px;background:url(<?php echo URL; ?>public/img/jiemian.jpg);background-repeat:no-repeat;background-position:center">
    <div class="container">
    <h1 style="position:relative;top:-30px;text-indent:10px">深蓝<small>TeamStyle16 </small></h1>
    <br><br><br><br><br><br><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;<strong>苍烟缭绕，云泽浩莽，有大洋名洪荒。</strong></p>
    <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;";?><a href="<?php echo URL. 'login/register'?>" class="btn btn-primary btn-lg" role="button">现在就加入!  &raquo;</a>
</div>
</div>

            <div class="uk-container uk-container-center uk-text-center">
                <h1 class="uk-heading-large">参加队式</h1>
                <p class="uk-text-large">热爱编程的你，心动了吗？<br class="uk-hidden-small">真正的“零基础”，走过路过不要错过哦！</p>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-3">
                        <div class="uk-panel">
                            <img class="tm-image-pull" src="<?php echo URL;?>public/img/home1.jpg" width="400" height="280" alt="Technique">
                            <br><br>
                            <h2 class="uk-margin-top-remove">技术</h2>
                            <p>bug是什么能吃吗？能！</p>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <div class="uk-panel">
                            <img class="tm-image-pull" src="<?php echo URL;?>public/img/home2.jpg" width="400" height="280" alt="Friends">
                            <br><br>
                            <h2 class="uk-margin-top-remove">队友</h2>
                            <p>和靠谱小伙伴第一次刷夜，从此一生一起走</p>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <div class="uk-panel">
                            <img class="tm-image-pull" src="<?php echo URL;?>public/img/home3.jpg" width="400" height="280" alt="Themes">
                            <br><br>
                            <h2 class="uk-margin-top-remove">巅峰</h2>
                            <p>还记得罗姆那晚，走上人生巅峰</p>
                        </div>
                    </div>
                </div>

            </div>

</br>
    <div class = "uk-grid" style="background-color:#3399FF">

        <div class = "uk-width-medium-1-2">
        </br>
            <form class = "form-horizontal" role="form" action="<?php echo URL; ?>login/register" method="post">
                <div class="form-group">
                    <label class="col-xs-3 control-label">昵称</label>
                    <div class="col-md-5 col-xs-8">
                        <input type="text" name="user_nickname" class="form-control" placeholder="Nickname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-3 control-label">密码 </label>
                    <div class="col-md-5 col-xs-8">
                        <input type="password" name="user_password_new" class="form-control" placeholder="Password"required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-3 control-label">确认</label>
                    <div class="col-md-5 col-xs-8">
                        <input type="password" name="user_password_repeat" class="form-control" placeholder="Password repeat" required >
                </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-10 col-xs-offset-4">
                        <button type="submit" class="btn btn-default">快速加入</button>
                    </div>
                </div>
            </form>
        </div>
        <div class = "uk-width-medium-1-2">
            <br/><br/>
            <h1 class = "uk-heading-large" style = "color:white;"><strong>现在就加入!</strong></h1>
            <br/>
        </div>

</div>
