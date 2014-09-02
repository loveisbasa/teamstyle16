<div class="container">
 <!--使用javascript代码作为客户端接受数据-->
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
    <div>
    <h3>Forums</h3>
            <?php foreach ($forums) { ?>
						<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="http://59.66.142.231/team/create_team">Create a team</a></li>
                    <li><a href="http://59.66.142.231/team/team_display">Show all teams</a></li>
                </ul>
            </div>
          </div>
                <tr>
                    <td><?php if (isset($message->user_nickname))  echo $message->user_nickname; ?></td>
										<td>
										<a href="<?php if(message_is_read!=1) echo URL . 'message/is_read/' . $message->message_id;?>">
												<?php if (isset($message->message_title))  echo $message->message_title; ?></a>
										</td>
                    <td><?php if (isset($message->message_content))  echo $message->message_content; ?></td>
                    <td><?php if (isset($message->message_send_date))  echo $message->message_send_date; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

