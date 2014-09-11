<article class="entry ">
    <div class="entry_1">

        <a href="<?php the_permalink(); ?>" class="fade fade-black entry-figure-a">
        <div class="entry-figure">
				<?php the_post_thumbnail(); ?>
		</div>
        </a>
		<div class="title">
	<a href="<?php the_permalink(); ?>" ><h1 class="fade">
            <?php
              $terms = get_the_terms( $post->id, 'feature' );
        if ( !empty($terms) ) {
          if ( !is_wp_error( $terms ) ) {
            foreach( $terms as $term ) {
              echo '【' . $term->name . '】';
          }
     }
}
?><?php the_title(); ?></h1></a>

             <span class="<?php $cat = get_the_category(); $cat = $cat[0];echo $cat -> category_nicename; ?>"
   id="balloon-3-top-right">
             <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
             </span>

       <!--  <ul class="sns-counts-num">
               <li class="fb-counts-num">
                   <div id="socialarea_facebook_<?php echo $post->ID;?>"><p>F:&nbsp;<span class="count"></span></p></div>
               </li>
               <li class="tw-counts-num">
                   <div id="socialarea_twitter_<?php echo $post->ID;?>"><p>T:&nbsp;<span class="count"></span></p></div>
               </li>
               <li class="hb-counts-num">
                   <div id="socialarea_hatebu_<?php echo $post->ID;?>"><p>H:&nbsp;<span class="count"></span></p></div>
               </li>
               <li class="fv-counts-num">
                   <div id="favorite_area"><p>R:&nbsp;<?php echo get_post_meta($post->ID, 'wpfp_favorites', true); ?></p></div>
               </li>



       </ul>
       <script type="text/javascript">
       get_social_count_facebook("<?php the_permalink(); ?>", "socialarea_facebook_<?php echo $post->ID;?>");
       get_social_count_twitter("<?php the_permalink(); ?>", "socialarea_twitter_<?php echo $post->ID;?>");
       get_social_count_hatebu("<?php the_permalink(); ?>", "socialarea_hatebu_<?php echo $post->ID;?>");
           </script>
        -->

        <p class="article-excerpt">
          <?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "…", "UTF-8"); ?>
        </p>



        <div class="article_under_area">
		    <div class="box-time">
				<time pubdate ="pubdate" datetime="<?php echo get_post_time('Y-m-d'); ?>" class="time">
				<?php echo get_post_time('Y/m/d(D)'); ?>
				</time>
			</div>
            <?php
             if(!is_search()):
                ?>
            <dl class="entry_author_area">
                <dd class="entry_author_thumbnail">
           <?php echo get_avatar(get_the_author_id(), 30); ?>          </dd>
             <dt class="author-vcard">
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" target=" _blank">
                <?php the_author_nickname(); ?>
                </a>
             </dt>
             <?php
             endif;
             ?>

             </dl>
             <!-- <div id="view-style">
                    <span id="view-number">
                        <?php if (function_exists('wpp_get_views'))
                        { echo wpp_get_views( get_the_ID() ); } ?>
                    </span>
                    <span id="view">views</span>
                </div> -->
        </div>

	    </div>
    </div>
    <!-- <a href="<?php the_permalink(); ?>" class="entry_2">
        <div class="entry_2_title">




     </a> -->
</article>