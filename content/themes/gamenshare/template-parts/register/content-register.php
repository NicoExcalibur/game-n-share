<form class="mylogin" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
    <input type="text" name="user_login" placeholder="Nom d'utilisateur" id="user_login" class="input" />
    <input type="email" name="user_email" placeholder="E-mail" id="user_email" class="input"  />
    <input type="password" name="user_pass" placeholder="Mot de passe" id="user_pass" class="input" />
    <?php do_action('register_form'); ?>
    <input class="btn button-red" type="submit" value="Inscription" id="register" />
</form>


