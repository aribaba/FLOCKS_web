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
    remove_meta_box('twcm_twitter_card_type-hide','post','normal');
    remove_meta_box('aiosp-hide','post','normal');
    remove_meta_box('tagsdiv-隠しタグ-hide','post','normal');
    remove_meta_box('ogp__open_graph_pro-hide','post','normal');
    remove_meta_box('post_meta_box-hide','post','normal');
    remove_meta_box('yarpp_relatedposts-hide','post','normal');
    remove_meta_box('','post','normal');


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

add_action('pre_get_posts', 'query_set_only_author' );
function query_set_only_author( $wp_query ) {
    global $current_user;
    //管理画面であること  edit_others_posts権限がないこと post_typeがacfでないこと（Advanced Custom Fieldsないときは外して良い）
    if( is_admin() && !current_user_can('edit_others_posts')  && $wp_query->query_vars['post_type'] != 'acf') {
        $wp_query->set( 'author', $current_user->ID );
        $screen = get_current_screen();
        add_filter('views_'.$screen->id, 'fix_post_counts');
        add_filter('views_upload', 'fix_media_counts');
    }
}
 
// Fix post counts
function fix_post_counts($views) {
    global $current_user, $wp_query,$post_type;
    unset($views['mine']);
    $types = array(
        array( 'status' =>  NULL ),
        array( 'status' => 'publish' ),
        array( 'status' => 'draft' ),
        array( 'status' => 'pending' ),
        array( 'status' => 'trash' )
    );
    foreach( $types as $type ) {
                $query = array(
                    'author'      => $current_user->ID,
                    'post_type'   => $post_type,//全投稿タイプで対応できるようにするため、ここは投稿タイプで取得する
                    'post_status' => $type['status']
                );
                $result = new WP_Query($query);
                if($type['status'] == NULL):
               $class = ($wp_query->query_vars['post_status'] == NULL)  ? ' class="current"' : '';
               $views['all'] = sprintf(__('<a href="%s"'. $class  .'>' . __('All') . ' <span class="count">(%d)</span></a>', 'all'),
                    admin_url('edit.php?post_type='.$post_type),
                    $result->found_posts);
          elseif($type['status'] == 'publish'):
               $class = ($wp_query->query_vars['post_status'] == 'publish') ? ' class="current"' : '';
               $views['publish'] = sprintf(__('<a href="%s"'. $class .'>' . __('Published') . ' <span class="count">(%d)</span></a>', 'publish'),
                    admin_url('edit.php? post_status=publish&post_type='.$post_type),
                    $result->found_posts);
          elseif($type['status'] == 'draft'):
               $class = ($wp_query->query_vars['post_status'] == 'draft') ? ' class="current"' : '';
               $views['draft'] = sprintf(__('<a href="%s"'. $class .'>'. __('Draft') . ((sizeof($result->posts) > 1) ? "s" : "") .' <span class="count">(%d)</span></a>', 'draft'),
                    admin_url('edit.php?post_status=draft&post_type='.$post_type),
                    $result->found_posts);
          elseif($type['status'] == 'pending'):
               $class = ($wp_query->query_vars['post_status'] == 'pending') ? ' class="current"' : '';
               $views['pending'] = sprintf(__('<a href="%s"'. $class .'>'. __('Pending') .' <span class="count">(%d)</span></a>', 'pending'),
                    admin_url('edit.php?post_status=pending&post_type='.$post_type),
                    $result->found_posts);
          elseif($type['status'] == 'trash'):
               $class = ($wp_query->query_vars['post_status'] == 'trash') ? ' class="current"' : '';
               $views['trash'] = sprintf(__('<a href="%s"'. $class .'>'. __('Trash') .' <span class="count">(%d)</span></a>', 'trash'),
                    admin_url('edit.php?post_status=trash&post_type='.$post_type),
                    $result->found_posts);
          endif;
    }
    return $views;
}
 
// Fix media counts
function fix_media_counts($views) {
     global $wpdb, $current_user, $post_mime_types,  $avail_post_mime_types;
     $views = array();
     $count = $wpdb->get_results("
          SELECT post_mime_type, COUNT( * ) AS num_posts
          FROM $wpdb->posts
          WHERE post_type = 'attachment'
          AND post_author = $current_user->ID
          AND post_status != 'trash'
          GROUP BY post_mime_type
     ", ARRAY_A );
     foreach($count as $row)
          if ($count && $row != 0) {
               $_num_posts[$row['post_mime_type']] = $row['num_posts'];
               $_total_posts = array_sum($_num_posts);
               $detached = isset($_REQUEST['detached']) || isset($_REQUEST['find_detached']);
          };
     if (!isset($total_orphans))
          $total_orphans = $wpdb->get_var("
               SELECT COUNT( * )
               FROM $wpdb->posts
               WHERE post_type = 'attachment'
               AND post_author = $current_user->ID
               AND post_status != 'trash'
               AND post_parent < 1
          ");
     $matches = wp_match_mime_types(array_keys($post_mime_types), array_keys($_num_posts));
     foreach ($matches as $type => $reals)
          foreach ($reals as $real)
               $num_posts[$type] = ( isset($num_posts[$type])) ? $num_posts[$type] + $_num_posts[$real] : $_num_posts[$real];
     $class = (empty($_GET['post_mime_type']) && !$detached && !isset($_GET['status'])) ? ' class="current"' : '';
     $views['all'] = "<a href='upload.php'$class>" . sprintf(__(__('All') .' <span class="count">(%s)</span>', 'uploaded files'), number_format_i18n($_total_posts)) . '</a>';
     foreach ( $post_mime_types as $mime_type => $label ) {
          $class = '';
          if (!wp_match_mime_types($mime_type, $avail_post_mime_types))
               continue;
          if (!empty($_GET['post_mime_type']) && wp_match_mime_types($mime_type, $_GET['post_mime_type']))
               $class = ' class="current"';
          if (!empty( $num_posts[$mime_type]))
               $views[$mime_type] = "<a href='upload.php?post_mime_type=$mime_type'$class>" . sprintf(translate_nooped_plural($label[2], $num_posts[$mime_type]), $num_posts[$mime_type]) . '</a>';
     }
     $views['detached'] = '<a href="upload.php?detached=1"' . ($detached ? ' class="current"' : '') . '>' . sprintf(_x('Unattached <span class="count">(%s)</span>', 'detached files'), $total_orphans) . '</a>';
     return $views;
}





