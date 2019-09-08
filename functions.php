<?php

// THEME PATH AND URL
define('BEN_THEME_URL', get_template_directory_uri());
define('BEN_THEME_PATH',get_template_directory());


add_action('after_setup_theme', 'ben_after_setup_theme' );
function ben_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'primary-menu' => __( 'Primary', 'bentheme' ),
        'footer-menu' => __( 'Footer', 'bentheme' ),
        'mobile' => __( 'Mobile', 'bentheme' )
    ) );
}



add_action( 'widgets_init', 'ben_register_sidebars' );
function ben_register_sidebars() {
    
    // Default sidebar
    register_sidebar( array(
        'name' => __('Sidebar', 'bentheme'),
        'description'   => __( 'Default sidebar.', 'bentheme' ),
        'id' => 'sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
	register_sidebar( array(
        'name' => __('Sidebar1', 'bentheme'),
        'description'   => __( 'Default sidebar.', 'bentheme' ),
        'id' => 'sidebar1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

add_action('wp_enqueue_scripts','ben_add_css',999);
function ben_add_css() {
    wp_enqueue_style('ben_style',get_stylesheet_uri());
    wp_enqueue_style('google-font','//fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap');
    wp_enqueue_style('font-awsome','//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css');
    wp_enqueue_style('swiper','//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css');
    wp_enqueue_style('main_css',BEN_THEME_URL.'/css/main.css');
}


add_action('wp_enqueue_scripts','ben_add_scripts');
function ben_add_scripts() {
    wp_enqueue_script('swiper','//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js',[],'1.0.0', false);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script( 'comment-reply' );
	}
}

