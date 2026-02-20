</main>

<footer class="site-footer">
	<div class="container">
		<div class="footer-inner">
			<div class="footer-brand">
				<span class="footer-name"><?php echo esc_html( get_theme_mod( 'fuga_hero_title', 'Fuga Ikeda' ) ); ?></span>
				<span class="footer-role"><?php echo esc_html( get_theme_mod( 'fuga_hero_subtitle', 'WordPress Developer' ) ); ?></span>
			</div>

			<?php fuga_portfolio_sns_links(); ?>
		</div>

		<div class="footer-bottom">
			<p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php echo esc_html( get_theme_mod( 'fuga_hero_title', 'Fuga Ikeda' ) ); ?>. All rights reserved.</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
