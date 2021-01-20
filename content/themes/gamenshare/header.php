<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


    <div class="wrapper">
        <header class="header">
            <nav class="menu navbar navbar-dark navbar-expand-lg">
                <div class="menu__container container">
                    <a href="<?php echo home_url(); ?>" class="menu__logo nav-brand"><?php bloginfo('title'); ?></a>
                
                        <button class="button-search" data-bs-target="#form-search" data-bs-toggle="collapse" aria-expanded="false" aria-controls="form-search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                       
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarMobil" aria-controls="navbarMobil"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> 
                  
                    <div class="menu-link collapse navbar-collapse" id="navbarMobil">
                        <ul class="navbar-nav mb-2 ms-5 mb-lg-0">
                            <li class="menu-link__item nav-item"><a class="nav-link" href="#">A propos</a></li>
                            <li class="menu-link__item nav-item"><a class="nav-link" href="#">Plateforme</a></li>
                            <li class="menu-link__item nav-item"><a class="nav-link" href="#">Jeux video</a></li>
                            <li class="menu-link__item nav-item"><a class="nav-link" href="#">Contact</a></li>
                        </ul>
                        <ul class="navbar-nav me-auto ms-5">
                            <li class="nav-item"><a href="#" class="nav-link btn menu-button__item button button-red">
                                    Inscrivez-vous</a></li>
                            <li class="nav-item"><a href="#" class="nav-link menu-button__item">Connectez-vous</a></li>
                        </ul>
                    </div>
               
                  
                    <?php get_search_form() ?>
                </div>
            </nav>
        </header>
        <main class="main">