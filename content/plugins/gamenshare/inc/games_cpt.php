<?php

// security to make sure we are in a WP environnement
if (!defined('WPINC')) {
  die;
}

// creation of a POO class in order to create our custom post type
class Games_cpt
{

    // construct fonction that will be instencied 
    public function __construct()
    {
      add_action('init', [$this, 'create_cpt']);
      add_action('init', [$this, 'create_taxo']);
    }

     // declaration of the CPT
     public function create_cpt()
     {
       $labels = [
        'name'               => 'Jeux',
        'singular_name'      => 'jeu',
        'menu_name'          => 'Jeux',
        'name_admin_bar'     => 'game',
        'add_new'            => 'Ajouter un jeu',
        'add_new_item'       => 'Ajouter une nouveau jeu',
        'new_item'           => 'Nouveau jeu',
        'edit_item'          => 'Editer un jeu',
        'view_item'          => 'Voir le jeu',
        'all_items'          => 'Voir tout les jeux',
        'search_items'       => 'Rechercher un jeu',
        'not_found'          => 'Aucun jeu trouvé',
        'not_found_in_trash' => 'Aucun jeu trouvé dans la corbeille',
       ];
   
       $args = [
        'label' => 'Games',
        'labels' => $labels,
        'public' => true,
        'hierarchical' => false,
        'show_in_rest' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-games',
        'supports' => [
          'title',
          'categories',
          'editor',
          'excerpt',
          'thumbnail',
          'custom-fields'
        ],
        'has_archive' => true,
        'rewrite' => [
           'slug' => 'games',
           'with_front' => true
        ]
   
       ];
       // registration of the CPT
        register_post_type('game', $args);
    }

      // for each activation and deactivation, we rewrite the url rules
    public function activation()
    {
        $this->create_cpt();

        flush_rewrite_rules();
    }

    public function deactivation()
    {
        flush_rewrite_rules();
    }


}