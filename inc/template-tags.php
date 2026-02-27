<?php
/**
 * テンプレートタグ
 *
 * @package Fuga_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 技術スタックをタグ表示
 */
function fuga_portfolio_tech_stack_tags( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$tech_stack = get_post_meta( $post_id, '_work_tech_stack', true );
	if ( empty( $tech_stack ) ) {
		return;
	}

	$tags = array_map( 'trim', explode( ',', $tech_stack ) );
	echo '<div class="tech-stack-tags">';
	foreach ( $tags as $tag ) {
		echo '<span class="tech-tag">' . esc_html( $tag ) . '</span>';
	}
	echo '</div>';
}

/**
 * 実績のリンクボタン表示
 */
function fuga_portfolio_work_links( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$site_url   = get_post_meta( $post_id, '_work_site_url', true );
	$github_url = get_post_meta( $post_id, '_work_github_url', true );

	if ( empty( $site_url ) && empty( $github_url ) ) {
		return;
	}

	echo '<div class="work-links">';
	if ( ! empty( $site_url ) ) {
		echo '<a href="' . esc_url( $site_url ) . '" class="btn btn-primary" target="_blank" rel="noopener noreferrer">サイトを見る</a>';
	}
	if ( ! empty( $github_url ) ) {
		echo '<a href="' . esc_url( $github_url ) . '" class="btn btn-outline" target="_blank" rel="noopener noreferrer">GitHub</a>';
	}
	echo '</div>';
}

/**
 * 実績カテゴリ表示
 */
function fuga_portfolio_work_categories( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$terms = get_the_terms( $post_id, 'work_category' );
	if ( ! $terms || is_wp_error( $terms ) ) {
		return;
	}

	echo '<div class="work-categories">';
	foreach ( $terms as $term ) {
		echo '<a href="' . esc_url( get_term_link( $term ) ) . '" class="work-category-label">' . esc_html( $term->name ) . '</a>';
	}
	echo '</div>';
}

/**
 * SNSリンク表示
 */
function fuga_portfolio_sns_links() {
	$sns = array(
		'github'  => array(
			'label' => 'GitHub',
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static inline SVG, no user input.
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>',
		),
		'twitter' => array(
			'label' => 'X',
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static inline SVG, no user input.
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
		),
	);

	// Collect links first so we can bail early without a preliminary loop.
	$links = array();
	foreach ( $sns as $key => $data ) {
		$url = get_theme_mod( 'fuga_sns_' . $key );
		if ( $url ) {
			$links[ $key ] = array_merge( $data, array( 'url' => $url ) );
		}
	}

	if ( empty( $links ) ) {
		return;
	}

	echo '<div class="sns-links">';
	foreach ( $links as $data ) {
		printf(
			'<a href="%s" class="sns-link" target="_blank" rel="noopener noreferrer" aria-label="%s">%s</a>',
			esc_url( $data['url'] ),
			esc_attr( $data['label'] ),
			$data['icon'] // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static inline SVG.
		);
	}
	echo '</div>';
}
