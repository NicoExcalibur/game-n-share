<?php

// function to fix visual bugs on acf display
function css_custom_acf()
{
    echo '<style>
            .editor{
                margin-bottom: 1em!important;
            }
         </style>';
}
add_action('admin_head', 'css_custom_acf');