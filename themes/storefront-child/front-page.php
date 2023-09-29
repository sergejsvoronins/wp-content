<?php get_header() ?>
<?php 
    $heroImage = get_field("hero_image");
    $homeHeader = get_field("home_header");
    $homeTextContent = get_field("home_text_content");
    $homeButton = get_field("home_button") ?>

    <section class="home-page">
        <?php 
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();?>
                        <article class="hero-image">
                            <?php if($heroImage) : ?>
                                <img src="<?php echo $heroImage["url"]?>" alt="<?php echo $heroImage["alt"]?>">
                            <?php endif; ?>
                        </article>
                        <article class="text">
                            <?php if($homeHeader) : ?>
                                <h2><?php the_field("home_header")?></h2>
                            <?php endif; ?>
                            <?php if($homeTextContent) : ?>
                                <p><?php the_field("home_text_content")?></p>
                            <?php endif; ?>
                            <?php if($homeButton) : ?>
                                <a href="<?php $homeButton["button_url"]?>">
                                    <div class="home-button"><?php echo $homeButton["button_text"]?></div>
                                </a>
                            <?php endif; ?>
                        </article>
                    <?php
                endwhile;
            endif;
        ?>

        </section>
<?php get_footer() ?>