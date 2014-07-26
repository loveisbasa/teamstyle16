<div class="container">
    <h2>You are in the View: application/views/login/index.php (everything in this box comes from that file)</h2>
    
    <div>
        <h3>Sign In</h3>
        <form action="<?php echo URL; ?>login/login" method="post">
                <label>Username (or email)</label><br/>
                <input type="text" name="user_name" required /><br/>
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
    <!-- main content output -->
   <!--  <div>
        <h3>Amount of songs (data from second model)</h3>
        <div>
            <?php echo $amount_of_songs; ?>
        </div>
        <h3>List of songs (data from first model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Artist</td>
                <td>Track</td>
                <td>Link</td>
                <td>DELETE</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($songs as $song) { ?>
                <tr>
                    <td><?php if (isset($song->id)) echo $song->id; ?></td>
                    <td><?php if (isset($song->artist)) echo $song->artist; ?></td>
                    <td><?php if (isset($song->track)) echo $song->track; ?></td>
                    <td>
                        <?php if (isset($song->link)) { ?>
                            <a href="<?php echo $song->link; ?>"><?php echo $song->link; ?></a>
                        <?php } ?>
                    </td>
                    <td><a href="<?php echo URL . 'songs/deletesong/' . $song->id; ?>">x</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div> -->
