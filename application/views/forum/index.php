
<link rel='stylesheet' href="<?php echo URL; ?>public/css/uikit.css">
<style>
#wrap{word-break:break-all; width:250px;}
#deepblue{color:white;font-family: times}
p{white-space: pre-line;}
</style>

<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

    <div class="uk-grid">
        <div class="uk-width-medium-1-1" style = "background:url(<?php echo URL; ?>public/img/theme.jpg);background-repeat:no-repeat;background-position:50% 0%">
            <div class="uk-vertical-align">
                <div class="uk-vertical-align-middle uk-width-1-1 uk-text-center">
                    <br>
                    <h1 class="uk-heading-large" style="color:white;font-family:times">DEEP BLUE</h1>
                    <br>
                </div>
            </div>
        </div>
        <div class="uk-width-1-1">
            <br>
            <h2 style="text-align:center">队式人自己的论坛</h2>
            <h4 style="text-align:center">让队式成为大学里最温暖的回忆</h4>
        </div>

    </div>

        <div class="uk-grid" data-uk-grid-margin>
            <?php foreach ($forums as $forums) { ?>
            <div class="uk-width-medium-1-3">
                <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <!--图标待修改，根据每个不同板块使用不同图标-->
                            <i class="uk-icon-comments uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3"><a href="<?php echo URL . 'forum/threads/' . $forums->forum_id; ?>">
                                <?php echo $forums->title; ?></a></h2>
                            <p style="fontsize:90px;text-indent:1cm" id = "wrap"><?php echo $forums->intro; ?></p>
                            <p class="uk-article-meta"><?php echo "发帖 " . $forums->count_thread . "  回复" . $forums->count_post?>
                            <?php echo "最新回复于" . $forums->latest_reply; ?></p> 
                        </br>
                        </div>
                    </div>
                </div>
            <?php }?>
            </div> 
        </div>


<?php 
        if($_SESSION['user_type']=='admin')
            include 'create_forum.php';
?>
</div>




       <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

            <hr class="uk-grid-divider">

            <div class="uk-grid" data-uk-grid-margin>

                <div class="uk-width-medium-1-2">
                    <img width="660" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjYwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2NjAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2NjAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2NjAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yNTguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjU4LjE4NHogTTM5MC4yNDQsMjQ0LjI0N0gyNzAuNDM3di04OC40OTRoMTE5LjgwOEwzOTAuMjQ0LDI0NC4yNDcNCgkJTDM5MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI3Ni44ODEsMjM0LjcxNyAzMDEuNTcyLDIwOC43NjQgMzEwLjgyNCwyMTIuNzY4IDM0MC4wMTYsMTgxLjY4OCAzNTEuNTA1LDE5NS40MzQgDQoJCTM1Ni42ODksMTkyLjMwMyAzODQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjMwNS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                </div>
<!--这两个链接分别连接到通知公告区的规则介绍和活动时间两个帖子-->
                <div class="uk-width-medium-1-2">
                    <h1>【队式十六】官方报名通知</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <h2>竞赛流程</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a class="uk-button uk-button-primary" href="#">进入帖子</a>
                </div>

            </div>

            <hr class="uk-grid-divider">

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <h1>【队式十六】最新规则介绍</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <h2>规则吐槽</h2>
                    <p>在这里，你可以尽情吐槽，我们相信，您的吐槽会使队式更加完美</p>
                    <a class="uk-button uk-button-primary" href="#">进入帖子</a>
                </div>

                <div class="uk-width-medium-1-2">
                    <img width="660" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjYwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2NjAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2NjAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2NjAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yNTguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjU4LjE4NHogTTM5MC4yNDQsMjQ0LjI0N0gyNzAuNDM3di04OC40OTRoMTE5LjgwOEwzOTAuMjQ0LDI0NC4yNDcNCgkJTDM5MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI3Ni44ODEsMjM0LjcxNyAzMDEuNTcyLDIwOC43NjQgMzEwLjgyNCwyMTIuNzY4IDM0MC4wMTYsMTgxLjY4OCAzNTEuNTA1LDE5NS40MzQgDQoJCTM1Ni42ODksMTkyLjMwMyAzODQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjMwNS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                </div>
            </div>

            <hr class="uk-grid-divider">

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1">
                    <div class="uk-panel uk-panel-box uk-text-center">
                        <p>
                            <strong>Teamstyle16 欢迎你的加入</strong> 浏览完了意犹未尽？<a class="uk-button uk-button-primary uk-margin-left" href="#">回到顶部</a>
                        </p>
                    </div>
                </div>
            </div>

            <h1 class="uk-text-center">队式十六开发组</h1>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                    <a class="uk-overlay" href="#">
                        <img src="<?php echo URL;?>public/img/1.png" width="350" height="150" ></img>
                       <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">沟通连接 架起桥梁</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                     <a class="uk-overlay" href="#">
                        <img width="350" height="150" src="<?php echo URL;?>public/img/2.png" alt="">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">制定游戏规则 掌控生死存亡</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                   <a class="uk-overlay" href="#">
                        <img width="350" height="150" src="<?php echo URL;?>public/img/3.png" alt="">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">酷炫特效 3D制造</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                    <a class="uk-overlay" href="#">
                        <img width="350" height="150" src="<?php echo URL;?>public/img/4.png">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">手握服务器最高权限
                                掌握全部数据库内容</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                     <a class="uk-overlay" href="#">
                        <img width="350" height="150" src="<?php echo URL;?>public/img/5.png">
                                                 <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">蓝海之美 由此开始</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                     <a class="uk-overlay" href="#">
                        <img width="350" height="150" src="<?php echo URL;?>public/img/6.png">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">这个组太忙了没有时间写简介了</div>
                        </div>
                    </a>
                </div>
            </div>

        </div>


<div style="display:none"><script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0c44dcd3aa48076b3e0a91169a4ac665' type='text/javascript'%3E%3C/script%3E"));
</script></div>



