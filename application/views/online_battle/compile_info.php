<?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>

<style>
#wrap{word-break:break-all; width:780px;}
p{white-space: pre-line;}
</style>
<p id="wrap">
<?php  
				foreach ($response as $each){
					echo $each;
				  echo "<br>";
				}
?>
</p>
