<?php
/**
 * ヒーローセクション
 *
 * @package Fuga_Portfolio
 */

$hero_title       = get_theme_mod( 'fuga_hero_title', 'Fuga Ikeda' );
$hero_subtitle    = get_theme_mod( 'fuga_hero_subtitle', 'WordPress Developer & Full-Stack Engineer' );
$hero_description = get_theme_mod( 'fuga_hero_description', 'WordPressテーマ開発からWebアプリ・モバイルアプリまで、幅広い技術でプロジェクトを形にします。' );
$hero_image       = get_theme_mod( 'fuga_hero_image' );
?>

<section class="hero" id="hero"<?php echo $hero_image ? ' style="background-image: url(' . esc_url( $hero_image ) . ')"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- esc_url() applied to the only dynamic value inside the static style attribute string. ?>>
	<div class="hero-overlay"></div>
	<div class="container hero-inner">
		<div class="hero-content" data-animate="fade-up">
			<p class="hero-label">Portfolio</p>
			<h1 class="hero-title"><?php echo esc_html( $hero_title ); ?></h1>
			<p class="hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
			<p class="hero-description"><?php echo esc_html( $hero_description ); ?></p>
			<div class="hero-actions">
				<a href="#works" class="btn btn-primary btn-lg">Works を見る</a>
				<a href="#contact" class="btn btn-outline btn-lg">お問い合わせ</a>
			</div>
		</div>
		<div class="hero-visual" data-animate="fade-left">
			<div class="hero-decoration">
				<div class="decoration-circle"></div>
				<div class="decoration-dots"></div>
			</div>
		</div>
	</div>
	<div class="hero-scroll-indicator">
		<span>Scroll</span>
		<div class="scroll-line"></div>
	</div>
</section>
