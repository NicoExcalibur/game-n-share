<?php the_title('<h1>', '</h1>'); ?>

<form class="mylogin d-flex flex-column" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Nom d'utilisateur</label>
        <input class="form-control" type="text" name="user_login" placeholder="Nom d'utilisateur" id="user_login" class="input"/>
    </div>
    <div class="mb-3">
        <label class="form-label">Adresse E-mail</label>
        <input class="form-control" type="email" name="user_email" placeholder="E-mail" id="user_email" class="input"/>
        <div id="emailHelp" class="form-text">Nous ne partageons pas votre adresse avec des tiers.</div>
    </div>
    <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input class="form-control" type="password" name="user_pass" placeholder="Mot de passe" id="user_pass" class="input" />
    </div>
    <?php do_action('register_form'); ?>
    <div>
        <input class="btn button-red" type="submit" value="Inscription" id="register"/>
    </div>
</form>


