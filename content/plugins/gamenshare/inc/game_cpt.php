<?php

// security to make sure we are in a WP environnement
if (!defined('WPINC')) {
  die;
}

// creation of a POO class in order to create our custom post type
class Game_cpt
{

    // construct fonction that will be instancied 
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
        'name_admin_bar'     => 'Jeux',
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
        'show_in_nav_menus' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-games',
        'show_in_rest' => true,// display in Gutenberg editor
        'supports' => [
          'title',
          'categories',
          'editor',
          'custom-fields',
          'comments'
        ],
        'has_archive' => true,
        'rewrite' => [
          'slug' => 'jeux-video',
          'with_front' => true
        ]
      ];
       // registration of the CPT
        register_post_type('game', $args);
    }

    public function create_taxo()
    {
      $labels = [
        'name'                       => 'Genres',
        'singular_name'              => 'Genre',
        'menu_name'                  => 'Genres',
        'all_items'                  => 'Tout les genres',
        'new_item_name'              => 'Nouveau genre',
        'add_new_item'               => 'Ajouter un genre',
        'update_item'                => 'Mettre à jour un genre',
        'edit_item'                  => 'Editer un genre',
        'view_item'                  => 'Voir tout les genres',
        'separate_items_with_commas' => 'Séparer les genres avec une virgule',
        'add_or_remove_items'        => 'Ajouter ou supprimer un genre',
        'choose_from_most_used'      => 'Choisir parmis les genres les plus utilisées',
        'popular_items'              => 'Genres populaires',
        'search_items'               => 'Rechercher un genre',
        'not_found'                  => 'Aucun genre trouvé',
        'items_list'                 => 'Lister les genres',
      ];

      $args = [
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,// display in Gutenberg editor
        'rewrite'           => [ 'slug' => 'genre' ],
        'rest_base'         => 'game_genre',
        'show_in_nav_menus' => true
      ];

      register_taxonomy('genre','game', $args);

    }

      // for each activation and deactivation, we rewrite the url rules
    public function activation()
    {
        $this->create_cpt();
        $this->create_taxo();

        flush_rewrite_rules();
    }

    public function deactivation()
    {
        flush_rewrite_rules();
    }


}