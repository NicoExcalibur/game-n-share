# Installation de WordPress avec Composer
1. Cloner le repo
2. Renommer le repertoire cloné (`sudo mv WP-Install-Composer MonProjet`)
3. Rentrer dans le repertoire et supprimer le `.git` avec `sudo rm -R .git`
4. Réinitialiser un repo (si besoin)
5. Télécharger WordPress, ses extensions, ses thèmes avec la commande `composer install`
6. Créer la base de données et le user spécifique à cette BDD
7. Créer le fichier `wp-config.php` (copie de `wp-config-sample.php`) et le compléter :
    - Les infos de connexion à la BDD
    - Les clés de salage (https://api.wordpress.org/secret-key/1.1/salt/)
    - L'URL de la home (`define( 'WP_HOME', rtrim('put_your_home_url_here', '/'));`)
    - La constante `WP_DEBUG` à `true`
    - Décommenter l'environnement souhaité (`development`, `staging`, `production`)
8. Modifier les droits des répertoires / fichiers avec les commandes suivantes (`<user>` est à remplacer par votre user):
    ```
    sudo chown -R <user>:www-data .
    sudo find . -type f -exec chmod 664 {} +
    sudo find . -type d -exec chmod 775 {} +
    sudo chmod 644 .htaccess    
    ```
9. Installer WordPress :tada:
