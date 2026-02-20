<?php
/**
 * スキルセクション
 *
 * @package Fuga_Portfolio
 */

$skill_groups = array(
	array(
		'title'  => 'WordPress',
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM3.443 12c0-1.174.241-2.292.674-3.309l3.711 10.168C5.234 17.205 3.443 14.812 3.443 12zm8.557 8.557c-.795 0-1.564-.112-2.293-.322l2.435-7.075 2.494 6.834c.016.04.036.077.057.112-.862.29-1.782.451-2.693.451zm1.122-12.528c.489-.026.929-.077.929-.077.437-.052.386-.694-.052-.668 0 0-1.314.103-2.162.103-.796 0-2.136-.103-2.136-.103-.437-.026-.489.642-.051.668 0 0 .414.052.852.077l1.265 3.468-1.777 5.33L7.07 7.029c.489-.026.929-.077.929-.077.437-.052.385-.694-.052-.668 0 0-1.314.103-2.162.103-.152 0-.332-.004-.519-.011C7.353 4.393 9.542 3.443 12 3.443c1.829 0 3.497.699 4.748 1.845-.03-.002-.06-.007-.09-.007-.796 0-1.36.693-1.36 1.437 0 .668.385 1.233.796 1.901.308.539.668 1.231.668 2.23 0 .693-.266 1.494-.616 2.614l-.808 2.698-2.916-8.672zm4.792 1.745c.46.858.72 1.837.72 2.876 0 2.195-1.195 4.07-2.916 5.126l1.792-5.182c.334-.84.46-1.51.46-2.108 0-.215-.014-.415-.056-.712z"/></svg>',
		'skills' => array( 'テーマ開発', 'プラグイン開発', 'カスタム投稿タイプ', 'カスタマイザーAPI', 'ブロックエディタ', 'WooCommerce' ),
	),
	array(
		'title'  => 'フロントエンド',
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
		'skills' => array( 'HTML / CSS', 'JavaScript', 'TypeScript', 'React', 'Next.js', 'Tailwind CSS' ),
	),
	array(
		'title'  => 'モバイル',
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><path d="M12 18h.01"/></svg>',
		'skills' => array( 'Flutter', 'Dart', 'React Native', 'Expo' ),
	),
	array(
		'title'  => 'バックエンド / インフラ',
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>',
		'skills' => array( 'PHP', 'Node.js', 'PostgreSQL', 'Prisma', 'Firebase', 'Supabase', 'Vercel', 'AWS' ),
	),
);
?>

<section class="skills section" id="skills">
	<div class="container">
		<div class="section-header" data-animate="fade-up">
			<h2 class="section-title">Skills</h2>
			<p class="section-subtitle">技術スタック</p>
		</div>

		<div class="skills-grid" data-animate="fade-up-stagger">
			<?php foreach ( $skill_groups as $group ) : ?>
				<div class="skill-card">
					<div class="skill-card-icon">
						<?php echo $group['icon']; ?>
					</div>
					<h3 class="skill-card-title"><?php echo esc_html( $group['title'] ); ?></h3>
					<ul class="skill-list">
						<?php foreach ( $group['skills'] as $skill ) : ?>
							<li><?php echo esc_html( $skill ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
