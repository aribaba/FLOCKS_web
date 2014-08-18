<article class="entry fade fade-black-2">
	<a href="<?php the_permalink(); ?>" >
        <div class="entry-figure">

				<?php the_post_thumbnail(); ?>
		</div>
		<div class="title">
		    <div class="entry-title">

				<h1>

            <?php

              $terms = get_the_terms( $post->id, 'feature' );
if ( !empty($terms) ) {
    if ( !is_wp_error( $terms ) ) {
        foreach( $terms as $term ) {
            echo '【' . $term->name . '】';
        }
    }
}
?><?php the_title(); ?></h1>
 <span class="feature-name">

            </span>
            <span class="article-excerpt">
				<?php echo mb_strimwidth(get_the_excerpt(), 0, 160, "…", "UTF-8"); ?>
                </span>
		    </div>
		    <!-- <div class="side-corner-tag"><p><span>
		    <?php
                 $cat = get_the_category();
                 $catname = $cat[0]->cat_name;
                 echo $catname;
            ?>
             </span></p></div> -->
             <span class="<?php $cat = get_the_category(); $cat = $cat[0];echo $cat -> category_nicename; ?>"
   id="balloon-3-top-right">
             <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
             </span>




             <?php
             if(!is_search()):
             	?>
            <span>
                <div class="top-user-thumbnail">
           <?php echo get_avatar(get_the_author_id(), 30); ?>          </div></span>
             <span class="author-vcard">
             	<?php the_author_nickname(); ?>
             </span>


             <?php
             endif;
             ?>



		    <div class="box-time">
				<time pubdate ="pubdate" datetime="<?php echo get_post_time('Y-m-d'); ?>" class="time">
				<?php echo get_post_time('Y/m/d(D)'); ?>
				</time>
			</div>
            <ul class="sns-counts-num">
                <li class="fb-counts-num">
                    <div id="socialarea_facebook_<?php echo $post->ID;?>"><p>F:&nbsp;<span class="count"></span></p></div>
                </li>
                <li class="tw-counts-num">
                    <div id="socialarea_twitter_<?php echo $post->ID;?>"><p>T:&nbsp;<span class="count"></span></p></div>
                </li>
                <li class="hb-counts-num">
                    <div id="socialarea_hatebu_<?php echo $post->ID;?>"><p>H:&nbsp;<span class="count"></span></p></div>
                </li>
        </ul>
        <script type="text/javascript">
        get_social_count_facebook("<?php the_permalink(); ?>", "socialarea_facebook_<?php echo $post->ID;?>");
        get_social_count_twitter("<?php the_permalink(); ?>", "socialarea_twitter_<?php echo $post->ID;?>");
        get_social_count_hatebu("<?php the_permalink(); ?>", "socialarea_hatebu_<?php echo $post->ID;?>");
</script>
			<?php reaction_buttons_html() ;?>
	    </div>
<!-- <div id="balloon-3-top-right">
	<span>
	<?php $cat = get_the_category(); ?>
<?php $cat = $cat[0]; ?>
<?php echo get_cat_name($cat->term_id); ?>
</span></div> -->
</a>
</article>