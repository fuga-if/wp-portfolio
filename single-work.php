<?php
/**
 * 実績詳細テンプレート
 *
 * @package Fuga_Portfolio
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
	<article class="work-single">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="work-single-hero">
				<?php the_post_thumbnail( 'work-hero', array( 'class' => 'work-hero-image' ) ); ?>
			</div>
		<?php endif; ?>

		<div class="container">
			<div class="work-single-content">
				<header class="work-single-header">
					<?php fuga_portfolio_work_categories(); ?>
					<h1 class="work-single-title"><?php the_title(); ?></h1>

					<?php
					$role = get_post_meta( get_the_ID(), '_work_role', true );
					if ( $role ) :
					?>
						<p class="work-single-role"><?php echo esc_html( $role ); ?></p>
					<?php endif; ?>
				</header>

				<div class="work-single-body">
					<?php the_content(); ?>
				</div>

				<aside class="work-single-meta">
					<div class="meta-section">
						<h3 class="meta-heading">技術スタック</h3>
						<?php fuga_portfolio_tech_stack_tags(); ?>
					</div>

					<div class="meta-section">
						<h3 class="meta-heading">リンク</h3>
						<?php fuga_portfolio_work_links(); ?>
					</div>
				</aside>
			</div>

			<nav class="work-navigation">
				<div class="nav-prev">
					<?php previous_post_link( '%link', '&larr; %title' ); ?>
				</div>
				<div class="nav-center">
					<a href="<?php echo esc_url( home_url( '/works/' ) ); ?>">実績一覧</a>
				</div>
				<div class="nav-next">
					<?php next_post_link( '%link', '%title &rarr;' ); ?>
				</div>
			</nav>
		</div>
	</article>
<?php endwhile; ?>

<?php
get_footer();
