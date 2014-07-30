<div class="container">
    <h2>You are in the View: application/views/login/index.php (everything in this box comes from that file)</h2>
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
    <div>
        <h3>Sign In</h3>
        <form action="<?php echo URL; ?>login/login" method="post">
                <label>Username (or email)</label><br/>
                <input type="text" name="user_nickname" required /><br/>
                <label>Password</label><br/>
                <input type="password" name="user_password" required /><br/>
                <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" />
                <label class="remember-me-label">Keep me logged in (for 2 weeks)</label><br/>
                <input type="submit" class="login-submit-button" />
        </form>
        <a href="<?php echo URL; ?>login/register">Register</a>
        |
        <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a>
    </div>
   
