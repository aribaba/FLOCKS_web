<?php
/*
Template Name: favorite-list
*/
?>
<?php get_header();?>
<?php get_sidebar(); ?>
<div id="contents-favorite-list">

<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
    get_template_part('content-favorite-list');
  endwhile;
endif;
?>

</div>

</div>

<!--contents-body !-->

<?php get_footer(); ?>
