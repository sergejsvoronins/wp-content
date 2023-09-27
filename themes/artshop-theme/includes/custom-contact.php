<?php
/*
Template Name: Kontaktsida
*/
get_header();
?>
<section class="main-wrapper column">
    <h1><?php the_title(); ?></h1>
    <p>hihihihi tiss tiss</p>
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
    ?>
            <section class="container__content">

                <?php the_content(); ?>
            </section>
            <p>Här kan vi se att det är denna sida </p>
    <?php
        endwhile;
    endif;
    ?>
</section>
<?php
get_footer(); ?>