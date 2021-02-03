<?php
// Inclusion de nos enqueues
require 'inc/enqueues.php';
require 'inc/theme-setup.php';
require 'inc/menu-class.php';
require 'inc/filter-games.php';
require 'inc/login.php';
require 'inc/custom-comment.php';
//require 'inc/star-rating.php';

function css_custom_acf()
{
    echo '<style>
            .editor{
                margin-bottom: 1em!important;
            }
         </style>';
}
add_action('admin_head', 'css_custom_acf');

