<?php get_header(); ?>

<h1>
    <?php the_title(); ?>
</h1>

<?php get_template_part("includes", "content") ?>

<!-- <?php
        if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <section>
            <?php the_content(); ?>
        </section>
<?php
            endwhile;
        endif;
?> -->
<?php get_footer(); ?>