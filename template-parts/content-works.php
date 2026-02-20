<?php
/**
 * Worksセクション（フロントページ用）
 *
 * @package Fuga_Portfolio
 */

$works = new WP_Query( array(
	'post_type'      => 'work',
	'posts_per_page' => 6,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
) );
?>

<section class="works section section-alt" id="works">
	<div class="container">
		<div class="section-header" data-animate="fade-up">
			<h2 class="section-title">Works</h2>
			<p class="section-subtitle">これまでの実績</p>
		</div>

		<?php if ( $works->have_posts() ) : ?>
			<div class="works-grid" data-animate="fade-up-stagger">
				<?php while ( $works->have_posts() ) : $works->the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'work' ); ?>
				<?php endwhile; ?>
			</div>

			<?php if ( $works->found_posts > 6 ) : ?>
				<div class="section-more">
					<a href="<?php echo esc_url( get_post_type_archive_link( 'work' ) ); ?>" class="btn btn-outline">すべての実績を見る</a>
				</div>
			<?php endif; ?>
		<?php else : ?>
			<div class="works-placeholder">
				<div class="works-grid">
					<?php
					$placeholder_works = array(
						array(
							'title'    => 'UMMA!',
							'desc'     => 'クローズドコミュニティ向け飲食店レビュー共有サービス。グループ内でお店の発見・レビューを共有。',
							'tech'     => 'Next.js, Flutter, Prisma, PostgreSQL, Firebase Auth',
							'category' => 'Web / Mobile',
						),
						array(
							'title'    => 'Pikaru',
							'desc'     => 'クリエイター向けコンテンツ承認プラットフォーム。PayPay決済連携・自動承認機能付き。',
							'tech'     => 'Next.js, NextAuth.js, Prisma, PostgreSQL',
							'category' => 'Web',
						),
						array(
							'title'    => 'BANSHO',
							'desc'     => 'AI搭載の読書ノートアプリ。電子書籍のスクショからAIが「頭の良い友達のノート」を生成。',
							'tech'     => 'Expo, React Native, Supabase, Claude AI',
							'category' => 'Mobile',
						),
						array(
							'title'    => 'Warikan',
							'desc'     => 'グループの割り勘をスマートに管理するアプリ。',
							'tech'     => 'Flutter, Dart',
							'category' => 'Mobile',
						),
					);

					foreach ( $placeholder_works as $work ) :
					?>
						<article class="work-card">
							<div class="work-card-thumbnail placeholder-thumbnail">
								<span class="placeholder-icon"><?php echo esc_html( mb_substr( $work['title'], 0, 1 ) ); ?></span>
							</div>
							<div class="work-card-body">
								<span class="work-card-category"><?php echo esc_html( $work['category'] ); ?></span>
								<h3 class="work-card-title"><?php echo esc_html( $work['title'] ); ?></h3>
								<p class="work-card-excerpt"><?php echo esc_html( $work['desc'] ); ?></p>
								<div class="tech-stack-tags">
									<?php foreach ( array_map( 'trim', explode( ',', $work['tech'] ) ) as $tag ) : ?>
										<span class="tech-tag"><?php echo esc_html( $tag ); ?></span>
									<?php endforeach; ?>
								</div>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
				<p class="placeholder-note">※ WordPress管理画面の「実績」からプロジェクトを登録すると、ここに動的に表示されます。</p>
			</div>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>
	</div>
</section>
