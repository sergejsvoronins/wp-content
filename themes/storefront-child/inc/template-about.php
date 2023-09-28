<?php
/*
Template Name: Om oss-sida
*/
get_header();
?>
<h1>
    <?php the_title(); ?>
</h1>
<?php the_content(); ?>
<section>
    <h2><?php the_field('title') ?></h2>
    <?php if (have_rows('members')) :
        while (have_rows('members')) : the_row();
    ?>
            <section>
                <h4>
                    <?php the_sub_field('name'); ?>
                </h4>
                <p>
                    <?php the_sub_field('description') ?>
                <p>
                    <img src="<?php the_sub_field('image') ?>">
            </section>
    <?php
        endwhile;
    endif;
    ?>

</section>
<?php
get_footer();
