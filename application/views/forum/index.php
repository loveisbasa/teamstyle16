<link rel='stylesheet' href="<?php echo URL; ?>public/css/uikit.css">

<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-vertical-align uk-text-center" style="background: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMTEzMHB4IiBoZWlnaHQ9IjQ1MHB4IiB2aWV3Qm94PSIwIDAgMTEzMCA0NTAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDExMzAgNDUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIxMTMwIiBoZWlnaHQ9IjQ1MCIvPg0KPC9zdmc+DQo=') 50% 0 no-repeat; height: 450px;">
                <div class="uk-vertical-align-middle uk-width-1-2">
                    <h1 class="uk-heading-large">Teamstyle16 深蓝</h1>
                    <p class="uk-text-large">寻找队（da）友（tui）规则讨（tu）论（cao）</p>
                    <p>
                        <a class="uk-button uk-button-primary uk-button-large" href="#">Button</a>
                        <a class="uk-button uk-button-large" href="#">Button</a>
                    </p>
                </div>
            </div>

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
                            <p style="fontsize:90px;text-indent:1cm"><?php echo $forums->intro; ?></p>
                            <p class="uk-article-meta"><?php echo "发帖 " . $forums->count_thread . "  回复" . $forums->count_post?>
                            <?php echo "最新回复于" . $forums->latest_reply; ?></p> 
                        </br>
                        </div>
                    </div>
                </div>
            <?php }?>
            </div> 
        </div>
        <hr class="uk-grid-divider">
<div class="container">
<?php 
        if($_SESSION['user_type']=='admin')
            include 'create_forum.php';
?>
</div>

</div>


       <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

<!--            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-cog uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3">Sample Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>

                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-thumbs-o-up uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3">Sample Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>

                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-cloud-download uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3">Sample Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-dashboard uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3">Sample Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>

                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-comments uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3">Sample Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>

                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-briefcase uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3">Sample Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>-->

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
                    <a class="uk-button uk-button-primary" href="#">Button</a>
                </div>

            </div>

            <hr class="uk-grid-divider">

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <h1>【队式十六】最新规则介绍</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <h2>规则吐槽</h2>
                    <p>在这里，你可以尽情吐槽，我们相信，您的吐槽会使队式更加完美</p>
                    <a class="uk-button uk-button-primary" href="#">Button</a>
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
                            <strong>Teamstyle16 欢迎你的加入</strong> 
                            浏览完了意犹未尽？
                            <a class="uk-button uk-button-primary uk-margin-left" href="#">回到顶部</a>
                        </p>
                    </div>
                </div>
            </div>

            <h1 class="uk-text-center">队式十六开发组</h1>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                    <a class="uk-overlay" href="#">
                        <img width="350" height="150" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                       <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">网站组</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                     <a class="uk-overlay" href="#">
                        <img width="350" height="150" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">逻辑组</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                   <a class="uk-overlay" href="#">
                        <img width="350" height="150" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">平台组</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                    <a class="uk-overlay" href="#">
                        <img width="350" height="150" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">美工组</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                     <a class="uk-overlay" href="#">
                        <img width="350" height="150" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                         <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">3D组</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                     <a class="uk-overlay" href="#">
                        <img width="350" height="150" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">界面组</div>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
                <ul class="uk-nav uk-nav-offcanvas">
                    <li class="uk-active">
                        <a href="layouts_frontpage.html">Frontpage</a>
                    </li>
                    <li>
                        <a href="layouts_portfolio.html">Portfolio</a>
                    </li>
                    <li>
                        <a href="layouts_blog.html">Blog</a>
                    </li>
                    <li>
                        <a href="layouts_documentation.html">Documentation</a>
                    </li>
                    <li>
                        <a href="layouts_contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="layouts_login.html">Login</a>
                    </li>
                </ul>
            </div>
        </div>

<div style="display:none"><script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0c44dcd3aa48076b3e0a91169a4ac665' type='text/javascript'%3E%3C/script%3E"));
</script></div>



