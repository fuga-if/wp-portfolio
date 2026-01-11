<?php
/**
 * Single Post Template
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

get_header();
?>

<div class="section" style="padding-top: calc(80px + var(--spacing-4xl));">
    <div class="container container--narrow">
        <?php while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="section__header text-left">
                    <?php
                    $categories = get_the_category();
                    if ($categories) :
                    ?>
                    <div class="mb-md">
                        <?php foreach ($categories as $category) : ?>
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="tag tag--primary">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <h1 class="section__title"><?php the_title(); ?></h1>

                    <div class="post-meta" style="color: var(--color-gray-500); margin-top: var(--spacing-md);">
                        <time datetime="<?php echo get_the_date('c'); ?>">
                            <?php echo get_the_date(); ?>
                        </time>
                        <span class="mx-sm">|</span>
                        <span><?php the_author(); ?></span>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-2xl">
                        <?php the_post_thumbnail('large', array('style' => 'border-radius: var(--border-radius-lg);')); ?>
                    </div>
                <?php endif; ?>

                <div class="post-content">
                    <?php the_content(); ?>

                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'developer-portfolio'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="post-footer mt-2xl" style="border-top: 1px solid var(--color-gray-200); padding-top: var(--spacing-xl);">
                    <?php
                    $tags = get_the_tags();
                    if ($tags) :
                    ?>
                    <div class="post-tags">
                        <strong><?php esc_html_e('Tags:', 'developer-portfolio'); ?></strong>
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </footer>
            </article>

            <!-- Post Navigation -->
            <nav class="post-navigation mt-2xl" style="display: flex; justify-content: space-between; gap: var(--spacing-lg);">
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                ?>

                <div class="post-navigation__prev" style="flex: 1;">
                    <?php if ($prev_post) : ?>
                        <span style="font-size: var(--font-size-sm); color: var(--color-gray-500);">
                            <?php esc_html_e('Previous', 'developer-portfolio'); ?>
                        </span>
                        <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" style="display: block; font-weight: 600;">
                            <?php echo esc_html($prev_post->post_title); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="post-navigation__next" style="flex: 1; text-align: right;">
                    <?php if ($next_post) : ?>
                        <span style="font-size: var(--font-size-sm); color: var(--color-gray-500);">
                            <?php esc_html_e('Next', 'developer-portfolio'); ?>
                        </span>
                        <a href="<?php echo esc_url(get_permalink($next_post)); ?>" style="display: block; font-weight: 600;">
                            <?php echo esc_html($next_post->post_title); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </nav>

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
