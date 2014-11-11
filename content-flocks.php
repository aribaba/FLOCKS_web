<article class="top-article">
	<?php
		if (!is_front_page() && function_exists('bread_crumb')) :
			bread_crumb('navi_element=nav&elm_id=bread-crumb');
		endif;
		?>
        <header class="page-header">
        	<p class="page-thumbnail">
        		<?php the_post_thumbnail('top_thubnail'); ?>
        	</p>
            <h1 class="page-title">
                <?php the_title(); ?>
            </h1>

        </header>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>
</article>

