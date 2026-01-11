<?php
/**
 * Template Name: Layout Samples
 * Template Post Type: page
 *
 * WordPress副業案件でよく使われるレイアウトパターンのサンプル集
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

get_header();
?>

<!-- =====================================================
     ページヘッダー
     ===================================================== -->
<section class="hero hero--half">
    <div class="container">
        <div class="hero__content text-center" style="max-width: 100%;">
            <h1 class="hero__title"><?php esc_html_e('Layout Samples', 'developer-portfolio'); ?></h1>
            <p class="hero__text">
                <?php esc_html_e('WordPress案件でよく使われるレイアウトパターンを実装しています。このページを参考に、どんなデザインが実現できるかご確認ください。', 'developer-portfolio'); ?>
            </p>
        </div>
    </div>
</section>

<!-- =====================================================
     目次
     ===================================================== -->
<section class="section section--gray">
    <div class="container container--narrow">
        <h2 class="text-center mb-xl"><?php esc_html_e('Available Layouts', 'developer-portfolio'); ?></h2>
        <nav class="grid grid--3" style="gap: var(--spacing-md);">
            <a href="#layout-hero" class="btn btn--secondary btn--full">Hero Section</a>
            <a href="#layout-features" class="btn btn--secondary btn--full">Feature Cards</a>
            <a href="#layout-two-col" class="btn btn--secondary btn--full">Two Column</a>
            <a href="#layout-grid" class="btn btn--secondary btn--full">Grid Layout</a>
            <a href="#layout-pricing" class="btn btn--secondary btn--full">Pricing Table</a>
            <a href="#layout-testimonials" class="btn btn--secondary btn--full">Testimonials</a>
            <a href="#layout-faq" class="btn btn--secondary btn--full">FAQ Accordion</a>
            <a href="#layout-cta" class="btn btn--secondary btn--full">CTA Section</a>
            <a href="#layout-form" class="btn btn--secondary btn--full">Contact Form</a>
        </nav>
    </div>
</section>

<!-- =====================================================
     1. Hero Variations
     ===================================================== -->
<section class="section" id="layout-hero">
    <div class="container">
        <header class="section__header">
            <span class="tag tag--primary mb-md"><?php esc_html_e('Layout #1', 'developer-portfolio'); ?></span>
            <h2 class="section__title"><?php esc_html_e('Hero Section', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('ファーストビューで印象を決めるヒーローセクション', 'developer-portfolio'); ?></p>
        </header>

        <!-- Split Hero Demo -->
        <div class="card" style="overflow: hidden; margin-bottom: var(--spacing-2xl);">
            <div class="hero--split" style="min-height: auto; padding: var(--spacing-3xl); background: linear-gradient(135deg, var(--color-gray-900), var(--color-gray-800));">
                <div class="hero__content">
                    <h3 class="hero__title" style="font-size: var(--font-size-3xl);">Split Hero Layout</h3>
                    <p class="hero__text" style="font-size: var(--font-size-base);">画像とテキストを左右に配置するスプリットレイアウト。サービス紹介やLP向け。</p>
                    <div class="hero__buttons">
                        <a href="#" class="btn btn--primary">Primary Button</a>
                        <a href="#" class="btn btn--secondary" style="border-color: #fff; color: #fff;">Secondary</a>
                    </div>
                </div>
                <div class="hero__image" style="display: flex; align-items: center; justify-content: center;">
                    <div style="width: 200px; height: 200px; background: linear-gradient(135deg, var(--color-primary), var(--color-accent)); border-radius: var(--border-radius-xl);"></div>
                </div>
            </div>
        </div>

        <div class="grid grid--2">
            <div class="card" style="padding: var(--spacing-xl);">
                <h4 class="mb-md"><?php esc_html_e('Hero Types', 'developer-portfolio'); ?></h4>
                <ul style="list-style: disc; padding-left: var(--spacing-lg); color: var(--color-gray-600);">
                    <li>フルスクリーンヒーロー</li>
                    <li>ハーフヒーロー（60vh）</li>
                    <li>スプリットヒーロー（画像付き）</li>
                    <li>ビデオ背景ヒーロー</li>
                    <li>パララックスヒーロー</li>
                </ul>
            </div>
            <div class="card" style="padding: var(--spacing-xl);">
                <h4 class="mb-md"><?php esc_html_e('Use Cases', 'developer-portfolio'); ?></h4>
                <ul style="list-style: disc; padding-left: var(--spacing-lg); color: var(--color-gray-600);">
                    <li>コーポレートサイト</li>
                    <li>ランディングページ</li>
                    <li>ポートフォリオ</li>
                    <li>プロダクト紹介</li>
                    <li>キャンペーンページ</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
     2. Feature Cards
     ===================================================== -->
<section class="section section--gray" id="layout-features">
    <div class="container">
        <header class="section__header">
            <span class="tag tag--primary mb-md"><?php esc_html_e('Layout #2', 'developer-portfolio'); ?></span>
            <h2 class="section__title"><?php esc_html_e('Feature Cards', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('サービス・特徴を分かりやすく伝えるカードレイアウト', 'developer-portfolio'); ?></p>
        </header>

        <div class="grid grid--4">
            <?php
            $features = array(
                array('icon' => '🚀', 'title' => 'Fast', 'desc' => '高速表示'),
                array('icon' => '🎨', 'title' => 'Design', 'desc' => 'モダンデザイン'),
                array('icon' => '📱', 'title' => 'Responsive', 'desc' => 'スマホ対応'),
                array('icon' => '🔒', 'title' => 'Secure', 'desc' => 'セキュリティ'),
            );
            foreach ($features as $feature) :
            ?>
            <div class="card feature-card">
                <div class="feature-card__icon" style="font-size: var(--font-size-3xl); background: none;">
                    <?php echo $feature['icon']; ?>
                </div>
                <h4 class="feature-card__title"><?php echo esc_html($feature['title']); ?></h4>
                <p class="feature-card__text"><?php echo esc_html($feature['desc']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <p class="text-center mt-xl" style="color: var(--color-gray-500);">
            <?php esc_html_e('3カラム、4カラム、アイコン付きなど様々なバリエーションが可能です', 'developer-portfolio'); ?>
        </p>
    </div>
</section>

<!-- =====================================================
     3. Two Column Layout
     ===================================================== -->
<section class="section" id="layout-two-col">
    <div class="container">
        <header class="section__header">
            <span class="tag tag--primary mb-md"><?php esc_html_e('Layout #3', 'developer-portfolio'); ?></span>
            <h2 class="section__title"><?php esc_html_e('Two Column Layout', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('コンテンツと画像を交互に配置する王道レイアウト', 'developer-portfolio'); ?></p>
        </header>

        <!-- Standard Two Column -->
        <div class="two-col mb-3xl">
            <div>
                <h3 class="mb-md"><?php esc_html_e('Standard Layout', 'developer-portfolio'); ?></h3>
                <p class="mb-lg" style="color: var(--color-gray-600);">
                    テキストと画像を左右に配置するシンプルなレイアウト。サービス説明や会社紹介でよく使用されます。
                </p>
                <ul style="list-style: none;">
                    <li style="padding: var(--spacing-sm) 0; display: flex; align-items: center; gap: var(--spacing-sm);">
                        <span style="color: var(--color-success);">✓</span> 読みやすい
                    </li>
                    <li style="padding: var(--spacing-sm) 0; display: flex; align-items: center; gap: var(--spacing-sm);">
                        <span style="color: var(--color-success);">✓</span> 視線誘導しやすい
                    </li>
                    <li style="padding: var(--spacing-sm) 0; display: flex; align-items: center; gap: var(--spacing-sm);">
                        <span style="color: var(--color-success);">✓</span> モバイル対応が簡単
                    </li>
                </ul>
            </div>
            <div style="background: linear-gradient(135deg, var(--color-primary), var(--color-accent)); border-radius: var(--border-radius-lg); min-height: 300px;"></div>
        </div>

        <!-- Reverse Two Column -->
        <div class="two-col two-col--reverse">
            <div style="background: linear-gradient(135deg, var(--color-gray-700), var(--color-gray-900)); border-radius: var(--border-radius-lg); min-height: 300px;"></div>
            <div>
                <h3 class="mb-md"><?php esc_html_e('Reverse Layout', 'developer-portfolio'); ?></h3>
                <p class="mb-lg" style="color: var(--color-gray-600);">
                    画像とテキストの配置を逆にしたバリエーション。交互に使用することでリズムを作り出します。
                </p>
                <a href="#" class="btn btn--primary"><?php esc_html_e('Learn More', 'developer-portfolio'); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
     4. Grid Layout
     ===================================================== -->
<section class="section section--gray" id="layout-grid">
    <div class="container">
        <header class="section__header">
            <span class="tag tag--primary mb-md"><?php esc_html_e('Layout #4', 'developer-portfolio'); ?></span>
            <h2 class="section__title"><?php esc_html_e('Grid Layout', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('ポートフォリオ・ブログ・商品一覧に最適', 'developer-portfolio'); ?></p>
        </header>

        <div class="grid grid--3">
            <?php for ($i = 1; $i <= 6; $i++) : ?>
            <div class="card">
                <div class="card__image">
                    <div style="background: linear-gradient(135deg, hsl(<?php echo ($i * 50); ?>, 70%, 60%), hsl(<?php echo ($i * 50 + 40); ?>, 70%, 50%)); aspect-ratio: 16/10;"></div>
                </div>
                <div class="card__body">
                    <h4 class="card__title">Card Title <?php echo $i; ?></h4>
                    <p class="card__text">カードの説明文がここに入ります。</p>
                    <div class="card__tags">
                        <span class="tag tag--primary">Tag</span>
                        <span class="tag">Tag</span>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- =====================================================
     5. Pricing Table
     ===================================================== -->
<section class="section" id="layout-pricing">
    <div class="container">
        <header class="section__header">
            <span class="tag tag--primary mb-md"><?php esc_html_e('Layout #5', 'developer-portfolio'); ?></span>
            <h2 class="section__title"><?php esc_html_e('Pricing Table', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('サービスの料金プランを分かりやすく表示', 'developer-portfolio'); ?></p>
        </header>

        <div class="grid grid--3">
            <div class="pricing-card">
                <h3 class="pricing-card__title">Basic</h3>
                <div class="pricing-card__price">¥9,800<span>/月</span></div>
                <ul class="pricing-card__features">
                    <li>機能A</li>
                    <li>機能B</li>
                    <li>機能C</li>
                </ul>
                <a href="#" class="btn btn--secondary btn--full">Select</a>
            </div>

            <div class="pricing-card pricing-card--featured">
                <span class="pricing-card__badge">Popular</span>
                <h3 class="pricing-card__title">Pro</h3>
                <div class="pricing-card__price">¥19,800<span>/月</span></div>
                <ul class="pricing-card__features">
                    <li>Basicの全機能</li>
                    <li>機能D</li>
                    <li>機能E</li>
                    <li>優先サポート</li>
                </ul>
                <a href="#" class="btn btn--primary btn--full">Select</a>
            </div>

            <div class="pricing-card">
                <h3 class="pricing-card__title">Enterprise</h3>
                <div class="pricing-card__price">要相談</div>
                <ul class="pricing-card__features">
                    <li>Proの全機能</li>
                    <li>カスタム開発</li>
                    <li>専任サポート</li>
                    <li>SLA保証</li>
                </ul>
                <a href="#" class="btn btn--secondary btn--full">Contact</a>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
     6. Testimonials
     ===================================================== -->
<section class="section section--gray" id="layout-testimonials">
    <div class="container">
        <header class="section__header">
            <span class="tag tag--primary mb-md"><?php esc_html_e('Layout #6', 'developer-portfolio'); ?></span>
            <h2 class="section__title"><?php esc_html_e('Testimonials', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('お客様の声で信頼性をアップ', 'developer-portfolio'); ?></p>
        </header>

        <div class="grid grid--3">
            <?php
            $testimonials = array(
                array('name' => '山田 太郎', 'role' => '株式会社ABC', 'color' => '#667eea'),
                array('name' => '佐藤 花子', 'role' => 'フリーランス', 'color' => '#f093fb'),
                array('name' => '田中 一郎', 'role' => 'スタートアップCEO', 'color' => '#4facfe'),
            );
            foreach ($testimonials as $t) :
            ?>
            <div class="testimonial">
                <p class="testimonial__text">
                    素晴らしいサービスでした。丁寧な対応と高品質な成果物に大満足です。
                </p>
                <div class="testimonial__author">
                    <div class="testimonial__avatar" style="background: <?php echo esc_attr($t['color']); ?>;"></div>
                    <div>
                        <div class="testimonial__name"><?php echo esc_html($t['name']); ?></div>
                        <div class="testimonial__role"><?php echo esc_html($t['role']); ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =====================================================
     7. FAQ Accordion
     ===================================================== -->
<section class="section" id="layout-faq">
    <div class="container container--narrow">
        <header class="section__header">
            <span class="tag tag--primary mb-md"><?php esc_html_e('Layout #7', 'developer-portfolio'); ?></span>
            <h2 class="section__title"><?php esc_html_e('FAQ Accordion', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('よくある質問をコンパクトに表示', 'developer-portfolio'); ?></p>
        </header>

        <div class="accordion">
            <?php
            $faqs = array(
                array('q' => 'アコーディオンとは？', 'a' => 'クリックで開閉するコンテンツ表示パターンです。FAQやヘルプページでよく使用されます。'),
                array('q' => 'カスタマイズは可能？', 'a' => 'はい、色やアイコン、アニメーションなど自由にカスタマイズ可能です。'),
                array('q' => '複数同時に開ける？', 'a' => '設定により、1つだけ開く・複数開ける、両方に対応可能です。'),
            );
            foreach ($faqs as $i => $faq) :
            ?>
            <div class="accordion__item<?php echo $i === 0 ? ' accordion__item--open' : ''; ?>">
                <button class="accordion__header">
                    <?php echo esc_html($faq['q']); ?>
                    <span class="accordion__icon">▼</span>
                </button>
                <div class="accordion__content">
                    <p><?php echo esc_html($faq['a']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =====================================================
     8. CTA Section
     ===================================================== -->
<section class="section section--gray" id="layout-cta">
    <div class="container">
        <header class="section__header">
            <span class="tag tag--primary mb-md"><?php esc_html_e('Layout #8', 'developer-portfolio'); ?></span>
            <h2 class="section__title"><?php esc_html_e('CTA Section', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('ユーザーに行動を促すコールトゥアクション', 'developer-portfolio'); ?></p>
        </header>

        <!-- CTA Demo -->
        <div class="cta" style="border-radius: var(--border-radius-lg);">
            <h3 class="cta__title"><?php esc_html_e('Ready to Get Started?', 'developer-portfolio'); ?></h3>
            <p class="cta__text"><?php esc_html_e('今すぐ無料でお問い合わせください', 'developer-portfolio'); ?></p>
            <div class="flex flex--center gap-md">
                <a href="#" class="btn btn--white btn--large"><?php esc_html_e('Contact Us', 'developer-portfolio'); ?></a>
                <a href="#" class="btn btn--large" style="border: 2px solid #fff; color: #fff;"><?php esc_html_e('Learn More', 'developer-portfolio'); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
     9. Contact Form
     ===================================================== -->
<section class="section" id="layout-form">
    <div class="container container--narrow">
        <header class="section__header">
            <span class="tag tag--primary mb-md"><?php esc_html_e('Layout #9', 'developer-portfolio'); ?></span>
            <h2 class="section__title"><?php esc_html_e('Contact Form', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('お問い合わせ・申し込みフォーム', 'developer-portfolio'); ?></p>
        </header>

        <div class="card" style="padding: var(--spacing-2xl);">
            <form class="contact-form">
                <div class="grid grid--2">
                    <div class="form-group">
                        <label class="form-label">お名前 <span style="color: var(--color-danger);">*</span></label>
                        <input type="text" class="form-input" placeholder="山田 太郎">
                    </div>
                    <div class="form-group">
                        <label class="form-label">メールアドレス <span style="color: var(--color-danger);">*</span></label>
                        <input type="email" class="form-input" placeholder="email@example.com">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">件名</label>
                    <input type="text" class="form-input" placeholder="お問い合わせ内容">
                </div>
                <div class="form-group">
                    <label class="form-label">メッセージ <span style="color: var(--color-danger);">*</span></label>
                    <textarea class="form-textarea" placeholder="お問い合わせ内容をご記入ください"></textarea>
                </div>
                <button type="button" class="btn btn--primary btn--large btn--full">送信する</button>
            </form>
        </div>

        <p class="text-center mt-xl" style="color: var(--color-gray-500); font-size: var(--font-size-sm);">
            <?php esc_html_e('※ Contact Form 7、MW WP Form、Snow Monkey Formsなどのプラグインで実装可能', 'developer-portfolio'); ?>
        </p>
    </div>
</section>

<!-- Final CTA -->
<section class="cta">
    <div class="container">
        <h2 class="cta__title"><?php esc_html_e('気になるレイアウトはありましたか？', 'developer-portfolio'); ?></h2>
        <p class="cta__text"><?php esc_html_e('ご要望に合わせてカスタマイズ可能です。お気軽にご相談ください。', 'developer-portfolio'); ?></p>
        <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn--white btn--large">
            <?php esc_html_e('Contact Now', 'developer-portfolio'); ?>
        </a>
    </div>
</section>

<?php
get_footer();
