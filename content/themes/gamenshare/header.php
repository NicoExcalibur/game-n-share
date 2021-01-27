<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    wp_body_open();
    ?>

    <div class="wrapper">
        <header class="header">
            <nav class="menu navbar navbar-dark navbar-expand-lg">
                <div class="menu__container container">
                    <a href="<?php echo home_url(); ?>" class="menu__logo nav-brand"><?php bloginfo('name'); ?></a>

                    <button class="button-search" data-bs-target="#form-search" data-bs-toggle="collapse" aria-expanded="false" aria-controls="form-search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobil" aria-controls="navbarMobil" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="menu-link collapse navbar-collapse" id="navbarMobil">

                        <?php

                        wp_nav_menu([
                            'theme_location' => 'main-menu',
                            'container'      => 'ul',
                            'menu_class' => 'navbar-nav mb-2 ms-5 ms-xm-0 mb-lg-0'
                        ]);
                        ?>
                        <?php
                        if ( is_user_logged_in() ):
                        ?>
                            <ul class="navbar-nav me-auto ms-5">
                          
                            <li class="nav-item"><a href="<?= wp_logout_url( home_url() ); ?>/" class="nav-link menu-button__item">Déconnctez-vous</a></li>
                        </ul>
                        <?php
                        else:
                        ?>
                            <ul class="navbar-nav me-auto ms-5">
                            <li class="nav-item"><a href="<?= wp_registration_url(); ?>" class="nav-link btn menu-button__item button button-red">
                                    Inscrivez-vous</a></li>
                            <li class="nav-item"><a href="<?=  home_url('/login/') ; ?>" class="nav-link menu-button__item">Connectez-vous</a></li>
                        </ul>
                            <?php
                            endif;
                            ?>
                    </div>


                    <?php get_search_form() ?>
                </div>
            </nav>
        </header>
        <main class="main">

            <section class="content container">