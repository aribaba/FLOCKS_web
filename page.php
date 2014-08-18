<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="contents-body">
<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
    get_template_part('content');
  endwhile;
endif;
?>
</div>

<!--contents-body end-->

<?php get_footer(); ?>