<?php
/*
Template Name: login
*/
?>
<?php get_header();?>

<div id="contents-body-login">

<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
    get_template_part('content-login');
  endwhile;
endif;
?>

</div>

</div>

<!--contents-body !-->

<?php get_footer(); ?>

