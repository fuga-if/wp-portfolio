<?php
/**
 * Single Portfolio Template
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

get_header();
?>

<div class="section" style="padding-top: calc(80px + var(--spacing-4xl));">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>

            <article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- Portfolio Header -->
                <header class="section__header">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                    if ($terms && !is_wp_error($terms)) :
                    ?>
                    <div class="mb-md">
                        <?php foreach ($terms as $term) : ?>
                            <span class="tag tag--primary"><?php echo esc_html($term->name); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <h1 class="section__title"><?php the_title(); ?></h1>

                    <?php if (has_excerpt()) : ?>
                        <p class="section__subtitle"><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </header>

                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="portfolio-featured-image mb-3xl">
                        <?php the_post_thumbnail('portfolio-large', array('style' => 'border-radius: var(--border-radius-lg); box-shadow: var(--shadow-xl);')); ?>
                    </div>
                <?php endif; ?>

                <!-- Portfolio Content -->
                <div class="two-col">
                    <div class="portfolio-content">
                        <h2><?php esc_html_e('About This Project', 'developer-portfolio'); ?></h2>
                        <?php the_content(); ?>
                    </div>

                    <div class="portfolio-details">
                        <div class="card" style="padding: var(--spacing-xl);">
                            <h3 style="margin-bottom: var(--spacing-lg);"><?php esc_html_e('Project Details', 'developer-portfolio'); ?></h3>

                            <dl style="display: grid; gap: var(--spacing-md);">
                                <?php
                                // Get custom fields if they exist
                                $client = get_post_meta(get_the_ID(), 'portfolio_client', true);
                                $url = get_post_meta(get_the_ID(), 'portfolio_url', true);
                                $duration = get_post_meta(get_the_ID(), 'portfolio_duration', true);
                                ?>

                                <div>
                                    <dt style="font-weight: 600; color: var(--color-gray-500); font-size: var(--font-size-sm);">
                                        <?php esc_html_e('Date', 'developer-portfolio'); ?>
                                    </dt>
                                    <dd style="margin-top: var(--spacing-xs);">
                                        <?php echo get_the_date(); ?>
                                    </dd>
                                </div>

                                <?php if ($client) : ?>
                                <div>
                                    <dt style="font-weight: 600; color: var(--color-gray-500); font-size: var(--font-size-sm);">
                                        <?php esc_html_e('Client', 'developer-portfolio'); ?>
                                    </dt>
                                    <dd style="margin-top: var(--spacing-xs);">
                                        <?php echo esc_html($client); ?>
                                    </dd>
                                </div>
                                <?php endif; ?>

                                <?php if ($duration) : ?>
                                <div>
                                    <dt style="font-weight: 600; color: var(--color-gray-500); font-size: var(--font-size-sm);">
                                        <?php esc_html_e('Duration', 'developer-portfolio'); ?>
                                    </dt>
                                    <dd style="margin-top: var(--spacing-xs);">
                                        <?php echo esc_html($duration); ?>
                                    </dd>
                                </div>
                                <?php endif; ?>

                                <div>
                                    <dt style="font-weight: 600; color: var(--color-gray-500); font-size: var(--font-size-sm);">
                                        <?php esc_html_e('Category', 'developer-portfolio'); ?>
                                    </dt>
                                    <dd style="margin-top: var(--spacing-xs);">
                                        <?php
                                        if ($terms && !is_wp_error($terms)) {
                                            echo esc_html(implode(', ', wp_list_pluck($terms, 'name')));
                                        } else {
                                            esc_html_e('Uncategorized', 'developer-portfolio');
                                        }
                                        ?>
                                    </dd>
                                </div>

                                <?php if ($url) : ?>
                                <div>
                                    <dt style="font-weight: 600; color: var(--color-gray-500); font-size: var(--font-size-sm);">
                                        <?php esc_html_e('Website', 'developer-portfolio'); ?>
                                    </dt>
                                    <dd style="margin-top: var(--spacing-xs);">
                                        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer">
                                            <?php esc_html_e('View Site', 'developer-portfolio'); ?> →
                                        </a>
                                    </dd>
                                </div>
                                <?php endif; ?>
                            </dl>

                            <div class="mt-xl">
                                <a href="#contact" class="btn btn--primary btn--full">
                                    <?php esc_html_e('Start Similar Project', 'developer-portfolio'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Navigation -->
                <nav class="post-navigation mt-3xl" style="display: flex; justify-content: space-between; gap: var(--spacing-lg); border-top: 1px solid var(--color-gray-200); padding-top: var(--spacing-xl);">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>

                    <div style="flex: 1;">
                        <?php if ($prev_post) : ?>
                            <span style="font-size: var(--font-size-sm); color: var(--color-gray-500);">
                                <?php esc_html_e('Previous Project', 'developer-portfolio'); ?>
                            </span>
                            <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" style="display: block; font-weight: 600;">
                                <?php echo esc_html($prev_post->post_title); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div style="flex: 1; text-align: right;">
                        <?php if ($next_post) : ?>
                            <span style="font-size: var(--font-size-sm); color: var(--color-gray-500);">
                                <?php esc_html_e('Next Project', 'developer-portfolio'); ?>
                            </span>
                            <a href="<?php echo esc_url(get_permalink($next_post)); ?>" style="display: block; font-weight: 600;">
                                <?php echo esc_html($next_post->post_title); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </nav>

            </article>

        <?php endwhile; ?>
    </div>
</div>

<!-- CTA Section -->
<section class="cta mt-3xl">
    <div class="container">
        <h2 class="cta__title"><?php esc_html_e('Interested in working together?', 'developer-portfolio'); ?></h2>
        <p class="cta__text"><?php esc_html_e('お気軽にお問い合わせください', 'developer-portfolio'); ?></p>
        <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn--white btn--large">
            <?php esc_html_e('Get in Touch', 'developer-portfolio'); ?>
        </a>
    </div>
</section>

<?php
get_footer();
