<?php get_header();?>

<div id="author-sidebar">

<div id="author-img">
<?php echo get_avatar($author , 150) ?>
</div>


<?php $userdata = get_userdata($author); ?>

<div id="author-name">
	<div id="author-left">
	<?php echo $userdata->display_name; ?>
	</div>


<span id="author-cast">
	<?php echo $userdata->cast; ?>
</span>


</div>



<ul id="author-page-sns" class="clear-fix">
	<li class="author-twitter">
<?php
if ($userdata->twitter) {
	?>
	<a href="https://twitter.com/<?php echo $userdata->twitter ; ?>" target="_blank">
	<img src="http://aribaba845.sakura.ne.jp/aribaba_book/wp-content/uploads/2014/07/twitter-icon.png" class="fade-black fade">
	</a>
        <?php
}
?>
</li>
<li class="author-facebook">
	<?php
    if ($userdata->facebook) {
    	?>
    	<a href="https://www.facebook.com/<?php echo $userdata->facebook ; ?>" target="_blank">
    		<img src="http://aribaba845.sakura.ne.jp/aribaba_book/wp-content/uploads/2014/07/facebook-icon.png" class="fade-black fade">

        </a>
        <?php
    }
?>
</li>

</ul>


<div id="author-description">
	<?php echo $userdata->description; ?>
</div>

</div>
<!--sidebar end-->

<div id="contents_body_author_page">
	<?php
		if (!is_front_page() && function_exists('bread_crumb')) :
			bread_crumb('navi_element=nav&elm_id=bread-crumb');
		endif;
		?>
	<header class="author-header">
		<h1 class="page-title">
			<?php
			if(is_author()) :
				echo esc_html(get_the_author_meta('display_name',get_query_var('author')));?><span>さんの記事一覧</span>
			<?php
			else :
			single_cat_title();
		endif;
		?>
		</h1>
	</header>
	<div class="post">
<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
    get_template_part('content-archive');
  endwhile;
endif;
?>
</div>

<?php wp_pagenavi(); ?>
<!--post end-->
</div>
<!--contents-body end-->


</div>
<?php get_footer(); ?>


<!--
<div class="user-info">
	<div class="user-thumbnail">
  <?php userphoto_the_author_photo() ?>
</div>
<div class="user-right">
<div class="user-name">
<?php the_author_meta( last_name, $author ); ?>
<?php the_author_meta( first_name, $author ); ?>
</div>
<div class="user-twitter">
<?php
    $user_data = get_userdata($author);
    if ($user_data->twitter) {
        echo $user_data->twitter . "<br />";
    }
?>
</div>
<div class="facebook">
<?php
    if ($user_data->facebook) {
        echo $user_data->facebook . "<br />";
    }
?>
</div>

<?php the_author_meta( user_url, $author ); ?>

<div class="user-description">
<?php the_author_meta( description, $author ); ?>
</div>


</div>

<?php the_author_posts_link(); ?>
 -->

