<link rel='stylesheet' href="<?php echo URL; ?>public/css/stylesheet-register.css">

<div class="uk-grid uk-grid-preserve uk-grid-divider" data-uk-grid-match="{target:'.uk-panel'}" data-uk-grid-margin>
    <div class="uk-width-1-<?php if ($user_profile->user_team!=null) echo 2; else echo 1;?>">
        <section class="content">
            <div class="form-unit">
                <div class="uk-panel uk-panel-box-primary uk-text-center uk-panel-space">
                    <h3><i class="uk-icon-user"></i><?php echo $user_profile->user_nickname;?></h3>
                    <li data-uk-offcanvas="{target:'#offcanvas-5'}"><a href="#offcanvas-5">发消息</a></li>
                    <?php echo '<img src="'.$user_profile->user_avatar_link.'" class="img-rounded"/>'; ?>
                    <p><?php echo $user_profile->user_real_name;?></p>
                    <p><?php echo $user_profile->user_class;?></p>
                    <p>邮箱：<?php echo $user_profile->user_email;?></p>
                    <p>手机：<?php echo $user_profile->user_phone;?></p>
                </div>
                <h4><?php if ($user_profile->user_team==null) echo "这位童鞋尚未加入战队";?></h4>
            </div>            
        </section>
    </div> 
    <?php if ($user_profile->user_team!=null) {?>
    <div class="uk-width-1-2">
        <section class="content">
            <div class="form-unit">
                            <div class="uk-panel uk-panel-box uk-text-center uk-panel-space">
                <?php if ($user_profile->user_team!=null) {?>
                <h3>TA的队伍</h3>
                <h4><?php echo $user_profile->team_name;?></h4>
                <h4><?php if ($user_profile->team_captain==$user_profile->user_id) echo "队长"; else echo "队员";?></h4>
                <p><?php echo $user_profile->team_slogan;?></p>
                <p><?php echo "队长：".$team_captain->user_nickname;?><br>
                    <?php echo "成员：";if (isset($team_member1)) echo $team_member1->user_nickname;?><br>
                    <?php if (isset($team_member2)) echo "成员：".$team_member2->user_nickname;?><br>
                </p>
                <br>
                <?php } else {?>
                <h2>这位童鞋尚未加入战队</h2>     
                <?php               
                    if($_SESSION['user_profile']->user_id==$_SESSION['user_profile']->team_captain ){
                            if( $_SESSION['user_profile']->team_full==0){
                ?>
                <a href='#testModal<?php echo $_SESSION['user_profile']->team_id;?>' rel='leanModal' class='btn btn-primary'>邀请加入</a>   
<?php 
                            }
                    }
                }
?>
            </div>
            </div>
        </section>
    </div>
    <?php }?>

<div id="offcanvas-5" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip" style="background-color:white;padding-top:70px">            
                
                    <h3 style="text-align:center">发送消息</h3>
                    <form action="<?php echo URL; ?>message/send_mail_action" method="post" class="uk-form">
                        <fieldset>
                            <input type="text" name="message_title" placeholder='消息标题' autocomplete="off" value="" required class="form-control" />
                            
                        
														<input type="text" placeholder="收信人昵称" name="user_to_nickname" value="<?php echo $user_profile->user_nickname;?>" required class="form-control name" />
                            
                        
                        
                        <textarea  name="message_content" placeholder="内容" required rows="15"class="form-control name">
                        </textarea>
                        
                    
                        <br>
                        <span class="icon icon-envelope-bold"></span>
                        <select name="message_type">
                            <option value='sec'>私信</option>
                            <?php if($_SESSION['user_type']=='admin'){
                                echo "<option value='pub'>公告</option>";
                            }?>
                        </select>
                        <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
                            发送 
                        </button></fieldset>
                    </form>
                
            
    </div>
</div>

<div>
