<?php
/**
 * 404ページテンプレート
 *
 * @package Fuga_Portfolio
 */

get_header();
?>

<div class="container page-content error-404">
	<div class="error-404-inner">
		<h1 class="error-code">404</h1>
		<p class="error-message">お探しのページが見つかりませんでした。</p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">トップページに戻る</a>
	</div>
</div>

<?php
get_footer();
