<?php get_header();?>
<?php get_sidebar(); ?>
<div id="article-page">
<div id="contents-body">
<?php
if (have_posts()) :
  while (have_posts()) :
	the_post();
    get_template_part('content');
  endwhile;
endif;
?>
<!-- <div id="previous_post">
<?php previous_post_link('%link', '%title', TRUE, ''); ?>
</div>
<div id="next_post">
<?php next_post_link('%link', '%title', TRUE, ''); ?>
</div>
 -->
</div>
</div>
<!--contents-body end-->

<?php get_footer(); ?>