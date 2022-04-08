<!doctype html>
<!--[if lt IE 7]>      <html lang=”en” class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang=”en” class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang=”en” class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang ”en” class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/favicon/site.webmanifest">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header data-class="header" class="header">
        <?php echo get_template_part('template-parts/tpl', 'header') ?>
    </header>