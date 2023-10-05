<?php

/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */
$heroImage = get_field("hero_image");
$homeHeader = get_field("home_header");
$homeTextContent = get_field("home_text_content");
$homeButton = get_field("home_button");

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <section class="home-page">
                    <article class="home-page__image">
                        <?php if ($heroImage) : ?>
                            <img src="<?php echo $heroImage["url"] ?>" alt="<?php echo $heroImage["alt"] ?>">
                        <?php endif; ?>
                    </article>
                    <article class="home-page__text">
                        <?php if ($homeHeader) : ?>
                            <h2><?php the_field("home_header") ?></h2>
                        <?php endif; ?>
                        <?php if ($homeTextContent) : ?>
                            <p><?php the_field("home_text_content") ?></p>
                        <?php endif; ?>
                        <?php if ($homeButton) : ?>
                            <a href="<?php $homeButton["button_url"] ?>">
                                <div class="home-button"><?php echo $homeButton["button_text"] ?></div>
                            </a>
                        <?php endif; ?>
                    </article>
                </section>
        <?php
            endwhile;
        endif;
        ?>


    </main>

    <?php
    do_action('homepage');
    ?>

</div><!-- #primary -->
<?php
get_footer();

?>