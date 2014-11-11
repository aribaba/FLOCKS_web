<article class="top-article">
	<?php
		if (!is_front_page() && function_exists('bread_crumb')) :
			bread_crumb('navi_element=nav&elm_id=bread-crumb');
		endif;
		?>






        <div class="entry-contents clear-fix">

<div id="your-name">
<ul id="header-user">
                <li><div class="header-user-thumbnail">
                    <?php
global $current_user;
get_currentuserinfo();
$user = wp_get_current_user();
?>


           <?php echo get_avatar($user->get('ID'), 100); ?>
                    </div>
                </li>
                <li>
                    <div class="header-user-name">
                        <?php
global $current_user;
get_currentuserinfo();

echo $current_user->user_login;
?>
            </div>

            <div id="article_edit" class="fade-black-2 fade">
                <a href="http://flocks.jp/wp-admin/edit.php?post_type=post&author=<?php echo $user->get('ID')?>">投稿を編集する</a>
            </div>

            </div>

            <?php the_content(); ?>
        </div>
</article>

