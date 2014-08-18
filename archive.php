<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="contents-body">

	<header id="archive-header" class="<?php if ( is_category() || is_single())
 { ?><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat -> category_nicename; } ?> <?php }
  ?>">
		<h1 class="page-title" >
			<?php
			if(is_author()) :
				echo esc_html(get_the_author_meta('display_name',get_query_var('author')));
			else :
			single_cat_title();
		endif;
		?>
		</h1>

	</header>
	<div id="article-top">
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
<!--post end-->

<?php wp_pagenavi(); ?>
</div>
</div>

<!--contents-body end-->

<?php get_footer(); ?>