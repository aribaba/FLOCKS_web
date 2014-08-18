<article class="top-article">
	<?php
		if (!is_front_page() && function_exists('bread_crumb')) :
			bread_crumb('navi_element=nav&elm_id=bread-crumb');
		endif;
		?>

            <div id="page-title">
            <h1>
                <?php the_title(); ?>
            </h1>
            </div>


        <div class="favorite-list-article">
           <?php wpfp_list_favorite_posts(); ?>
        </div>
</article>

