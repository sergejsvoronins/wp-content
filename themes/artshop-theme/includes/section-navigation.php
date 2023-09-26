<nav>
    <div class="menu-icon">
        <i class="fa-solid fa-bars"></i>
    </div>
    <!-- <h1>
        <?php bloginfo("name"); ?>
    </h1> -->
    <?php wp_nav_menu(array('primary-nav')); ?>
    <div class="nav-wrapper">
        <div class="close-icon">
            <i class="fa-solid fa-xmark "></i>
        </div>
    </div>
    <?php get_search_form(); ?>
</nav>