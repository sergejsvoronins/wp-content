<?php
/*
Template Name: Fysiska butiker
*/
get_header();
?>

<section>
    <h1>
        <?php the_title(); ?>
    </h1>
    <?php the_content(); ?>
    <h2><?php the_field('store_title') ?></h2>
    <?php if (have_rows('stores')) :
        while (have_rows('stores')) : the_row(); ?>
            <section class="store-wrapper">
                <article>
                    <p>
                        <?php the_sub_field('store_adress'); ?>
                    </p>

                    <span>
                        <?php the_sub_field('store_zip') ?>
                    </span>
                    <span>
                        <?php the_sub_field('store_city') ?>
                    </span>
                </article>
                <img src="<?php the_sub_field('store_image') ?>">
            </section>
    <?php
        endwhile;
    endif;
    ?>
    <div>
        <img src="<?php the_field('poster'); ?>">

    </div>

</section>


<?php
get_footer();
