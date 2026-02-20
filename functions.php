<?php
/**
 * Fuga Portfolio テーマ functions
 *
 * @package Fuga_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'FUGA_PORTFOLIO_VERSION', '1.0.0' );

/**
 * テーマセットアップ
 */
function fuga_portfolio_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	register_nav_menus( array(
		'primary' => esc_html__( 'プライマリメニュー', 'fuga-portfolio' ),
	) );

	add_image_size( 'work-thumbnail', 600, 400, true );
	add_image_size( 'work-hero', 1200, 600, true );
}
add_action( 'after_setup_theme', 'fuga_portfolio_setup' );

/**
 * スタイル・スクリプト読み込み
 */
function fuga_portfolio_scripts() {
	wp_enqueue_style(
		'fuga-portfolio-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		FUGA_PORTFOLIO_VERSION
	);

	wp_enqueue_script(
		'fuga-portfolio-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		FUGA_PORTFOLIO_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'fuga_portfolio_scripts' );

// カスタム投稿タイプ
require get_template_directory() . '/inc/custom-post-types.php';

// カスタマイザー
require get_template_directory() . '/inc/customizer.php';

// テンプレートタグ
require get_template_directory() . '/inc/template-tags.php';
