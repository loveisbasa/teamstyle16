<div class="container">
 <!--    <h1 >Dashboard</h1> -->
    <!-- echo out the system feedback (error and success messages) -->
        <?php 
        require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);
        ?>
</div>


<div class="row">

<div class="col-xs-3 col-xs-offset-1">
    <div class="thumbnail">
		 <?php echo '<a href="' . URL . 'setting/"><img src="'.$_SESSION['user_profile']->user_avatar_link.'" class="img-rounded"/></a>'; ?>
      <div class="caption">
        <h3 class="text-center"><?php echo $_SESSION['user_profile']->user_nickname; ?></h3>
        <p class="text-center"><?php echo $_SESSION['user_profile']->user_email; ?></p>
        <p class="text-center"><?php echo $_SESSION['user_profile']->user_real_name; ?></p>
        <p class="text-center"><?php echo $_SESSION['user_profile']->user_phone; ?></p>
        <p class="text-center">Welcome!<?php
        if ($_SESSION['user_first_login'] == 1) {
            echo 'This is your first login!';
        }
    ?></p>
      </div>
    </div>
  </div>
    <div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Messege</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li data-uk-offcanvas="{target:'#offcanvas-5'}"><a href="<?php echo URL. 'message/send_mail';?>">Send messages</a></li>
                    <li><a href="<?php echo URL. 'message/is_read';?>">All messages</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php if ($_SESSION['user_type'] == 'dev' OR $_SESSION['user_type'] == 'admin') {?>
<div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">File</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo URL; ?>file/upload" method="post" enctype="multipart/form-data">
                    <label for="file">Filename:</label>
                    <input type="file" name="devfile" id="file" /> 
                    <br />
                    <input type="submit" name="submit" value="Submit" />
                </form>
            </div>
            
        </div>
    </div>
<?php } ?>
        <div class="col-xs-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">我的战队</h3>
            </div>

            <div class="panel-body">
                <?php if ($_SESSION['user_team']==null){?>
                <ul>
                    <h3 style="position:center">您尚未加入战队哦</h3>
                    <li><a href="<?php echo URL. 'team/create_team'; ?>">创建战队</a></li>
                    <li><a href="<?php echo URL. 'team/team_display'; ?>">显示所有战队</a></li>
                </ul>
                <?php } else {?>
                <div class="thumbnail">
                         <p><?php echo $_SESSION['user_profile']->team_name;?></p>
                </div>
                <?php }?>
            </div>
          </div>
        </div>
        <div class="row">
    <div class="col-xs-4">
                            <button class="uk-button" data-uk-offcanvas="{target:'#offcanvas-1'}">user</button>
                            <a href="#offcanvas-1" data-uk-offcanvas>user</a>

                            <button class="uk-button" data-uk-offcanvas="{target:'#offcanvas-2'}">team</button>
                        </div>
                            
</div>


</div>
<div id="offcanvas-1" class="uk-offcanvas">
    <div class="uk-offcanvas-bar" style="padding-top:70px;background-color:white">
        <div class="thumbnail">
            <br>
            <?php echo '<a href="' . URL . 'setting/"><img src="'.$_SESSION['user_profile']->user_avatar_link.'" class="img-rounded"/></a>'; ?>
            <div class="caption">
                <h3 class="text-center"><?php echo $_SESSION['user_profile']->user_nickname; ?></h3>
                <p class="text-center"><?php echo $_SESSION['user_profile']->user_email; ?></p>
                        <p class="text-center"><?php echo $_SESSION['user_profile']->user_real_name; ?></p>
        <p class="text-center"><?php echo $_SESSION['user_profile']->user_phone; ?></p>
                <p class="text-center">Welcome!<?php
                if ($_SESSION['user_first_login'] == 1) {
                    echo 'This is your first login!';
                }?></p>
            </div>
        </div>
    </div>
</div>

