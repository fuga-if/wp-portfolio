<?php
/**
 * Aboutセクション
 *
 * @package Fuga_Portfolio
 */

$about_text  = get_theme_mod( 'fuga_about_text', '個人開発でWebサービス・モバイルアプリを複数リリースしてきた経験を活かし、WordPressサイト制作を承ります。デザインカンプからのコーディング、オリジナルテーマ開発、既存サイトのカスタマイズなど、お気軽にご相談ください。' );
$about_image = get_theme_mod( 'fuga_about_image' );
?>

<section class="about section" id="about">
	<div class="container">
		<div class="section-header" data-animate="fade-up">
			<h2 class="section-title">About</h2>
			<p class="section-subtitle">私について</p>
		</div>

		<div class="about-content">
			<?php if ( $about_image ) : ?>
				<div class="about-image" data-animate="fade-right">
					<img src="<?php echo esc_url( $about_image ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'fuga_hero_title', 'Fuga Ikeda' ) ); ?>">
				</div>
			<?php endif; ?>

			<div class="about-text" data-animate="fade-left">
				<p><?php echo nl2br( esc_html( $about_text ) ); ?></p>

				<div class="about-highlights">
					<div class="highlight-item">
						<span class="highlight-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.376 3.622a1 1 0 0 1 3.002 3.002L7.368 18.635a2 2 0 0 1-.855.506l-2.872.838a.5.5 0 0 1-.62-.62l.838-2.872a2 2 0 0 1 .506-.854z"/></svg>
						</span>
						<div>
							<h3>WordPress開発</h3>
							<p>オリジナルテーマ・プラグイン開発</p>
						</div>
					</div>
					<div class="highlight-item">
						<span class="highlight-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg>
						</span>
						<div>
							<h3>Webアプリ開発</h3>
							<p>Next.js / React でのフルスタック開発</p>
						</div>
					</div>
					<div class="highlight-item">
						<span class="highlight-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
						</span>
						<div>
							<h3>モバイルアプリ開発</h3>
							<p>Flutter / React Native でのクロスプラットフォーム開発</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
