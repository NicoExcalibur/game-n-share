<form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
    <input type="text" name="user_login" value="Username" id="user_login" class="input" />
    <input type="text" name="user_email" value="E-Mail" id="user_email" class="input"  />
    <?php do_action('register_form'); ?>
    <input type="submit" value="Register" id="register" />
</form>


