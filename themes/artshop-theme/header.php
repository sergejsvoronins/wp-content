<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artshop</title>
    <title><?php bloginfo("name"); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <?php wp_head() ?>
    <script src="<?php echo get_template_directory_uri() . '/main.js'?>" defer type="text/javascript" ></script>
</head>

<body>
    <header>
        <h1>
            <?php bloginfo("name"); ?>
        </h1>
        <nav>
            <i class="fa-solid fa-bars menu-icon"></i>
            <?php wp_nav_menu(array('primary-nav')); ?>
        </nav>
        <?php get_search_form(); ?>

    </header>
    <main>