<div id="offcanvas-2" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip" style="padding-top:70px">
            <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
                <?php if ($_SESSION['user_team']==null) {?>}
                <h3 style="color:#E8E8E8;text-align:center">您尚未加入战队哦</h3>
                <br>
                <li class="uk-parent">
                    <a href="#">加入队伍</a>
                    <ul class="uk-nav-sub">
                        <li><a href="<?php echo URL. 'team/create_team'; ?>">创建队伍</a></li>
                        <li><a href="<?php echo URL. 'team/team_display'; ?>">抱大腿~</a></li>
                    </ul>
                </li>

                <li><a href="<?php echo URL. 'team/team_display'; ?>">查看所有队伍</a></li>
                <li class="uk-nav-divider"></li>
                <li class="uk-nav-header">查找队伍</li>
                <form class="navbar-form navbar-left" role="search" action="<?php echo URL;?>team/team_search" method="post">
                    <input type="text" class="form-control" placeholder="输入战队名" name="keyword"></input>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
                <?php } else {?>
                <h3 style="color:#E8E8E8;text-align:center;font-size:20px">我的队伍</h3>
                <p style="color:#E8E8E8;text-align:center"><?php echo $_SESSION['user_profile']->team_name;?></p>
                <p style="color:#E8E8E8;text-align:center">
                    <?php if ($_SESSION['user_profile']->team_captain==$_SESSION['user_id']) echo "队长";
                    else echo "队员"?>
                </p>
                <li class="uk-parent">
                    <a href="#">队伍成员</a>
                    <ul class="uk-nav-sub">
                        <li style="color:#B0B0B0"><?php echo $_SESSION['team_captain']->user_nickname;?></li>
                        <li style="color:#B0B0B0">
                            <?php if (isset($_SESSION['team_member1'])) echo $_SESSION['team_member1']->user_nickname;?>
                        </li>
                        <li style="color:#B0B0B0"><?php if (isset($_SESSION['team_member2'])) echo $_SESSION['team_member2']->user_nickname;?></li>
                        <li style="color:#B0B0B0"><?php if (!isset($_SESSION['team_member2'])and !isset($_SESSION['team_member1'])) echo "队伍空空如也，赶快招兵买马";?></li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#">队式口号</a>
                    <ul class="uk-nav-sub">
                        <li style="color:#B0B0B0"><?php echo $_SESSION['user_profile']->team_slogan;?></li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>
                <li><a href="<?php echo URL. 'team/team_display'; ?>">显示所有战队</a></li>
                <li class="uk-nav-divider"></li>
                <form class="navbar-form navbar-left" role="search" action="<?php echo URL;?>team/team_search" method="post">
                    <input type="text" class="form-control" placeholder="输入战队名" name="keyword"></input>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
                <?php }?>
            </ul>
    </div>
</div>

<div id="offcanvas-5" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip" style="background-color:white;padding-top:70px">
            <section class="content">
                <div class="form-unit">
                    <h3 style="text-align:center">发送消息</h3>
                    <form action="<?php echo URL; ?>message/send_mail_action" method="post" class="navbar-form navbar-right">
                            <input type="text" name="message_title" placeholder='消息标题' autocomplete="off" value="" required class="form-control" />
                            <span class="icon icon-user-bold"></span>
                        <div class="form-field">
                            <input type="text" placeholder="收信人昵称" name="user_to_nickname" required class="form-control name" />
                            <span class="icon icon-envelope-bold"></span>
                        </div>
                        <textarea type="text" name="message_content" placeholder="内容" value="" required cols="24" rows="14">
                        </textarea>
                        <span class="icon icon-envelope-bold"></span>
                        <select name="message_type">
                            <option value='sec'>私信</option>
                            <?php if($_SESSION['user_type']=='admin'){
                                echo "<option value='pub'>公告</option>";
                            }?>
                        </select>
                        <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
                            发送 
                        </button>
                    </form>
                </div>
            </section>
    </div>
</div>

<div class="row">
    <div class="col-xs-4">
                            <button class="uk-button" data-uk-offcanvas="{target:'#offcanvas-1'}">user</button>
                            <a href="#offcanvas-1" data-uk-offcanvas>user</a>

                            <button class="uk-button" data-uk-offcanvas="{target:'#offcanvas-2'}">team</button>
                        </div>
                            
</div>



