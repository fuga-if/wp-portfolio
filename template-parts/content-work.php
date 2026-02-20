<?php
/**
 * 実績カード（ループ内パーツ）
 *
 * @package Fuga_Portfolio
 */

$terms = get_the_terms( get_the_ID(), 'work_category' );
$category_slugs = '';
if ( $terms && ! is_wp_error( $terms ) ) {
	$category_slugs = implode( ' ', wp_list_pluck( $terms, 'slug' ) );
}
?>

<article class="work-card" data-categories="<?php echo esc_attr( $category_slugs ); ?>">
	<a href="<?php the_permalink(); ?>" class="work-card-link">
		<div class="work-card-thumbnail">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'work-thumbnail', array( 'class' => 'work-card-image' ) ); ?>
			<?php else : ?>
				<span class="placeholder-icon"><?php echo esc_html( mb_substr( get_the_title(), 0, 1 ) ); ?></span>
			<?php endif; ?>
			<div class="work-card-overlay">
				<span class="view-label">View Project</span>
			</div>
		</div>

		<div class="work-card-body">
			<?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
				<span class="work-card-category"><?php echo esc_html( $terms[0]->name ); ?></span>
			<?php endif; ?>

			<h3 class="work-card-title"><?php the_title(); ?></h3>

			<?php if ( has_excerpt() ) : ?>
				<p class="work-card-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>

			<?php fuga_portfolio_tech_stack_tags(); ?>
		</div>
	</a>
</article>
