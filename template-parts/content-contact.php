<?php
/**
 * Contactセクション
 *
 * @package Fuga_Portfolio
 */

$contact_text  = get_theme_mod( 'fuga_contact_text', 'お仕事のご相談・お見積もりなど、お気軽にお問い合わせください。' );
$contact_email = get_theme_mod( 'fuga_contact_email' );
?>

<section class="contact section section-alt" id="contact">
	<div class="container">
		<div class="section-header" data-animate="fade-up">
			<h2 class="section-title">Contact</h2>
			<p class="section-subtitle">お問い合わせ</p>
		</div>

		<div class="contact-content" data-animate="fade-up">
			<p class="contact-description"><?php echo esc_html( $contact_text ); ?></p>

			<div class="contact-methods">
				<?php if ( $contact_email ) : ?>
					<a href="mailto:<?php echo esc_attr( $contact_email ); ?>" class="btn btn-primary btn-lg">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
						メールで相談する
					</a>
				<?php else : ?>
					<p class="contact-note">※ カスタマイザーからメールアドレスを設定してください。</p>
				<?php endif; ?>

				<?php fuga_portfolio_sns_links(); ?>
			</div>
		</div>
	</div>
</section>
