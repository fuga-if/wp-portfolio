<?php
/**
 * Portfolio Archive Template
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

get_header();
?>

<div class="section" style="padding-top: calc(80px + var(--spacing-4xl));">
    <div class="container">
        <header class="section__header">
            <h1 class="section__title"><?php esc_html_e('Portfolio', 'developer-portfolio'); ?></h1>
            <p class="section__subtitle"><?php esc_html_e('制作実績一覧', 'developer-portfolio'); ?></p>
        </header>

        <!-- Filter by Category -->
        <?php
        $portfolio_categories = get_terms(array(
            'taxonomy'   => 'portfolio_category',
            'hide_empty' => true,
        ));

        if (!empty($portfolio_categories) && !is_wp_error($portfolio_categories)) :
        ?>
        <div class="portfolio-filter text-center mb-2xl">
            <a href="<?php echo esc_url(get_post_type_archive_link('portfolio')); ?>" class="btn btn--small <?php echo !is_tax('portfolio_category') ? 'btn--primary' : 'btn--secondary'; ?>">
                <?php esc_html_e('All', 'developer-portfolio'); ?>
            </a>
            <?php foreach ($portfolio_categories as $category) : ?>
                <a href="<?php echo esc_url(get_term_link($category)); ?>" class="btn btn--small <?php echo is_tax('portfolio_category', $category->slug) ? 'btn--primary' : 'btn--secondary'; ?>">
                    <?php echo esc_html($category->name); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (have_posts()) : ?>

            <div class="grid grid--3">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="portfolio-<?php the_ID(); ?>" <?php post_class('card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="card__image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('portfolio-thumb'); ?>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="card__image">
                                <a href="<?php the_permalink(); ?>">
                                    <div style="background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark)); aspect-ratio: 16/10;"></div>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="card__body">
                            <h2 class="card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <p class="card__text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>

                            <?php
                            $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                            if ($terms && !is_wp_error($terms)) :
                            ?>
                            <div class="card__tags">
                                <?php foreach ($terms as $term) : ?>
                                    <span class="tag tag--primary"><?php echo esc_html($term->name); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Previous', 'developer-portfolio'),
                'next_text' => __('Next &raquo;', 'developer-portfolio'),
            ));
            ?>

        <?php else : ?>

            <div class="no-posts text-center">
                <h2><?php esc_html_e('No portfolio items found', 'developer-portfolio'); ?></h2>
                <p><?php esc_html_e('制作実績はまだ登録されていません。', 'developer-portfolio'); ?></p>
            </div>

        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
