<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja" dir="ltr" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" dir="ltr" lang="ja">
<head>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />


  <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <meta name="google-site-verification" content="5t7i6IEzuQwrBMmMlIuMPL1qo_xLiDN0mDIikknWPVk" />
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=752067121476709";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>
  <?php global $page, $paged;
if (is_search()):
wp_title('', true, 'left' );
echo ' | ';
else:
  wp_title('|', true ,'right' );
endif;
bloginfo('name');
if (is_front_page()) :
echo " | ";
bloginfo('description');
endif;
if ($paged >= 2 || $page >= 2) :
echo ' | ' . sprintf('%sページ',
  max($paged,$page));
  endif;
  ?></title>



<script type="text/javascript">
window.onload = function(){
  window.document.oncontextmenu
    = function(e){
          var o;
          // IEの場合
          if (!e) {
            o = event.srcElement;
          // その他Firefox,Safari,Cromeなどの場合
          }else{
            o = e.target;
          }
          if(o.tagName&&o.tagName=='IMG') return false;
       }
}
//->
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/floater.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.plugin.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/get_social_count.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/slider.js"></script>

<script>
    $(function(){
        var $selects = $('select');

        $selects.easyDropDown({

            onChange: function(selected){
                // do something
            }
        });
    });
</script>

<script type="text/javascript">window._pt_lt = new Date().getTime();</script>




<?php wp_head(); ?>
</head>
<body <?php if (is_page(134)) {
?> id="flocks-page-body" <?php
}else{ ?> id="page-body" <?php } ?> >
  <?php include_once("analyticstracking.php") ?>

  <script type="text/javascript">
  window._pt_sp_2 = [];
  _pt_sp_2.push('setAccount,2b3a84ed');
  var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
  (function() {
    var atag = document.createElement('script'); atag.type = 'text/javascript'; atag.async = true;
    atag.src = _protocol + 'js.ptengine.jp/pta.js';
    var stag = document.createElement('script'); stag.type = 'text/javascript'; stag.async = true;
    stag.src = _protocol + 'js.ptengine.jp/pts.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(atag, s);s.parentNode.insertBefore(stag, s);
  })();
</script>


<div id="wrap" >
	<!-- header -->
<header id="header">
	<div id="header-contents">
	<div id="site-logo">
    <ul>
      <li>

      <a href="<?php echo home_url('/'); ?>" alt="bloginfo('name'); ?>">
        <img src="http://flocks.jp/wp-content/uploads/2013/11/logo-e1384907740931.png">
              </a>

  </li>
  <li>
    <div id="site-logo-migi">
    <h1>面白いマンガが売れる世界を目指して-フロックス</h1>
  </div>
  </li>
</ul>
	</div>







<div id="checkbox-menu">
  <input type="checkbox" id="checkbox" name="check" value="" />
  <label for="checkbox" id="checkbox_label"></label>
  <div id="login-area">


    <?php if (is_user_logged_in()) : ?>

     <h2><a href="<?php echo wp_logout_url() ?>&amp;redirect_to=<?php echo esc_attr($_SERVER['REQUEST_URI']) ?>">ログアウト</a></h2>

    <?php else : ?>

    <h2>ログイン</h2>
    <form method="post" action="<?php echo wp_login_url() ?>?redirect_to=<?php echo esc_attr($_SERVER['REQUEST_URI']) ?>">

        <p><label for="login_username" id="login_username_label">ユーザー名：</label>

        <input type="text" name="log" id="login_username" value="" /></p>

        <p><label for="login_password" id="login_password_label">パスワード：</label>

        <input type="password" name="pwd" id="login_password" value="" /></p>

        <p><input type="submit" class="fade-black fade" value="ログイン" /></p>

    </form>

    <?php endif; ?>

</div>
</div>

<?php if (is_user_logged_in()) : ?>

<div id="login-user-name" >

  <a href="http://flocks.jp/your-profile/" class="fade fade-black"><p>
    <?php
global $current_user;
get_currentuserinfo();

echo $current_user->user_login;
?>

  </p></a>

</div>

<?php endif ?>



</div>

</header>


<?php if (!is_page(134)) {


 wp_nav_menu(array(
    'container' => 'nav',
    'container_id' => 'global-nav',
    'theme_location' => 'place_global',
    ));


}
?>

<div  <?php if (!is_page(134)) {
 ?> id="contents" <?
}else{ ?> id="contents-flocks" <?php }?>>
