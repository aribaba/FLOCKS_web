<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="contents-body">


<?php include_once("slideshow.php"); ?>


<?php
$paged = get_query_var('page');
$categories = get_categories('child_of=1&orderby=count&order=desc&exclude=295');
$count = 1;
		foreach($categories as $category) :
			if($count == 1){
				echo '<input type="radio" name="switch" id="' . $category -> category_nicename . '" checked>';
			}else{
				echo '<input type="radio" name="switch" id="' . $category -> category_nicename . '" >';
			}

			$count++;
			endforeach;

		echo '<ul id="cat_list_Btn">';
		foreach($categories as $category) :
			echo '<li class="cat_li ' . $category -> category_nicename . '">';
			echo '<label for="' . $category -> category_nicename . '">';
			echo '<h1 class="page-title">' . $category -> name . '</h1>' ;
			echo '</label>';
			echo '</li>' ;
		endforeach;
		echo '</ul>';
	echo '<div id="front_article_wrapper" class="clear-fix">';
	echo '<div id="front_article_contents">';
		foreach($categories as $category) :
			echo '<div class="front_article_archive" id="' . $category -> category_nicename . '" >';
			query_posts($query_string .  '&' .'posts_per_page=5&cat='. $category -> cat_ID .' &paged='.$paged);
			if (have_posts()) :
				while (have_posts()) :
				the_post();
				get_template_part('content-archive');
			  endwhile;
			endif;
			echo '</div>';

		endforeach;
	echo '</div>';
	echo '</div>';

?>




<?php wp_pagenavi();
wp_reset_query();
?>


</div>








<!--contents-body end-->
<?php get_footer(); ?>