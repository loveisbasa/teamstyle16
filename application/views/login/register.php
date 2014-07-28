<div class="container">
    <h2>You are in the View: application/views/login/register.php (everything in this box comes from that file)</h2>
    
    <div>
        <h3>Create your personal account</h3>
        <form action="<?php echo URL; ?>login/register" method="post">
                <label>Nickname</label><br/>
                <input type="text" name="user_nickname" required /><br/>
                <label>Password</label><br/>
                <input type="password" name="user_password_new" required /><br/>
                <label>Confirm your password</label><br/>
                <input type="password" name="user_password_repeat" required /><br/>
                <label>Email address</label><br/>
                <input type="text" name="user_email" required /><br/>
                <label>Real name</label><br/>
                <input type="text" name="user_real_name" required/><br/>
                <label>Phone number</label><br/>
                <input type="text" name="user_phone" required/><br/>
                <label>Class</label><br/>
                <input type="text" name="user_class" required/><br/>
                <input type="submit" class="login-submit-button" value="sign up" />
        </form>
    </div>

   <!--   <div class="int">
    <label for="username">用户名  :</label><input type="text" name="username"/><br/></div>
    <div class="int"><label for="key">密码   :</label><input type="password" name="password"/></div>
    <div class="int">
        <label for="makesure">
            确认密码:</label><input type="password" name="confirm"/>
    </div> -->

   