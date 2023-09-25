<?php
get_header();
?>
<section>
    <h1><?php the_title(); ?></h1>
    <?php if (have_posts()) : the_post(); ?>
        <div>
            <?php the_post_thumbnail() ?>
        </div>
    <?php
    endif;
    ?>

    <article>
        <?php
        the_content();
        ?>
    </article>
    <?php comments_template(); ?>
</section>
<?php
get_footer();
