 <!-- Styla denna sida så att menyn ligger bredvid sökresultaten -->



 <?php
    get_header(); ?>

 <section class="custom-wrapper">
     <section class="content-container">

         <h1 class="page-title">Sökresultat för: <?php echo get_search_query(); ?></h1>
         <?php
            if (have_posts()) : while (have_posts()) : the_post();

            ?>
                 <article>
                     <h2><a href="<?php the_permalink(); ?>"><?php
                                                                the_title();
                                                                ?> </a>
                     </h2>
                     <div id="img-container">
                         <?php the_post_thumbnail() ?>
                     </div>
                 </article>
         <?php

                endwhile;
            endif;
            ?>
     </section>

 </section>
 <?php
    get_search_feed_link();
    get_footer();
