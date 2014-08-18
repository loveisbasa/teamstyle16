<div class="container">

    <h2>You are in the View: application/views/login/index.php (everything in this box comes from that file)</h2>
    <?php require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);?>
    <div class="col-md-3">
        <h2>Sign In</h2>
        <form class="form-signin" role="form" action="<?php echo URL; ?>login/login" method="post">
                <input type="text" name="user_nickname" class="form-control" placeholder="nickname or email" required autofocus>
                <input type="password" name="user_password" class="form-control" placeholder="Password"required ><br/>
                <label>
                    <input type="checkbox" name="user_rememberme"> Remember me
                </label><br/>
                <button type="submit" class="btn btn-lg btn-primary" >Log In</button>
        </form>
        <a href="<?php echo URL; ?>login/register">Register</a>
        |
        <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a>

    </div>
    </div>
   
