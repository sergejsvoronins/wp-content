<?php
/*
Template Name: Kontaktformulär
*/
get_header();
?>


<section>
    <h1>
        <?php the_title(); ?>
    </h1>
    <article style="max-width:400px">
        <?php
        the_content();
        ?>
    </article>
</section>

<?php
get_footer();
