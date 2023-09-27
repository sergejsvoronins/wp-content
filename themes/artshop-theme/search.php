 <!-- Styla denna sida så att menyn ligger bredvid sökresultaten -->



 <?php
    get_header(); ?>

 <section class="content-container">

     <h1 class="page-title">Sökresultat för: <?php echo get_search_query(); ?></h1>
     <?php
        if (have_posts()) : while (have_posts()) : the_post();

        ?>
             <article class="content-container__box">
                 <h2><a href="<?php the_permalink(); ?>"><?php
                                                            the_title();
                                                            ?> </a>
                 </h2>
                 <?php the_post_thumbnail() ?>
             </article>
     <?php

            endwhile;
        endif;
        ?>
 </section>
 <?php
    get_search_feed_link();
    get_footer();
