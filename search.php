<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="contents-body">
	<?php
		if (!is_front_page() && function_exists('bread_crumb')) :
			bread_crumb('navi_element=nav&elm_id=bread-crumb');
		endif;
		?>
	<header class="search_page_header">
		<h1 class="search_page_title">
			<?php the_search_query(); ?>　の検索結果
		</h1>
	</header>
	<div class="post">
<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
    get_template_part('content-archive');
  endwhile;
  if(function_exists('page_navi')) :
  	page_navi('elm_class=page-nav&edge_type=span');
endif;
else :
?>
   <p id="not-article">該当する記事が存在しません。</p>
   <?php
   endif;
   ?>
</div>
<!--post end-->
</div>
<!--contents-body end-->

<?php get_footer(); ?>