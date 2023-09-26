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
            <h1>
                <?php bloginfo("name"); ?>
            </h1>
            <?php wp_nav_menu("primary_menu"); ?>
            <?php get_search_form();
            wp_nav_menu(array(
                'theme_location' => 'responsive-menu',
                'menu_id' => 'responsive-menu',
                'container' => 'div',
                'container_class' => 'responsive-menu',
                'menu_class' => 'responsive-menu-list',
            ));
            ?>

        </nav>


    </header>
    <main>