<?php
function load_css()
{
    wp_register_style('css', get_template_directory_uri() . "/style.css", array(), false, 'all');
    wp_enqueue_style('css');
}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    wp_register_script('js', get_template_directory_uri() . '/main.js', array(), '1.0.0', true);
    wp_enqueue_script('js');
}
add_action('wp_enqueue_scripts', 'load_js');

// register_nav_menus(array(
//     "primary_menu" => "Huvudmeny", 
//     "sub_menu" => "Undermeny", 
//     "footer_menu" => "Footermeny"
// ));
register_nav_menus(array(
    "primary_menu" => array(
        "theme_location" => "Huvudmeny",
        "menu_class" => "my-primary-menu",
    ),
    "sub_menu" => "Undermeny", 
    "footer_menu" => "Footermeny"
));

add_theme_support(
    'post-formats',
    array(
        'link',
        'aside',
        'gallery',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat',
    )
);
add_theme_support('responsive-embeds');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support(
    'html5',
    array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    )
);
$bg_defaults = array(
    'default-image'          => '',
    'default-preset'         => 'default',
    'default-size'           => 'cover',
    'default-repeat'         => 'no-repeat',
    'default-attachment'     => 'scroll',
);

// Custom background color
add_theme_support(
    'custom-background',
    array(
        'default-color' => 'd1e4dd',  $bg_defaults
    )
);
function theme_register_widget_areas()
{
    $widget_areas = array(
        array(
            'name' => 'Sidebar Widget Area',
            'id' => 'sidebar-widget-area',
            'description' => 'This is the primary sidebar widget area.',
            'before_widget' => '<div class="sub-sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ),
        array(
            'name' => 'Footer Widget Area',
            'id' => 'footer-widget-area',
            'description' => 'This is the footer widget area.',
            'before_widget' => '<div class="sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ),
        array(
            'name' => 'Orientering',
            'id' => 'orientation',
            'description' => 'Dethär är sidomenyn för kategori, författare och arkivinsidan.',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ),
        array(
            'name'          => __('Sidomeny', 'text-domain'),
            'id'            => 'custom-sidebar',
            'description'   => __('Detta widget-område visas på de fyra anpassade sidorna.', 'text-domain'),
            'before_widget' => '<div id="sub-menu">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ),
        // Lägg till fler widget-områden här om du behöver.
    );

    foreach ($widget_areas as $widget_area) {
        register_sidebar($widget_area);
    }
}
add_action('widgets_init', 'theme_register_widget_areas');

add_filter('show_admin_bar', '__return_false');


