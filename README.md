# WordPress Developer Portfolio Theme

WordPress副業案件向けポートフォリオテーマです。様々なレイアウトパターンを実装したモダンなテーマで、自分のスキルをアピールできます。

## 特徴

- **レスポンシブデザイン** - スマートフォン・タブレット・PCすべてに対応
- **カスタム投稿タイプ** - ポートフォリオ専用の投稿タイプを搭載
- **カスタマイザー対応** - 管理画面から簡単にカスタマイズ可能
- **日本語対応** - 日本語に最適化されたデザイン

## 実装されているレイアウト

このテーマでは、WordPress案件でよく使われる以下のレイアウトパターンを実装しています：

1. **Hero Section** - フルスクリーン/ハーフ/スプリットヒーロー
2. **Feature Cards** - 3〜4カラムの特徴カード
3. **Two Column** - 画像とテキストの2カラムレイアウト
4. **Grid Layout** - ポートフォリオ/ブログ用グリッド
5. **Pricing Table** - 料金プラン表示
6. **Testimonials** - お客様の声
7. **FAQ Accordion** - アコーディオン形式のFAQ
8. **CTA Section** - コールトゥアクション
9. **Contact Form** - お問い合わせフォーム
10. **Stats Section** - 数字で見る実績

## インストール方法

1. このリポジトリをクローンまたはダウンロード
2. `wp-content/themes/developer-portfolio` フォルダをWordPressの `wp-content/themes/` にコピー
3. WordPress管理画面 → 外観 → テーマ から「Developer Portfolio」を有効化

## ファイル構成

```
developer-portfolio/
├── style.css           # メインスタイルシート（テーマ情報含む）
├── functions.php       # テーマ機能
├── header.php          # ヘッダーテンプレート
├── footer.php          # フッターテンプレート
├── index.php           # メインテンプレート
├── front-page.php      # トップページ
├── page.php            # 固定ページ
├── single.php          # 投稿ページ
├── single-portfolio.php    # ポートフォリオ詳細
├── archive-portfolio.php   # ポートフォリオ一覧
├── page-layouts.php    # レイアウトサンプルページ
├── 404.php             # 404ページ
└── assets/
    ├── css/            # 追加CSS
    ├── js/
    │   └── main.js     # メインJavaScript
    └── images/
        └── skills-illustration.svg
```

## カスタマイズ

### テーマカスタマイザー

WordPress管理画面 → 外観 → カスタマイズ から以下を設定できます：

- **Hero Section** - タイトル、サブタイトル
- **Contact Information** - メールアドレス
- **Social Links** - Twitter, GitHub, LinkedIn, Instagram

### メニュー

- **Primary Menu** - ヘッダーナビゲーション
- **Footer Menu** - フッターナビゲーション

### ウィジェット

- **Sidebar** - サイドバー
- **Footer Widget 1〜3** - フッターウィジェット

## 推奨プラグイン

- **Contact Form 7** - お問い合わせフォーム
- **Yoast SEO** - SEO最適化
- **WP Super Cache** - キャッシュ
- **Akismet** - スパム対策

## レイアウトサンプルページの使い方

1. WordPress管理画面で新規固定ページを作成
2. ページ属性 → テンプレート で「Layout Samples」を選択
3. 公開

このページを見せることで、クライアントにどんなレイアウトが実現できるかをアピールできます。

## CSS変数

テーマは CSS Custom Properties を使用しています。主な変数：

```css
:root {
    --color-primary: #2563eb;      /* プライマリカラー */
    --color-secondary: #64748b;    /* セカンダリカラー */
    --color-accent: #f59e0b;       /* アクセントカラー */
    --container-max: 1200px;       /* コンテナ最大幅 */
}
```

## ブラウザ対応

- Chrome (最新)
- Firefox (最新)
- Safari (最新)
- Edge (最新)

## ライセンス

GNU General Public License v2 or later

## 作者

Your Name

---

このテーマはWordPress副業案件のポートフォリオとして作成されました。
ご質問やフィードバックがあればお気軽にどうぞ。
