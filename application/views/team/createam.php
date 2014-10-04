<style>
p{white-space: pre-wrap;}
label{white-space: pre-wrap;}
</style>
<div class="uk-container">
	<?php require 'application/views/_templates/feedback.php';
		Session::set('feedback_positive',null);
		Session::set('feedback_negative',null); ?>

        <div class="uk-container uk-container-center">
          <div class="uk-grid">
            <div class="uk-width-medium-1-2 uk-text-center">
                <form class = "uk-form" role="form" action="<?php echo URL; ?>team/create_action" method="post">
                  <div class="uk-form-row">
                    <label for="team-1" class="uk-form-label">队伍名称</label>                                 
                      <input type="text" name="team_name" autocomplete="off" value="" required id="team_1" style="position:float-right"/>
                  </div>        
                  <div class="uk-form-row">
                    <label class="uk-form-label">加队密码</label>
                    <input type="password" name="team_password_new" autocomplete="off" value="" style="position:float-right"required/>
                  </div>
                  <div class="uk-form-row">
                    <label class="uk-form-label">确认密码</label>
                    <input type="password" name="team_password_repeat" autocomplete="off" value="" required/>
                  </div>
                  <div class="uk-form-row">
                    <label class="uk-form-label">队伍口号</label>
                    <input type="text" name="team_slogan" autocomplete="off" value="" required/>
                  </div>
                  <div class="uk-form-row">
                    <label class="uk-form-label"> 队  友  1 </label>
                    <input type = "text" name = "team_member1" value="" placeholder="昵称（可不填）" />
                  </div>
                  <div class="uk-form-row">
                    <label class="uk-form-label"> 队  友  2 </label>
                    <input type = "text" name = "team_member2" value="" placeholder="昵称（可不填）"/>
                  </div>
                  <div class="uk-form-row">
                    <div>
                      <button type="submit" class="btn btn-default">立刻建队</button>
                    </div>
                  </div>
                </form>

            </div>
            <div class="uk-width-medium-1-2">
              <div class="uk-panel">
                <div class="uk-container">
                <img class="tm-image-pull" src="docs/images/icon_themes.svg" width="200" height="140" alt="Teamstyle16">
                <h2 class="uk-margin-top-remove">欢迎加入队式大家庭</h2>
                <h4>参赛须知</h4>
                <p>1、组队前请检查自己的联系方式邮箱、手机号码是否正确，建队者默认为本队队长，由于网站目前不支持改换队长功能，请各位大腿慎重考虑</p>
                <p>2、加队密码为队友加入战队的凭证，请妥善保管小心泄露。若有意邀请某位队友加入，请通过私信功能联系他</p>
                <p>3、目前支持C、C++两种语言，在提交代码时请提交<code>.cpp</code>或<code>.c</code></br>（学姐温馨提示）在调试中，请记得打开Release模式，可以帮助各位选手节省时间提高效率，若遇到bug，请转回Debug模式Debug</p>
                <p>祝各位选手玩的愉快，网站组的三只喵敬上~</p>
              </div>
              </div>
            </div>
          </div>
        </div>

    
<link rel='stylesheet' href="<?php echo URL; ?>public/css/stylesheet-createam.css">
<!--<section class="content" background="<?php echo URL; ?>public/img/jiemian.jpg">
      <div class="form-unit">
        <div class="brand">
          <h1>Teamstyle16 深蓝</h1>
        </div>
        <h3>创建你的队式战队</h3>
        <form action="<?php echo URL; ?>team/create_action" method="post" class="auth-form form-horizontal">
          <div class="face"></div>
          
          <input type="hidden" name="source" value="">
          <div class="form-field">
            <input type="text" name="team_name" placeholder="队伍名" autocomplete="off" value="" required class="form-control email"/>
            <span class="icon icon-envelope-bold"></span>
          </div>
          <div class="form-field">
            <input type="password" name="team_password_new" placeholder='加队密码' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
          <div class="form-field">
            <input type="password" name="team_password_repeat" placeholder='确认密码' autocomplete="off" value="" required class="form-control name" />
            <span class="icon icon-user-bold"></span>
          </div>
          <div class="form-field">
            <input type="text" name="team_slogan" placeholder="队伍口号" autocomplete="off" value="" required class="form-control email" autofocus />
            <span class="icon icon-envelope-bold"></span>
          </div>

          <div class="form-field">
         <input type = "text" name = "team_member1" placeholder="队友1昵称（可不填）"  class="form-control name">
          </div>
          <div class="form-field">
		<input type = "text" name = "team_member2" placeholder="队友2昵称（可不填）"  class="form-control name">
	</div>
          <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
            立刻建队
          </button>
          <div class="action-wrapper">
            <a href="<?php echo URL. 'team/team_display'?>" class="signup pull-right">加入其他战队？</a>
          </div>
        </form>
      </div>
    </section>   -->
  </div>

