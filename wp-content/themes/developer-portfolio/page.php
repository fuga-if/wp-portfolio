<?php
/**
 * Page Template
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

get_header();
?>

<div class="section" style="padding-top: calc(80px + var(--spacing-4xl));">
    <div class="container container--narrow">
        <?php while (have_posts()) : the_post(); ?>

            <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="section__header">
                    <h1 class="section__title"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-2xl">
                        <?php the_post_thumbnail('large', array('class' => 'rounded')); ?>
                    </div>
                <?php endif; ?>

                <div class="page-content">
                    <?php the_content(); ?>

                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'developer-portfolio'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
            </article>

            <?php
            // Comments
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
            ?>

        <?php endwhile; ?>
    </div>
</div>

<?php
get_footer();
