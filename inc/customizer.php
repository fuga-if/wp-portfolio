<?php
/**
 * カスタマイザー設定
 *
 * @package Fuga_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * カスタマイザー登録
 */
function fuga_portfolio_customize_register( $wp_customize ) {

	// === Hero セクション ===
	$wp_customize->add_section( 'fuga_hero_section', array(
		'title'    => 'ヒーローセクション',
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'fuga_hero_title', array(
		'default'           => 'Fuga Ikeda',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fuga_hero_title', array(
		'label'   => '名前',
		'section' => 'fuga_hero_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'fuga_hero_subtitle', array(
		'default'           => 'WordPress Developer & Full-Stack Engineer',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fuga_hero_subtitle', array(
		'label'   => '肩書き',
		'section' => 'fuga_hero_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'fuga_hero_description', array(
		'default'           => 'WordPressテーマ開発からWebアプリ・モバイルアプリまで、幅広い技術でプロジェクトを形にします。',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'fuga_hero_description', array(
		'label'   => '説明文',
		'section' => 'fuga_hero_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'fuga_hero_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fuga_hero_image', array(
		'label'   => 'ヒーロー背景画像',
		'section' => 'fuga_hero_section',
	) ) );

	// === About セクション ===
	$wp_customize->add_section( 'fuga_about_section', array(
		'title'    => 'Aboutセクション',
		'priority' => 31,
	) );

	$wp_customize->add_setting( 'fuga_about_text', array(
		'default'           => '個人開発でWebサービス・モバイルアプリを複数リリースしてきた経験を活かし、WordPressサイト制作を承ります。デザインカンプからのコーディング、オリジナルテーマ開発、既存サイトのカスタマイズなど、お気軽にご相談ください。',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'fuga_about_text', array(
		'label'   => '自己紹介文',
		'section' => 'fuga_about_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'fuga_about_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fuga_about_image', array(
		'label'   => 'プロフィール画像',
		'section' => 'fuga_about_section',
	) ) );

	// === Contact セクション ===
	$wp_customize->add_section( 'fuga_contact_section', array(
		'title'    => 'Contactセクション',
		'priority' => 32,
	) );

	$wp_customize->add_setting( 'fuga_contact_email', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'fuga_contact_email', array(
		'label'   => 'メールアドレス',
		'section' => 'fuga_contact_section',
		'type'    => 'email',
	) );

	$wp_customize->add_setting( 'fuga_contact_text', array(
		'default'           => 'お仕事のご相談・お見積もりなど、お気軽にお問い合わせください。',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'fuga_contact_text', array(
		'label'   => 'お問い合わせ文',
		'section' => 'fuga_contact_section',
		'type'    => 'textarea',
	) );

	// === SNS リンク ===
	$wp_customize->add_section( 'fuga_sns_section', array(
		'title'    => 'SNSリンク',
		'priority' => 33,
	) );

	$sns_links = array(
		'github'  => 'GitHub URL',
		'twitter' => 'X (Twitter) URL',
	);

	foreach ( $sns_links as $key => $label ) {
		$wp_customize->add_setting( 'fuga_sns_' . $key, array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( 'fuga_sns_' . $key, array(
			'label'   => $label,
			'section' => 'fuga_sns_section',
			'type'    => 'url',
		) );
	}
}
add_action( 'customize_register', 'fuga_portfolio_customize_register' );
