<?php
/**
 * フロントページテンプレート（ワンページ構成）
 *
 * @package Fuga_Portfolio
 */

get_header();

get_template_part( 'template-parts/content', 'hero' );
get_template_part( 'template-parts/content', 'about' );
get_template_part( 'template-parts/content', 'works' );
get_template_part( 'template-parts/content', 'skills' );
get_template_part( 'template-parts/content', 'contact' );

get_footer();
