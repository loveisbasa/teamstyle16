
<div class="container">
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
    
    <link href="<?php echo URL ;?>public/css/team.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo URL ;?>public/css/team-1.css" media="all" rel="stylesheet" type="text/css" />


    <div class="wrapper">        
      <div id="start-of-content" class="accessibility-aid"></div>
        <div class="site clearfix">
          <div id="site-container" class="context-loader-container" data-pjax-container>
            
            


<div class="explore-pjax-container">
  <div class="collection-head js-showcase-page" style="background:url(<?php echo URL; ?>public/img/allteam.jpg)">
    <div class="container">
      <div class="collection-title">
        <h1 class="collection-header">战队展示</h1>
        <div class="collection-info">
          <span class="meta-info">战队风云再起</span>
        </div>
      </div>
    </div>
  </div>

  <div class="container collection-page">
    <div class="columns">
      <div class="column three-fourths">
        <div class="markdown-body collection-description">
          <p>祝选手们好运！</p>
        </div>
        <?php foreach ($all_team as $team) { ?>
        <ul class="repo-list">
          <li class="repo-list-item">
            <h3 class="repo-list-name">
                <div class="repo-list-stats">
                <!-- 此栏用作之后排名-->
                <!--
                <span class="repo-list-stat-item">
                  <span class="octicon octicon-git-branch"></span>
                  139
                </span>
              -->
              </div>
              <a href="#">
                <span class="prefix"><?php if (isset($team->team_name)) echo "<strong>".$team->team_name."</strong>"; ?></span>
              </a>              
            </h3>

            <p class="repo-list-description">
              <?php if (isset($team->team_slogan)) echo "<strong>".$team->team_slogan."</strong><br/>"; ?>
              <?php if (isset($team->team_captain)) echo "队长:  ".$team->team_captain."<br/>";
              if (isset($team->team_member1)) echo "      队伍成员:  ".$team->team_member1; 
                if (isset($team->team_member2)) echo "  ".$team->team_member2;
                  echo "<br/><br/>";
                  ?>
            </p>
            <?php if (!$team->team_full ) {
              if (!isset($_SESSION['user_team']) AND !isset($_SESSION['in_team'])){?>
              <a href="#testModal<?php echo $team->team_id;?>" rel = "leanModal" class="btn btn-primary">加入战队</a>
              <?php } else {?>
              <a href="#" class="btn btn-default" role="button">亲不能加两个队啦</a> 
              <?php }?>
              <style type="text/css">
                #testModal<?php echo $team->team_id;?> {
                width: 300px;
                padding: 15px 20px;
                background: #eee;
                -webkit-border-radius: 6px;
                -moz-border-radius: 6px;
                border-radius: 6px;
                -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
                -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
                box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
                }
              </style>
              <div id = "testModal<?php echo $team->team_id;?>" style="display:none;">
                <form id ="loginform" class="form-signin" role="form" action="<?php echo URL.'team/join_team/'.$team->team_id;?>" method="post">
                  <h2 class = "form-signin-heading">Join <?php echo $team->team_name;?> Now!</h2>
                  <input type="password" class="form-control" placeholder="Team Password" name="team_password" required /><br/>
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Join</button>
                </form>
              </div>
            <?php } else { ?>
            <a href="#" class="btn btn-default" role="button">人员已满</a>
            <?php }?>
        </li>
      </ul>
      <?php } ?>
<nav>
  <ul class="pagination">
    <?php if ($_SESSION['team_page_id']!=1){?>
    <li><a href="<?php echo URL.'team/team_display/'.($_SESSION['team_page_id']-1);?>">&laquo;</a></li>
    <?php }
    for ($i = 1;$i < 10;$i++) {?>
    <li><a href="<?php echo URL.'team/team_display/'.$i;?>"><?php echo $i?></a></li>
    <?php }?>
    <li><a href="<?php echo URL.'team/team_display/'.($_SESSION['team_page_id']+1);?>">&raquo;</a></li>
  </ul>
</nav>

      </div>
      
      <div class="column one-fourth">
        <div class="other-content">
            <h3 class="other-content-title">论坛入口</h3>
            <ul class="side-collection-list"  data-pjax>
              <li class="side-collection-list-item">
                <a href="<?php echo URL;?>forum/threads/1" class="side-collection-link">
                  <span class="side-collection-image" style="background-image: url(<?php echo URL;?>public/img/allteam-2.jpg)">
                    <span class="side-collection-item-title">队友招募区</span>
                  </span>
                </a>  
              </li>
              <li class="side-collection-list-item">
                <a href="<?php echo URL;?>forum/threads/2" class="side-collection-link">
                  <span class="side-collection-image" style="background-image: url(<?php echo URL;?>public/img/allteam-4.jpg)">
                    <span class="side-collection-item-title">吐槽灌水区</span>
                  </span>
                </a>  
              </li>
              <li class="side-collection-list-item">
                <a href="<?php echo URL;?>forum/threads/3" class="side-collection-link">
                  <span class="side-collection-image" style="background-image: url(<?php echo URL;?>public/img/allteam-3.jpg)">
                    <span class="side-collection-item-title">平台报错区</span>
                  </span>
                </a>  
              </li>
            </ul>
          </div>
        </div>



    </div>
  </div>


