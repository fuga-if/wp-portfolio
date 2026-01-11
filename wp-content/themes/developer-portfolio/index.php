<?php
/**
 * Main Template File
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

get_header();
?>

<div class="section">
    <div class="container">
        <?php if (have_posts()) : ?>

            <?php if (is_home() && !is_front_page()) : ?>
                <header class="section__header">
                    <h1 class="section__title"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <div class="grid grid--3">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="card__image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('portfolio-thumb'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="card__body">
                            <h2 class="card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="card__meta">
                                <time datetime="<?php echo get_the_date('c'); ?>">
                                    <?php echo get_the_date(); ?>
                                </time>
                            </div>

                            <div class="card__text">
                                <?php the_excerpt(); ?>
                            </div>

                            <?php
                            $categories = get_the_category();
                            if ($categories) :
                            ?>
                            <div class="card__tags">
                                <?php foreach ($categories as $category) : ?>
                                    <span class="tag tag--primary"><?php echo esc_html($category->name); ?></span>
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

            <div class="no-posts">
                <h2><?php esc_html_e('No posts found', 'developer-portfolio'); ?></h2>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'developer-portfolio'); ?></p>
            </div>

        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
