<?php
/*
Template Name: Om oss-sida
*/
get_header();
?>
<h1>
    <?php the_title(); ?>
</h1>
<?php the_content(); ?>
<section class="team-section">
    <h2><?php the_field('title') ?></h2>
    <?php if (have_rows('members')) :
        while (have_rows('members')) : the_row();

            $name = get_sub_field('name');
            $description = get_sub_field('description');
            $image = get_sub_field('image');
            $link1 = get_sub_field('website-1');
            $link2 = get_sub_field('website-2');
            $link3 = get_sub_field('website-3');
            $linktitle1 = get_sub_field('link_title_1');
            $linktitle2 = get_sub_field('link_title_2');
            $linktitle3 = get_sub_field('link_title_3');
            $extra = get_sub_field('favorite');

    ?>
            <section class="team-section__container">
                <article class="team-section__container__text">
                    <?php if ($name) : ?>
                        <h4>
                            <?php echo $name; ?>
                        </h4>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <p>
                            <?php echo $description; ?>
                        <p>
                        <?php endif; ?>
                        <?php if ($extra) : ?>
                        <p>Favoritkreatör:
                            <?php echo $extra; ?>
                        <p>
                        <?php endif; ?>
                        <article>
                            <?php if ($link1) : ?>
                                <a href="<?php echo $link1; ?>"> <?php echo $linktitle1 ?></a>
                            <?php endif; ?>
                            <?php if ($link2) : ?>
                                <a href="<?php echo $link2; ?>"> <?php echo $linktitle2 ?></a>
                            <?php endif; ?>
                            <?php if ($link3) : ?>
                                <a href="<?php echo $link3; ?>"> <?php echo $linktitle3 ?></a>
                            <?php endif; ?>
                        </article>

                </article>

                <img class="team-section__container__img" src="<?php echo $image; ?>">
            </section>
    <?php
        endwhile;
    endif;
    ?>
</section>
<?php
get_footer();
