<?php
/*
Template Name: your-profile
*/
?>

<?php get_header(); ?>

<div id="contents-your-profile">




<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
    get_template_part('content-your-profile');
  endwhile;
endif;
?>
</div>

<!--contents-body !-->

<?php get_footer(); ?>