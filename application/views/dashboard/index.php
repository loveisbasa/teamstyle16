<div class="container">
    <h1>Dashboard</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>

    <h3><?php echo 'Welcome ' .$_SESSION['user_nickname']. '!'?></h3>
    <ul>
        <li><a href="<?php echo URL. 'login/logout'; ?>">Log out</a></li>
    </ul>
    You can protect a whole section in your app within the according controller (here: controllers/dashboard.php)
    by placing <span style='font-style: italic;'>Auth::handleLogin();</span> into the constructor.
</div>