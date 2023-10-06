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

    <?php if (have_rows("page_section")) : ?>
        <?php while (have_rows("page_section")) : the_row(); ?>

            <!-- <section class="content-area" style="color:black;">

                <?php if (get_row_layout('section_columns')) :
                    $columns = get_sub_field("section_columns");
                    $side_value = get_sub_field("image_placement");
                    $side_labels = array(
                        'left' => 'Vänster',
                        'right' => 'Höger'
                    );

                    // Hämta etiketten baserat på det sparade värdet.
                    $side_label = isset($side_labels[$side_value]) ? $side_labels[$side_value] : '';

                    print_r($columns);
                    foreach ($columns as $column) :

                ?>
                        <div id="primary" class="content-area">
                            <article class="content-page">
                                <h3><?php echo $column['title']; ?></h3>
                                <article>
                                    <?php if ($side_value === 'left') : ?>
                                        <article class="content-page__left">
                                            <img class="content-page__left__img" src="<?php $column['image'] ?>">
                                            <article class="content-page__left__content">
                                                <p><?php echo $column['content'] ?></p>
                                                <a href="<?php echo $columns['link'] ?>">Ta reda på mer!</a>
                                            </article>
                                        </article>
                                    <?php else : ?>
                                        <article class="content-page__right">
                                            <article class="content-page__right__content">
                                                <p><?php echo $column['content'] ?></p>
                                                <a href="<?php echo $columns['link'] ?>">Ta reda på mooorr!</a>
                                            </article>
                                            <img class="content-page__right__img" src="<?php echo $column['image'] ?>">
                                        </article>
                                    <?php endif; ?>
                                </article>
                        </div>

                    <?php endforeach ?>
                <?php endif; ?>
            </section> -->

            <?php if (get_row_layout('section_columns')) :
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $image = get_sub_field('image');
                // echo print_r($image);
                $link = get_sub_field('link');
                $side = get_sub_field('image_placement');
            ?>
                <article style="width: 100%; display: flex;">

                    <?php if ($side == 'left') : ?>

                        <div style="width: 45%;">
                            <img src="<?php get_sub_field('image'); ?> ">

                        </div>
                        <div style="width: 45%;">
                            <p><?php $content ?></p>

                        </div>

                    <?php else : ?>
                        <div style="width: 45%;">
                            <p><?php $content ?></p>
                        </div>
                        <div style="width: 45%;">
                            <img src="<?php $image ?> ">

                        </div>

                    <?php endif; ?>
                </article>
            <?php endif; ?>


        <?php endwhile; ?>

    <?php endif; ?>
</main>


<?php
get_footer();

?>