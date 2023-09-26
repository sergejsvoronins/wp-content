
<?php
if (have_posts()) : while (have_posts()) : the_post();
?>
        <section>
            <?php the_content(); ?>
        </section>
<?php
    endwhile;
endif;
?>