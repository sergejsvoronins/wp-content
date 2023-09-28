<?php
/*
Template Name: Kontaktsida
*/
get_header();
?>
<section class="main-wrapper column">
    <h1><?php the_title(); ?></h1>
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
    ?>
            <section class="container__content">

                <?php the_content(); ?>
            </section>
    <?php
        endwhile;
    endif;
    ?>
</section>
<?php
get_footer(); ?>