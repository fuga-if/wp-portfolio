<?php
/**
 * Footer Template
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

</main><!-- #main-content -->

<footer class="site-footer" id="site-footer">
    <div class="container">
        <div class="footer__content">
            <div class="footer__about">
                <h4 class="footer__title"><?php bloginfo('name'); ?></h4>
                <p><?php bloginfo('description'); ?></p>
                <?php
                $social_links = developer_portfolio_get_social_links();
                if (!empty($social_links)) :
                ?>
                <div class="footer__social">
                    <?php foreach ($social_links as $platform => $url) : ?>
                        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr(ucfirst($platform)); ?>">
                            <span class="social-icon social-icon--<?php echo esc_attr($platform); ?>"></span>
                        </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <?php if (is_active_sidebar('footer-1')) : ?>
            <div class="footer__widget">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-2')) : ?>
            <div class="footer__widget">
                <?php dynamic_sidebar('footer-2'); ?>
            </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-3')) : ?>
            <div class="footer__widget">
                <?php dynamic_sidebar('footer-3'); ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="footer__bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'developer-portfolio'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
