<!doctype html>
<!--[if lt IE 7]>      <html lang=”en” class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang=”en” class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang=”en” class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang ”en” class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
        <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header data-class="header" class="header">
            <div class="container">
                <div class="logo-container">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img class="logo" src="<?php echo IMAGES; ?>/logo.png" alt="">
                    </a>
                </div>
                <nav class="primaryNav__container">
                <?php
                $primaryNav = array(
                    'menu'            => 'Primary Navigation',
                    'theme_location'  => 'main_nav',
                    'menu_class'      => 'primaryNav',
                    'container'       => false,
                    // 'walker' => new Mobile_Walker()
                );
                wp_nav_menu( $primaryNav );
                ?>
                </nav>
            </div>
        </header>
