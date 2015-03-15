
<style type="text/css">
h6 {text-align:center;}
</style>
<link href="<?php echo URL; ?>public/css/docs.min.css" rel="stylesheet">

<script src="<?php echo URL;?>public/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo URL;?>public/js/bootstrap.min.js"></script>
<script src="<?php echo URL;?>public/js/jquery.leanModal.min.js"></script>
<script type="text/javascript">
$(function(){
    // $('#loginform').submit(function(e){
    //   return false;
    // });
  
  //$('#team-password').leanModal();
  $("a[rel*=leanModal]").leanModal();
});
</script>
<footer class="bs-docs-footer" role="contentinfo">
  <div class="container">
    

    <p>Designed and built with all the love in the world by 队式十六网站组</p>
		<p id="time">当前时间</p>
		<script >
function showtime()
{
	var today,hour,second,minute,year,month,date;
	var strDate ;
	today=new Date();
	var n_day = today.getDay();
	switch (n_day)
	{
		    case 0:{strDate = "星期日"	}break;
				case 1:{strDate = "星期一"	}break;
				case 2:{strDate ="星期二"		}break;
				case 3:{strDate = "星期三"	}break;
				case 4:{strDate = "星期四"}break;
				case 5:{strDate = "星期五"}break;
				case 6:{strDate = "星期六"}break;
				case 7:{strDate = "星期日"}break;
	}
	year = today.getFullYear();
	month = today.getMonth()+1;
	date = today.getDate();
	hour = today.getHours();
	minute =today.getMinutes();
	second = today.getSeconds();
	document.getElementById('time').innerHTML = year + "年" + month + "月" + date + "日" + strDate +" " + hour + ":" + minute + ":" + second; //显示时间
	setTimeout("showtime();", 1000); //设定函数自动执行时间为 1000 ms(1 s)
}
		 showtime();
</script>


    <ul class="bs-docs-footer-links muted">
      <li>当前版本： v1.2.4</li>
      <li>&middot;</li>
      <!--链接到论坛中的报名帖-->
      <li><a href="<?php echo URL;?>">关于队式</a></li>
      <li>&middot;</li>
      <!--链接到信息中的发消息贴，收件人为管理员-->
      <li><a href="<?php echo URL.'forum/threads/3';?>">平台报错</a></li>
      <li>&middot;</li>
      <li><a href="mailto:teamstyle16@gmail.com">联系我们</a></li>
      <li>&middot;</li>
    </ul>
  </div>
</footer>
</div>
</div>
</div>
</body>
</html>
