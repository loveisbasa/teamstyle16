<div class="container">
    <h2>You are in the View: application/views/team/index.php (everything in this box comes from that file)</h2>
 <!--使用javascript代码作为客户端接受数据-->
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
    <div>
    <h3>Messages</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>From</td>
                <td>Title</td>
                <td>Content</td>
                <td>Date</td>
            </tr>
            </thead>

		<tbody>
            <?php foreach ($message_success as $message) { ?>
                <tr>
                    <td><?php if (isset($message->user_nickname))  echo $message->user_nickname; ?></td>
										<td>
										<a href="<?php echo URL. "message/is_read?message_id=$message->message_id"?>">
												<?php if (isset($message->message_title))  echo $message->message_title; ?></a>
										</td>
                    <td><?php if (isset($message->message_content))  echo $message->message_content; ?></td>
                    <td><?php if (isset($message->message_send_date))  echo $message->message_send_date; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
