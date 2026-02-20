<?php
/**
 * カスタム投稿タイプ・タクソノミー登録
 *
 * @package Fuga_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * カスタム投稿タイプ「Work」を登録
 */
function fuga_portfolio_register_post_types() {
	$labels = array(
		'name'               => '実績',
		'singular_name'      => '実績',
		'menu_name'          => '実績',
		'add_new'            => '新規追加',
		'add_new_item'       => '実績を追加',
		'edit_item'          => '実績を編集',
		'new_item'           => '新しい実績',
		'view_item'          => '実績を表示',
		'search_items'       => '実績を検索',
		'not_found'          => '実績が見つかりません',
		'not_found_in_trash' => 'ゴミ箱に実績はありません',
	);

	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'works' ),
		'menu_icon'     => 'dashicons-portfolio',
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'  => true,
	);

	register_post_type( 'work', $args );
}
add_action( 'init', 'fuga_portfolio_register_post_types' );

/**
 * カスタムタクソノミー「Work Category」を登録
 */
function fuga_portfolio_register_taxonomies() {
	$labels = array(
		'name'          => '実績カテゴリ',
		'singular_name' => '実績カテゴリ',
		'search_items'  => 'カテゴリを検索',
		'all_items'     => 'すべてのカテゴリ',
		'edit_item'     => 'カテゴリを編集',
		'update_item'   => 'カテゴリを更新',
		'add_new_item'  => '新しいカテゴリを追加',
		'new_item_name' => '新しいカテゴリ名',
		'menu_name'     => '実績カテゴリ',
	);

	$args = array(
		'labels'       => $labels,
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'work-category' ),
		'show_in_rest' => true,
	);

	register_taxonomy( 'work_category', 'work', $args );
}
add_action( 'init', 'fuga_portfolio_register_taxonomies' );

/**
 * 実績用カスタムフィールド（メタボックス）
 */
function fuga_portfolio_add_meta_boxes() {
	add_meta_box(
		'work_details',
		'実績の詳細',
		'fuga_portfolio_work_meta_box_callback',
		'work',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'fuga_portfolio_add_meta_boxes' );

/**
 * メタボックスの表示
 */
function fuga_portfolio_work_meta_box_callback( $post ) {
	wp_nonce_field( 'fuga_portfolio_work_meta', 'fuga_portfolio_work_meta_nonce' );

	$site_url   = get_post_meta( $post->ID, '_work_site_url', true );
	$github_url = get_post_meta( $post->ID, '_work_github_url', true );
	$tech_stack = get_post_meta( $post->ID, '_work_tech_stack', true );
	$role       = get_post_meta( $post->ID, '_work_role', true );
	?>
	<table class="form-table">
		<tr>
			<th><label for="work_site_url">サイトURL</label></th>
			<td><input type="url" id="work_site_url" name="work_site_url" value="<?php echo esc_attr( $site_url ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label for="work_github_url">GitHub URL</label></th>
			<td><input type="url" id="work_github_url" name="work_github_url" value="<?php echo esc_attr( $github_url ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label for="work_tech_stack">技術スタック</label></th>
			<td>
				<input type="text" id="work_tech_stack" name="work_tech_stack" value="<?php echo esc_attr( $tech_stack ); ?>" class="regular-text">
				<p class="description">カンマ区切りで入力（例: Next.js, React, TypeScript）</p>
			</td>
		</tr>
		<tr>
			<th><label for="work_role">担当範囲</label></th>
			<td><input type="text" id="work_role" name="work_role" value="<?php echo esc_attr( $role ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<?php
}

/**
 * メタボックスの保存
 */
function fuga_portfolio_save_work_meta( $post_id ) {
	if ( ! isset( $_POST['fuga_portfolio_work_meta_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['fuga_portfolio_work_meta_nonce'], 'fuga_portfolio_work_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array( 'work_site_url', 'work_github_url', 'work_tech_stack', 'work_role' );

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			update_post_meta( $post_id, '_' . $field, $value );
		}
	}
}
add_action( 'save_post_work', 'fuga_portfolio_save_work_meta' );
