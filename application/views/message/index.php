<div class="container">
 <!--使用javascript代码作为客户端接受数据-->
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
<div class="row">
    <div class="col-xs-5">
    <div class="panel panel-info">
        <div class="panel-heading" style="fontsize:18px"><?php echo $_SESSION['user_nickname'];?></div>
        <div class="panel-body">
            <p>消息列表</p>
        </div>
        <table class="table table-hover">
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td style="width:30px">From</td>
                <td style="width:100px">Title</td>
                <td style="width:100px">Date</td> 
            </tr>
            </thead>

		<tbody>
            <?php foreach ($new_message as $message) { ?>
                <tr>
                    <td><?php if (isset($message->user_nickname))  echo $message->user_nickname; ?></td>
										<td>
												<a href="<?php echo URL . 'message/is_read/' . $message->message_id; ?>">
												<?php if (isset($message->message_title))  echo $message->message_title; ?></a>
										</td>
                    <td><?php if (isset($message->message_send_date))  echo $message->message_send_date; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-info">
            <div class="panel-heading" style="fontsize:18px"></div>
            <textarea></textarea>
        </div>
    </div>
</div>
