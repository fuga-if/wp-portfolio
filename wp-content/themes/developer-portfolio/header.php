<?php
/**
 * Header Template
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content">
    <?php esc_html_e('Skip to content', 'developer-portfolio'); ?>
</a>

<header class="site-header" id="site-header">
    <div class="site-header__inner">
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
        </div>

        <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e('Toggle menu', 'developer-portfolio'); ?>" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="main-nav" id="main-nav" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'developer-portfolio'); ?>">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'main-nav__list',
                    'container'      => false,
                    'walker'         => new Developer_Portfolio_Nav_Walker(),
                ));
            } else {
                // Fallback menu
                ?>
                <ul class="main-nav__list">
                    <li class="main-nav__item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="main-nav__link<?php echo is_front_page() ? ' main-nav__link--active' : ''; ?>">
                            <?php esc_html_e('Home', 'developer-portfolio'); ?>
                        </a>
                    </li>
                    <li class="main-nav__item">
                        <a href="#services" class="main-nav__link">
                            <?php esc_html_e('Services', 'developer-portfolio'); ?>
                        </a>
                    </li>
                    <li class="main-nav__item">
                        <a href="#portfolio" class="main-nav__link">
                            <?php esc_html_e('Portfolio', 'developer-portfolio'); ?>
                        </a>
                    </li>
                    <li class="main-nav__item">
                        <a href="#contact" class="main-nav__link">
                            <?php esc_html_e('Contact', 'developer-portfolio'); ?>
                        </a>
                    </li>
                </ul>
                <?php
            }
            ?>
        </nav>
    </div>
</header>

<main id="main-content" class="site-main">
