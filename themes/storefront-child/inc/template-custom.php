<?php
/*
Template Name: Kontaktformulär
*/
get_header();
?>


<section class="contact">
    <h1>
        <?php the_title(); ?>
    </h1>
    <article>
        <?php
        the_content();
        ?>
    </article>
</section>

<?php
get_footer();
