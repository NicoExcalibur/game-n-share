<?php

// security to make sure we are in a WP environnement
if (!defined('WPINC')) {
  die;
}

// creation of a POO class in order to create our custom post type
class Platform_cpt
{

    // construct fonction that will be instancied 
    public function __construct()
    {
      add_action('init', [$this, 'create_cpt']);
    }

     // declaration of the CPT
     public function create_cpt()
     {
       $labels = [
        'name'               => 'Plateforme',
        'singular_name'      => 'plateforme',
        'menu_name'          => 'Plateformes',
        'name_admin_bar'     => 'Plateformes',
        'add_new'            => 'Ajouter une plateforme',
        'add_new_item'       => 'Ajouter une nouvelle plateforme',
        'new_item'           => 'Nouvelle plateforme',
        'edit_item'          => 'Editer une plateforme',
        'view_item'          => 'Voir les plateformes',
        'all_items'          => 'Voir toutes les plateformes',
        'search_items'       => 'Rechercher une plateforme',
        'not_found'          => 'Aucune plateforme trouvée',
        'not_found_in_trash' => 'Aucune platerome trouvée dans la corbeille',
       ];
   
       $args = [
        'label' => 'Platforms',
        'labels' => $labels,
        'public' => true,
        'hierarchical' => false,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-desktop',
        'show_in_rest' => true, // display in Gutenberg editor
        'supports' => [
          'title',
          'categories',
          'editor',
          'custom-fields',
          'comments'
        ],
        'has_archive' => true,
        'rewrite' => [
           'slug' => 'platforms',
           'with_front' => true
        ]
   
       ];
       // registration of the CPT
        register_post_type('platform', $args);
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