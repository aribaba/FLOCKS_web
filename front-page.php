<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="contents-body">


<?php include_once("slideshow.php"); ?>

<div id="article-top">

<?php
$paged = get_query_var('page');
query_posts($query_string .  '&' .'posts_per_page=20&category_name=all&paged='.$paged);
if (have_posts()) :
while (have_posts()) :
	the_post();
get_template_part('content-archive');
  endwhile;
endif;
?>


</div>
<!-- article-top end -->

<?php wp_pagenavi();
wp_reset_query();
?>

<div class="main-column-fb">

<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fflocks.jp&amp;width=710&amp;height=250&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=752067121476709" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:710px; height:250px;" allowTransparency="true"></iframe>


</div>



</div>




<!--contents-body end-->
<?php get_footer(); ?>