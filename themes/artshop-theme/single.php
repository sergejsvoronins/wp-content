<?php
get_header();
?>
<section>
    <h1><?php the_title(); ?></h1>
    <div>
        <?php the_post_thumbnail() ?>
    </div>

    <article>
        <?php
        the_content();
        ?>
    </article>
    <?php comments_template(); ?>
</section>
<?php
get_footer();
