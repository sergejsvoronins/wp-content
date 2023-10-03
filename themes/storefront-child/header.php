<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <?php do_action('storefront_before_site'); ?>


    <div id="page" class="hfeed site">
        <?php do_action('storefront_before_header'); ?>

        <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
            <img class="img-header" src="<?php get_template_directory_uri() ?>/wordpress-artshop/wp-content/themes/storefront-child/assets/kvist.svg" alt="Geometrisk form">

            <?php
            do_action('storefront_header');
            ?>
            <!-- <img class="img-icon" src="<?php get_template_directory_uri() ?>/e-commerce/wp-content/themes/storefront-child/assets/sun.svg" alt="Geometrisk form"> -->


            <?php
            do_action('storefront_before_content');
            ?>
        </header>
        <div id="content" class="site-content" tabindex="-1">
            <div class="col-full">

                <?php
                do_action('storefront_content_top');
                ?>
                <main id="main" class="site-main" role="main">