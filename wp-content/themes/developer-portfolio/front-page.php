<?php
/**
 * Front Page Template
 *
 * WordPress副業案件でよく使われるレイアウトパターンを実装
 *
 * @package Developer_Portfolio
 * @since 1.0.0
 */

get_header();

$hero_title = get_theme_mod('hero_title', 'WordPress Developer');
$hero_subtitle = get_theme_mod('hero_subtitle', '高品質なWordPressサイトを制作します');
?>

<!-- =====================================================
     1. Hero Section - フルスクリーンヒーロー
     ===================================================== -->
<section class="hero" id="hero">
    <div class="container">
        <div class="hero__content animate-fade-in-up">
            <h1 class="hero__title">
                <?php echo esc_html($hero_title); ?>
            </h1>
            <p class="hero__text">
                <?php echo esc_html($hero_subtitle); ?>
            </p>
            <div class="hero__buttons">
                <a href="#portfolio" class="btn btn--primary btn--large">
                    <?php esc_html_e('View Portfolio', 'developer-portfolio'); ?>
                </a>
                <a href="#contact" class="btn btn--secondary btn--large">
                    <?php esc_html_e('Contact Me', 'developer-portfolio'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
     2. Services Section - 3カラム特徴カード
     ===================================================== -->
<section class="section" id="services">
    <div class="container">
        <header class="section__header">
            <h2 class="section__title"><?php esc_html_e('Services', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('提供できるサービス', 'developer-portfolio'); ?></p>
        </header>

        <div class="grid grid--3">
            <div class="card feature-card">
                <div class="feature-card__icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <h3 class="feature-card__title"><?php esc_html_e('WordPress Theme', 'developer-portfolio'); ?></h3>
                <p class="feature-card__text">
                    <?php esc_html_e('オリジナルテーマの開発から既存テーマのカスタマイズまで対応。レスポンシブデザインで全デバイスに対応します。', 'developer-portfolio'); ?>
                </p>
            </div>

            <div class="card feature-card">
                <div class="feature-card__icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                        <line x1="8" y1="21" x2="16" y2="21"/>
                        <line x1="12" y1="17" x2="12" y2="21"/>
                    </svg>
                </div>
                <h3 class="feature-card__title"><?php esc_html_e('LP Design', 'developer-portfolio'); ?></h3>
                <p class="feature-card__text">
                    <?php esc_html_e('コンバージョン率を意識したランディングページを制作。魅力的なデザインで成果につなげます。', 'developer-portfolio'); ?>
                </p>
            </div>

            <div class="card feature-card">
                <div class="feature-card__icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                    </svg>
                </div>
                <h3 class="feature-card__title"><?php esc_html_e('Site Maintenance', 'developer-portfolio'); ?></h3>
                <p class="feature-card__text">
                    <?php esc_html_e('WordPressの保守・運用をサポート。セキュリティ対策やバックアップ、更新作業をお任せください。', 'developer-portfolio'); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
     3. Skills Section - 2カラム + スキルバー
     ===================================================== -->
<section class="section section--gray" id="skills">
    <div class="container">
        <div class="two-col">
            <div class="two-col__content">
                <h2 class="section__title"><?php esc_html_e('Skills', 'developer-portfolio'); ?></h2>
                <p class="mb-xl">
                    <?php esc_html_e('WordPress開発に必要なスキルセットを幅広く習得しています。フロントエンドからバックエンドまで、高品質なサイト制作が可能です。', 'developer-portfolio'); ?>
                </p>

                <div class="skill-bar">
                    <div class="skill-bar__header">
                        <span class="skill-bar__name">WordPress / PHP</span>
                        <span class="skill-bar__value">90%</span>
                    </div>
                    <div class="skill-bar__track">
                        <div class="skill-bar__fill" style="width: 90%;"></div>
                    </div>
                </div>

                <div class="skill-bar">
                    <div class="skill-bar__header">
                        <span class="skill-bar__name">HTML / CSS / Sass</span>
                        <span class="skill-bar__value">95%</span>
                    </div>
                    <div class="skill-bar__track">
                        <div class="skill-bar__fill" style="width: 95%;"></div>
                    </div>
                </div>

                <div class="skill-bar">
                    <div class="skill-bar__header">
                        <span class="skill-bar__name">JavaScript / jQuery</span>
                        <span class="skill-bar__value">85%</span>
                    </div>
                    <div class="skill-bar__track">
                        <div class="skill-bar__fill" style="width: 85%;"></div>
                    </div>
                </div>

                <div class="skill-bar">
                    <div class="skill-bar__header">
                        <span class="skill-bar__name">UI/UX Design</span>
                        <span class="skill-bar__value">80%</span>
                    </div>
                    <div class="skill-bar__track">
                        <div class="skill-bar__fill" style="width: 80%;"></div>
                    </div>
                </div>
            </div>

            <div class="two-col__image">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/skills-illustration.svg" alt="Skills Illustration">
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
     4. Portfolio Section - グリッドカードレイアウト
     ===================================================== -->
<section class="section" id="portfolio">
    <div class="container">
        <header class="section__header">
            <h2 class="section__title"><?php esc_html_e('Portfolio', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('制作実績', 'developer-portfolio'); ?></p>
        </header>

        <div class="grid grid--3">
            <?php
            $portfolio_query = new WP_Query(array(
                'post_type'      => 'portfolio',
                'posts_per_page' => 6,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            if ($portfolio_query->have_posts()) :
                while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
            ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="card__image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('portfolio-thumb'); ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="card__image">
                            <div style="background: linear-gradient(135deg, var(--color-gray-200), var(--color-gray-300)); aspect-ratio: 16/10;"></div>
                        </div>
                    <?php endif; ?>

                    <div class="card__body">
                        <h3 class="card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="card__text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                        if ($terms && !is_wp_error($terms)) :
                        ?>
                        <div class="card__tags">
                            <?php foreach ($terms as $term) : ?>
                                <span class="tag tag--primary"><?php echo esc_html($term->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Demo cards when no portfolio items exist
                for ($i = 1; $i <= 6; $i++) :
            ?>
                <article class="card">
                    <div class="card__image">
                        <div style="background: linear-gradient(135deg, hsl(<?php echo ($i * 40); ?>, 70%, 60%), hsl(<?php echo ($i * 40 + 30); ?>, 70%, 50%)); aspect-ratio: 16/10;"></div>
                    </div>
                    <div class="card__body">
                        <h3 class="card__title">Portfolio Item <?php echo $i; ?></h3>
                        <p class="card__text">サンプルの制作実績です。WordPressでカスタム投稿タイプを追加することで実際の実績を表示できます。</p>
                        <div class="card__tags">
                            <span class="tag tag--primary">WordPress</span>
                            <span class="tag">Responsive</span>
                        </div>
                    </div>
                </article>
            <?php
                endfor;
            endif;
            ?>
        </div>

        <div class="text-center mt-2xl">
            <a href="<?php echo esc_url(get_post_type_archive_link('portfolio')); ?>" class="btn btn--secondary">
                <?php esc_html_e('View All Works', 'developer-portfolio'); ?>
            </a>
        </div>
    </div>
</section>

<!-- =====================================================
     5. Stats Section - 数字で見る実績
     ===================================================== -->
<section class="section section--dark">
    <div class="container">
        <div class="grid grid--4">
            <div class="stat">
                <div class="stat__number">50+</div>
                <div class="stat__label"><?php esc_html_e('Projects', 'developer-portfolio'); ?></div>
            </div>
            <div class="stat">
                <div class="stat__number">30+</div>
                <div class="stat__label"><?php esc_html_e('Clients', 'developer-portfolio'); ?></div>
            </div>
            <div class="stat">
                <div class="stat__number">5+</div>
                <div class="stat__label"><?php esc_html_e('Years Experience', 'developer-portfolio'); ?></div>
            </div>
            <div class="stat">
                <div class="stat__number">100%</div>
                <div class="stat__label"><?php esc_html_e('Satisfaction', 'developer-portfolio'); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
     6. Pricing Section - 料金表
     ===================================================== -->
<section class="section section--gray" id="pricing">
    <div class="container">
        <header class="section__header">
            <h2 class="section__title"><?php esc_html_e('Pricing', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('料金プラン', 'developer-portfolio'); ?></p>
        </header>

        <div class="grid grid--3">
            <div class="pricing-card">
                <h3 class="pricing-card__title"><?php esc_html_e('Light', 'developer-portfolio'); ?></h3>
                <div class="pricing-card__price">
                    ¥50,000<span>〜</span>
                </div>
                <ul class="pricing-card__features">
                    <li><?php esc_html_e('既存テーマカスタマイズ', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('5ページまで', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('レスポンシブ対応', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('お問い合わせフォーム', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('納期: 2週間〜', 'developer-portfolio'); ?></li>
                </ul>
                <a href="#contact" class="btn btn--secondary btn--full">
                    <?php esc_html_e('Get Started', 'developer-portfolio'); ?>
                </a>
            </div>

            <div class="pricing-card pricing-card--featured">
                <span class="pricing-card__badge"><?php esc_html_e('Popular', 'developer-portfolio'); ?></span>
                <h3 class="pricing-card__title"><?php esc_html_e('Standard', 'developer-portfolio'); ?></h3>
                <div class="pricing-card__price">
                    ¥150,000<span>〜</span>
                </div>
                <ul class="pricing-card__features">
                    <li><?php esc_html_e('オリジナルデザイン', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('10ページまで', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('レスポンシブ対応', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('SEO基本設定', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('ブログ機能', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('納期: 1ヶ月〜', 'developer-portfolio'); ?></li>
                </ul>
                <a href="#contact" class="btn btn--primary btn--full">
                    <?php esc_html_e('Get Started', 'developer-portfolio'); ?>
                </a>
            </div>

            <div class="pricing-card">
                <h3 class="pricing-card__title"><?php esc_html_e('Premium', 'developer-portfolio'); ?></h3>
                <div class="pricing-card__price">
                    ¥300,000<span>〜</span>
                </div>
                <ul class="pricing-card__features">
                    <li><?php esc_html_e('フルオーダーメイド', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('ページ数無制限', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('カスタム機能開発', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('EC機能対応可', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('保守サポート付き', 'developer-portfolio'); ?></li>
                    <li><?php esc_html_e('納期: 要相談', 'developer-portfolio'); ?></li>
                </ul>
                <a href="#contact" class="btn btn--secondary btn--full">
                    <?php esc_html_e('Get Started', 'developer-portfolio'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
     7. Testimonials Section - お客様の声
     ===================================================== -->
<section class="section" id="testimonials">
    <div class="container">
        <header class="section__header">
            <h2 class="section__title"><?php esc_html_e('Testimonials', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('お客様の声', 'developer-portfolio'); ?></p>
        </header>

        <div class="grid grid--2">
            <div class="testimonial">
                <p class="testimonial__text">
                    <?php esc_html_e('丁寧なヒアリングと迅速な対応で、イメージ通りのサイトが完成しました。WordPressの操作方法も分かりやすく教えていただき、とても満足しています。', 'developer-portfolio'); ?>
                </p>
                <div class="testimonial__author">
                    <div class="testimonial__avatar" style="background: linear-gradient(135deg, #667eea, #764ba2); width: 56px; height: 56px; border-radius: 50%;"></div>
                    <div>
                        <div class="testimonial__name"><?php esc_html_e('田中 太郎', 'developer-portfolio'); ?></div>
                        <div class="testimonial__role"><?php esc_html_e('株式会社ABC 代表取締役', 'developer-portfolio'); ?></div>
                    </div>
                </div>
            </div>

            <div class="testimonial">
                <p class="testimonial__text">
                    <?php esc_html_e('SEOを意識した設計で、公開後すぐに検索順位が上がりました。デザインセンスも素晴らしく、ブランドイメージにぴったりのサイトになりました。', 'developer-portfolio'); ?>
                </p>
                <div class="testimonial__author">
                    <div class="testimonial__avatar" style="background: linear-gradient(135deg, #f093fb, #f5576c); width: 56px; height: 56px; border-radius: 50%;"></div>
                    <div>
                        <div class="testimonial__name"><?php esc_html_e('佐藤 花子', 'developer-portfolio'); ?></div>
                        <div class="testimonial__role"><?php esc_html_e('フリーランスデザイナー', 'developer-portfolio'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
     8. FAQ Section - アコーディオン
     ===================================================== -->
<section class="section section--gray" id="faq">
    <div class="container container--narrow">
        <header class="section__header">
            <h2 class="section__title"><?php esc_html_e('FAQ', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('よくあるご質問', 'developer-portfolio'); ?></p>
        </header>

        <div class="accordion">
            <div class="accordion__item accordion__item--open">
                <button class="accordion__header">
                    <?php esc_html_e('制作期間はどのくらいですか？', 'developer-portfolio'); ?>
                    <span class="accordion__icon">▼</span>
                </button>
                <div class="accordion__content">
                    <p><?php esc_html_e('規模にもよりますが、シンプルなサイトで2週間程度、中規模サイトで1ヶ月程度、大規模サイトで2ヶ月以上を目安としています。詳細はヒアリング後にお見積りいたします。', 'developer-portfolio'); ?></p>
                </div>
            </div>

            <div class="accordion__item">
                <button class="accordion__header">
                    <?php esc_html_e('支払い方法は？', 'developer-portfolio'); ?>
                    <span class="accordion__icon">▼</span>
                </button>
                <div class="accordion__content">
                    <p><?php esc_html_e('銀行振込またはクレジットカード（PayPal）でのお支払いに対応しています。着手金として50%、納品時に残り50%をお支払いいただくのが標準です。', 'developer-portfolio'); ?></p>
                </div>
            </div>

            <div class="accordion__item">
                <button class="accordion__header">
                    <?php esc_html_e('修正回数に制限はありますか？', 'developer-portfolio'); ?>
                    <span class="accordion__icon">▼</span>
                </button>
                <div class="accordion__content">
                    <p><?php esc_html_e('デザイン確定前の修正は3回まで無料で対応しています。コーディング後の修正は内容により別途費用が発生する場合がございます。', 'developer-portfolio'); ?></p>
                </div>
            </div>

            <div class="accordion__item">
                <button class="accordion__header">
                    <?php esc_html_e('サーバーやドメインの用意は必要ですか？', 'developer-portfolio'); ?>
                    <span class="accordion__icon">▼</span>
                </button>
                <div class="accordion__content">
                    <p><?php esc_html_e('ご用意いただくことも、こちらで代行取得することも可能です。おすすめのサーバー・ドメインのご提案もいたしますので、お気軽にご相談ください。', 'developer-portfolio'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
     9. CTA Section - コールトゥアクション
     ===================================================== -->
<section class="cta">
    <div class="container">
        <h2 class="cta__title"><?php esc_html_e('Ready to Start Your Project?', 'developer-portfolio'); ?></h2>
        <p class="cta__text"><?php esc_html_e('お気軽にご相談ください。無料でお見積りいたします。', 'developer-portfolio'); ?></p>
        <a href="#contact" class="btn btn--white btn--large">
            <?php esc_html_e('Contact Now', 'developer-portfolio'); ?>
        </a>
    </div>
</section>

<!-- =====================================================
     10. Contact Section - お問い合わせフォーム
     ===================================================== -->
<section class="section" id="contact">
    <div class="container container--narrow">
        <header class="section__header">
            <h2 class="section__title"><?php esc_html_e('Contact', 'developer-portfolio'); ?></h2>
            <p class="section__subtitle"><?php esc_html_e('お問い合わせ', 'developer-portfolio'); ?></p>
        </header>

        <form class="contact-form" action="#" method="post">
            <div class="grid grid--2">
                <div class="form-group">
                    <label class="form-label" for="contact-name"><?php esc_html_e('Name', 'developer-portfolio'); ?> <span style="color: var(--color-danger);">*</span></label>
                    <input type="text" id="contact-name" name="name" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="contact-email"><?php esc_html_e('Email', 'developer-portfolio'); ?> <span style="color: var(--color-danger);">*</span></label>
                    <input type="email" id="contact-email" name="email" class="form-input" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="contact-company"><?php esc_html_e('Company', 'developer-portfolio'); ?></label>
                <input type="text" id="contact-company" name="company" class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label" for="contact-subject"><?php esc_html_e('Subject', 'developer-portfolio'); ?> <span style="color: var(--color-danger);">*</span></label>
                <input type="text" id="contact-subject" name="subject" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="contact-message"><?php esc_html_e('Message', 'developer-portfolio'); ?> <span style="color: var(--color-danger);">*</span></label>
                <textarea id="contact-message" name="message" class="form-textarea" required></textarea>
            </div>

            <button type="submit" class="btn btn--primary btn--large btn--full">
                <?php esc_html_e('Send Message', 'developer-portfolio'); ?>
            </button>
        </form>

        <p class="text-center mt-xl" style="color: var(--color-gray-500); font-size: var(--font-size-sm);">
            <?php esc_html_e('※ Contact Form 7プラグインを使用することで実際のフォーム機能を実装できます', 'developer-portfolio'); ?>
        </p>
    </div>
</section>

<?php
get_footer();
