<?php
/**
 * 404 Template
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

get_header();
?>

<div class="section" style="padding-top: calc(80px + var(--spacing-4xl)); min-height: 60vh; display: flex; align-items: center;">
    <div class="container text-center">
        <h1 style="font-size: clamp(6rem, 15vw, 12rem); font-weight: 700; color: var(--color-gray-200); line-height: 1;">
            404
        </h1>
        <h2 class="mb-md"><?php esc_html_e('Page Not Found', 'developer-portfolio'); ?></h2>
        <p class="mb-xl" style="color: var(--color-gray-500);">
            <?php esc_html_e('お探しのページは見つかりませんでした。URLが正しいかご確認ください。', 'developer-portfolio'); ?>
        </p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary btn--large">
            <?php esc_html_e('Back to Home', 'developer-portfolio'); ?>
        </a>
    </div>
</div>

<?php
get_footer();
