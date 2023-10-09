<?php

/**
 * The template for displaying the homepage.
 *
 * Template name: Homepage
 *
 */
$heroImage = get_field("hero_image");
$homeHeader = get_field("home_header");
$homeTextContent = get_field("home_text_content");
$homeButton = get_field("home_button");

get_header(); ?>


<main id="main" class="site-main" role="main">
    <div id="primary" class="content-area">
        <section class="home-page">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>

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

            <?php
                endwhile;
            endif;
            ?>
        </section>
    </div>
    <!-- <?php
            // do_action('homepage');
            ?> -->
    <div class="home-section">
        <?php if (have_rows("page_section")) : ?>
            <?php while (have_rows("page_section")) : the_row(); ?>


                <?php if (get_row_layout() == 'section_columns') :
                    $title = get_sub_field('title');
                    $content = get_sub_field('content');
                    $image = get_sub_field('image');
                    // echo print_r($image);
                    $link = get_sub_field('link');
                    $side_value = get_sub_field('image_placement');
                    $side_labels = array(
                        'left' => 'Vänster',
                        'right' => 'Höger'
                    );

                    // Hämta etiketten baserat på det sparade värdet.
                    $side_label = isset($side_labels[$side_value]) ? $side_labels[$side_value] : '';

                ?>
                    <h3 class="home-section__title"> <?php echo $title ?> </h3>
                    <article class="home-section__box">


                        <?php if ($side_value == 'left') : ?>

                            <div>
                                <img src="<?php echo get_sub_field('image'); ?> ">

                            </div>
                            <div>
                                <p><?php echo $content ?></p>

                            </div>

                        <?php else : ?>
                            <div>
                                <p style="color: 000;"><?php echo $content ?></p>
                            </div>
                            <div>
                                <img src="<?php echo $image ?> ">

                            </div>

                        <?php endif; ?>
                    </article>
                <?php endif; ?>


            <?php endwhile; ?>

        <?php endif; ?>
    </div>
</main>


<?php
get_footer();

?>