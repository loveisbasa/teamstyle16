<div class="container">
    <h2>You are in the View: application/views/team/index.php (everything in this box comes from that file)</h2>
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
    <div>
        <h3>Teamwork</h3>
        <a href="<?php echo URL; ?>team/jointeam">Join</a>
        |
        <a href="<?php echo URL; ?>team/createam">Create</a>
    </div>