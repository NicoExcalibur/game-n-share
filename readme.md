# Installation du projet avec Composer
1. Cloner le repo
2. Télécharger WordPress, ses extensions, ses thèmes avec la commande `composer install`
3. Créer la base de données et le user spécifique à cette BDD
4. Créer le fichier `wp-config.php` (copie de `wp-config-sample.php`) et le compléter :
    - Les infos de connexion à la BDD
    - Les clés de salage (https://api.wordpress.org/secret-key/1.1/salt/)
    - L'URL de la home (`define( 'WP_HOME', rtrim('put_your_home_url_here', '/'));`)
    - La constante `WP_DEBUG` à `true`
    - Décommenter l'environnement souhaité (`development`, `staging`, `production`)
5. Modifier les droits des répertoires / fichiers avec les commandes suivantes (`<user>` est à remplacer par votre user):
    ```
    sudo chown -R <user>:www-data .
    sudo find . -type f -exec chmod 664 {} +
    sudo find . -type d -exec chmod 775 {} +
    sudo chmod 644 .htaccess    
    ```
6. Installer WordPress :tada:
