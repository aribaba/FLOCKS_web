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

