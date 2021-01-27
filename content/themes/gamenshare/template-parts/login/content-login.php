<?php
$redirect = home_url($path = '/');

$login  = (isset($_GET['login'])) ? $_GET['login'] : 0;

?>
<?php
if (is_user_logged_in()) :

?>

<?php
else :
?>
    <div class="mylogin">
        <?php the_title('<h1>', '</h1>');
        if ($login === "failed") {
            echo '<div class="alert alert-danger" role="alert"><strong>ERREUR:</strong> Nom d\'utilisateur et/ou mot de passe est incorrect.</div>';
        } elseif ($login === "empty") {
            echo '<div class="alert alert-danger" role="alert"><strong>ERREUR:</strong> Le champ Email et/ou le champ nom d\'utilisateur est vide.</div>';
        } elseif ($login === "false") {
            echo '<div class="alert alert-warning" role="alert">Vous êtes déconnecté.</div>';
        }
        ?>
        <form action=" <?= site_url('/wp-login.php', 'login_post') ?> " method="post">
            <div class="mb-3">
                <label for="<?= esc_attr('id_username') ?>" class="form-label">Email ou nom d'utilisateur</label>
                <input type="text" name="log" class="form-control" id="<?= esc_attr('id_username') ?>" size="20" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="<?= esc_attr('id_password') ?>" class="form-label">Mot de passe</label>
                <input type="password" name="pwd" class="form-control" id="<?= esc_attr('id_password') ?>" size="20">
            </div>
            <div class="mb-3 form-check ">
                <input type="checkbox" name="rememberme" class="form-check-input" id="<?= esc_attr('id_remember') ?>">
                <label class="form-check-label" for="<?= esc_attr('id_remember') ?>">Restez connecté</label>
            </div>
            <button type="submit" name="wp-submit" id="' <?= esc_attr('id_submit') ?> '" class="btn button-red ">connexion</button>
            <input type="hidden" name="redirect" value="<?= esc_url($redirect) ?>" />
        </form>
    </div>



<?php
endif;
?>