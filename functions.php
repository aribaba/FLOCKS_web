<?php


//カスタムメニュー
register_nav_menus(
	array(
		'place_global' => 'グローバル',
		'place_utility'=> 'ユーティリティ',
	)
);

//アイキャッチ画像
add_theme_support('post-thumbnails');

//アイキャッチ画像サイズ設定
set_post_thumbnail_size(130,180,true);

//トップページ用画像サイズ設定
add_image_size('top_thubnail', 130,180,ture );

//まとめ用画像サイズ設定
add_image_size('curation', 210, 140,true );





register_sidebar(array(
	'name' => 'サイドバーウィジェットエリア(上)',
	'id' => 'primary-widget-area',
	'description' => 'サイドバー上部のウィジェットエリア',
	'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
	'before_title' => '<h1 class="widget-title">',
	'after_title' => '</h1>',
	));

register_sidebar(array(
	'name' => 'サイドバーウィジェットエリア（下）',
	'id' => 'secondary-widget-area',
	'description' => 'サイドバー下部のウィジェットエリア',
	'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h1 class="widget-title">',
	'after_title' => '<h1>',
	));

function update_profile_fields( $contactmethods ) {
    unset($contactmethods['aim']);
    unset($contactmethods['jabber']);
    unset($contactmethods['yim']);
    unset($contactmethods['googleplus']);




    $contactmethods['twitter'] = 'Twitter';
    $contactmethods['facebook'] = 'Facebook';
    $contactmethods['cast'] = '役割';
    $contactmethods['place'] = '居住地';
    $contactmethods['birth'] = '生まれ年';
    $contactmethods['user_sex'] = '性別';

    return $contactmethods;
}
add_filter('user_contactmethods','update_profile_fields',10,1);


function remove_post_metaboxes() {
    remove_meta_box('postexcerpt', 'post', 'normal'); // 抜粋
    remove_meta_box('commentstatusdiv', 'post', 'normal'); // コメント設定
    remove_meta_box('trackbacksdiv', 'post', 'normal'); // トラックバック設定
    remove_meta_box('revisionsdiv', 'post', 'normal'); // リビジョン表示
    remove_meta_box('formatdiv', 'post', 'normal'); // フォーマット設定
    remove_meta_box('slugdiv', 'post', 'normal'); // スラッグ設定
    remove_meta_box('authordiv', 'post', 'normal'); // 投稿者
}
add_action('admin_menu', 'remove_post_metaboxes');

function custom_html_editor() {
    echo '<style TYPE="text/css">
    #qt_content_strong,
    #qt_content_em,
    #qt_content_link,
    #qt_content_block,
    #qt_content_del,
    #qt_content_ins,
    #qt_content_img,
    #qt_content_ul,
    #qt_content_ol,
    #qt_content_li,
    #qt_content_code,
    #qt_content_more,
    #qt_content_spell,
    #qt_content_close,
    #qt_content_fullscreen
    {display:none;}
    </style>';
}
add_action('admin_print_styles', 'custom_html_editor', 21);


function add_custom_quicktag() {
?>

<script type="text/javascript">
    QTags.addButton('ed_strong', '強調する', '<strong>', '</strong>');
    QTags.addButton('ed_subtitle', 'サブタイトル','<h2>','</h2>');
    QTags.addButton('ed_summary', '引用','<div class="summary">','</div>');
</script>
<?php
}
add_action('admin_print_footer_scripts','add_custom_quicktag');


//検索ワードが未入力または0の場合にsearch.phpをテンプレートとして使用する
function search_template_redirect() {
	global $wp_query;
	$wp_query->is_search = true;
	$wp_query->is_home = false;
	if (file_exists(TEMPLATEPATH . '/search.php')) {
		include (TEMPLATEPATH .'/search.php' );
	}
	exit;
}

if (isset($_GET['s']) && $_GET['s'] == false) {
	add_action('template_redirect','search_template_redirect' );
}



function remove_admin_bar(){
	if (current_user_can('Subscriber')) { // edit_user(管理者)でなければ
		add_filter('show_admin_bar','__return_false'); // アドミンバーを表示しない
	}
}
add_action( 'admin_menu','remove_admin_bar' );

