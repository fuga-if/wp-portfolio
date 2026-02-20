<?php
/**
 * 実績一覧テンプレート
 *
 * @package Fuga_Portfolio
 */

get_header();
?>

<section class="archive-works">
	<div class="container">
		<header class="archive-header">
			<h1 class="section-title">Works</h1>
			<p class="section-subtitle">これまでの実績</p>
		</header>

		<?php
		$categories = get_terms( array(
			'taxonomy'   => 'work_category',
			'hide_empty' => true,
		) );

		if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
		?>
			<div class="work-filter">
				<button class="filter-btn active" data-filter="all">All</button>
				<?php foreach ( $categories as $cat ) : ?>
					<button class="filter-btn" data-filter="<?php echo esc_attr( $cat->slug ); ?>">
						<?php echo esc_html( $cat->name ); ?>
					</button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div class="works-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'work' ); ?>
				<?php endwhile; ?>
			</div>

			<div class="pagination">
				<?php
				the_posts_pagination( array(
					'mid_size'  => 1,
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
				) );
				?>
			</div>
		<?php else : ?>
			<p class="no-works">実績がまだ登録されていません。</p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
