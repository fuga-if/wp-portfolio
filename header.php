<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
	<div class="container header-inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title-link">
					<?php echo esc_html( get_theme_mod( 'fuga_hero_title', 'Fuga Ikeda' ) ); ?>
				</a>
			<?php endif; ?>
		</div>

		<button class="menu-toggle" id="menu-toggle" aria-label="メニューを開く" aria-expanded="false">
			<span class="hamburger-line"></span>
			<span class="hamburger-line"></span>
			<span class="hamburger-line"></span>
		</button>

		<nav class="main-navigation" id="main-navigation" role="navigation">
			<?php if ( is_front_page() ) : ?>
				<ul class="nav-menu">
					<li><a href="#about">About</a></li>
					<li><a href="#works">Works</a></li>
					<li><a href="#skills">Skills</a></li>
					<li><a href="#contact" class="nav-cta">Contact</a></li>
				</ul>
			<?php else : ?>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'nav-menu',
					'container'      => false,
					'fallback_cb'    => false,
				) );
				?>
				<ul class="nav-menu nav-menu-fallback">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
					<li><a href="<?php echo esc_url( home_url( '/works/' ) ); ?>">Works</a></li>
				</ul>
			<?php endif; ?>
		</nav>
	</div>
</header>

<main class="site-main">
