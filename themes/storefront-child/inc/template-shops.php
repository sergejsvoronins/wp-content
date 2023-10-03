<?php
/*
Template Name: Fysiska butiker
*/
get_header();
?>

<section>
    <h1>
        <?php the_title(); ?>
    </h1>
    <div class="news">
<?php
query_posts(array(
'post_type' => 'news'
)); ?>
 
<?php
while (have_posts()) : the_post(); ?>
 
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<p><?php the_content(); ?></p>
<?php
endwhile; ?>
 
</div>
</section>


<?php
get_footer();