<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artshop</title>
    <title><?php bloginfo("name"); ?></title>
    <?php wp_head() ?>
</head>

<body>
    <header>
        <nav>
            <?php wp_nav_menu("primary_menu"); ?>
            <?php get_search_form(); ?>
        </nav>
        <h1>
            <?php bloginfo("name"); ?>
        </h1>
    </header>
    <main>