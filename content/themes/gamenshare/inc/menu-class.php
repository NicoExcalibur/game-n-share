
<?php


if (!function_exists('gamenshare_menu_class')) {
    function gamenshare_menu_class($classe, $item, $args)
    {
        // On ajoute dans le tableau des classes pour le menu du footer
        if ($args->theme_location === 'main-menu') {
            $classes[] = "nav-item";
        } elseif ($args->theme_location === 'footer') {
            $classes[] = "nav-item";
        } elseif ($args->theme_location === 'social') {
            $classes[] = "nav-item";
        }
    
        return $classes;
    }
}

// Ajout d'un filtre au Hook 'nav_menu_css_class'
add_filter( 'nav_menu_css_class', 'gamenshare_menu_class', 10, 3);

if (!function_exists('gamenshare_nav_a_css')) {
    function gamenshare_nav_a_css($attributes, $item, $args)
    {
        // On ajoute dans le tableau des attributs de la balise <a> pour le menu du haut seulement
        if ($args->theme_location === 'main-menu') {
            $attributes['class'] = "nav-link";
        } elseif ($args->theme_location === 'footer') {
            $attributes['class'] = "nav-link";
        } elseif ($args->theme_location === 'social') {
            $attributes['class'] = "nav-link";
        }
 
 
        return $attributes;
    }
}
// Ajout d'un filtre au Hook 'nav_menu_link_attributes'
add_filter( 'nav_menu_link_attributes', 'gamenshare_nav_a_css', 10, 3);