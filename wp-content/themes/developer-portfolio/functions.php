<?php
/**
 * Developer Portfolio Theme Functions
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function developer_portfolio_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');

    // Register navigation menus
    register_nav_menus(array(
        'primary'   => __('Primary Menu', 'developer-portfolio'),
        'footer'    => __('Footer Menu', 'developer-portfolio'),
    ));

    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }

    // Load textdomain
    load_theme_textdomain('developer-portfolio', get_template_directory() . '/languages');

    // Add image sizes
    add_image_size('portfolio-thumb', 600, 400, true);
    add_image_size('portfolio-large', 1200, 800, true);
}
add_action('after_setup_theme', 'developer_portfolio_setup');

/**
 * Enqueue scripts and styles
 */
function developer_portfolio_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'developer-portfolio-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'developer-portfolio-style',
        get_stylesheet_uri(),
        array('developer-portfolio-fonts'),
        wp_get_theme()->get('Version')
    );

    // Main JavaScript
    wp_enqueue_script(
        'developer-portfolio-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'developer_portfolio_scripts');

/**
 * Register widget areas
 */
function developer_portfolio_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'developer-portfolio'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'developer-portfolio'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'developer-portfolio'),
        'id'            => 'footer-1',
        'description'   => __('Footer widget area 1.', 'developer-portfolio'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer__title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'developer-portfolio'),
        'id'            => 'footer-2',
        'description'   => __('Footer widget area 2.', 'developer-portfolio'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer__title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'developer-portfolio'),
        'id'            => 'footer-3',
        'description'   => __('Footer widget area 3.', 'developer-portfolio'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer__title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'developer_portfolio_widgets_init');

/**
 * Register Portfolio Custom Post Type
 */
function developer_portfolio_register_portfolio_cpt() {
    $labels = array(
        'name'               => __('Portfolio', 'developer-portfolio'),
        'singular_name'      => __('Portfolio Item', 'developer-portfolio'),
        'menu_name'          => __('Portfolio', 'developer-portfolio'),
        'add_new'            => __('Add New', 'developer-portfolio'),
        'add_new_item'       => __('Add New Portfolio Item', 'developer-portfolio'),
        'edit_item'          => __('Edit Portfolio Item', 'developer-portfolio'),
        'new_item'           => __('New Portfolio Item', 'developer-portfolio'),
        'view_item'          => __('View Portfolio Item', 'developer-portfolio'),
        'search_items'       => __('Search Portfolio', 'developer-portfolio'),
        'not_found'          => __('No portfolio items found', 'developer-portfolio'),
        'not_found_in_trash' => __('No portfolio items found in Trash', 'developer-portfolio'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'portfolio'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    );

    register_post_type('portfolio', $args);

    // Register Portfolio Category Taxonomy
    $tax_labels = array(
        'name'              => __('Portfolio Categories', 'developer-portfolio'),
        'singular_name'     => __('Portfolio Category', 'developer-portfolio'),
        'search_items'      => __('Search Categories', 'developer-portfolio'),
        'all_items'         => __('All Categories', 'developer-portfolio'),
        'edit_item'         => __('Edit Category', 'developer-portfolio'),
        'update_item'       => __('Update Category', 'developer-portfolio'),
        'add_new_item'      => __('Add New Category', 'developer-portfolio'),
        'new_item_name'     => __('New Category Name', 'developer-portfolio'),
        'menu_name'         => __('Categories', 'developer-portfolio'),
    );

    register_taxonomy('portfolio_category', 'portfolio', array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-category'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'developer_portfolio_register_portfolio_cpt');

/**
 * Custom Walker for Primary Navigation
 */
class Developer_Portfolio_Nav_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'main-nav__item';

        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        $atts['class']  = 'main-nav__link';

        if ($item->current) {
            $atts['class'] .= ' main-nav__link--active';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $output .= '<a' . $attributes . '>';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
    }
}

/**
 * Customizer settings
 */
function developer_portfolio_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero Section', 'developer-portfolio'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default'           => 'WordPress Developer',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'developer-portfolio'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => '高品質なWordPressサイトを制作します',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'developer-portfolio'),
        'section' => 'hero_section',
        'type'    => 'textarea',
    ));

    // Contact Section
    $wp_customize->add_section('contact_section', array(
        'title'    => __('Contact Information', 'developer-portfolio'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('contact_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label'   => __('Email Address', 'developer-portfolio'),
        'section' => 'contact_section',
        'type'    => 'email',
    ));

    // Social Links
    $wp_customize->add_section('social_section', array(
        'title'    => __('Social Links', 'developer-portfolio'),
        'priority' => 50,
    ));

    $social_platforms = array('twitter', 'github', 'linkedin', 'instagram');

    foreach ($social_platforms as $platform) {
        $wp_customize->add_setting('social_' . $platform, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('social_' . $platform, array(
            'label'   => sprintf(__('%s URL', 'developer-portfolio'), ucfirst($platform)),
            'section' => 'social_section',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'developer_portfolio_customize_register');

/**
 * Get social links
 */
function developer_portfolio_get_social_links() {
    $platforms = array('twitter', 'github', 'linkedin', 'instagram');
    $links = array();

    foreach ($platforms as $platform) {
        $url = get_theme_mod('social_' . $platform);
        if ($url) {
            $links[$platform] = $url;
        }
    }

    return $links;
}

/**
 * Excerpt length
 */
function developer_portfolio_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'developer_portfolio_excerpt_length');

/**
 * Excerpt more
 */
function developer_portfolio_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'developer_portfolio_excerpt_more');

/**
 * Add body classes
 */
function developer_portfolio_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'front-page';
    }

    if (is_singular('portfolio')) {
        $classes[] = 'single-portfolio';
    }

    return $classes;
}
add_filter('body_class', 'developer_portfolio_body_classes');
