<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="contents-body">

	<header id="taxonomy-header">
		<h1 class="page-title">
		<?php	$taxonomy = $wp_query->get_queried_object();
echo $taxonomy->name;
?>
		</h1>

	</header>
	<div id="article-top">
	<div class="post">

<?php
 $tax_posts = get_posts(array(
            'post_type' => post,
            'posts_per_page' => 3, // 表示させたい記事数
            'tax_query' => array(
                array(
                    'taxonomy'=>'feature',
                    'terms'=>array( $taxonomy->slug ),
                    'field'=>'slug',
                    'include_children'=>true,
                    'operator'=>'IN'
                    ),
                'relation' => 'AND'
                )
            )); ?>
<?php if(have_posts()): ?>
<?php while(have_posts()):the_post(); ?>

<article class="entry">
	<a href="<?php the_permalink(); ?>" >
        <div class="entry-figure">

				<?php the_post_thumbnail(); ?>
		</div>
		<div class="title">
		    <div class="entry-title">
				<h1><?php the_title(); ?></h1>

                <?php echo mb_strimwidth(get_the_excerpt(), 0, 160, "…", "UTF-8"); ?>

		    </div>
		    <!-- <div class="side-corner-tag"><p><span>
		    <?php
                 $cat = get_the_category();
                 $catname = $cat[0]->cat_name;
                 echo $catname;
            ?>
             </span></p></div> -->
             <span class="<?php $cat = get_the_category(); $cat = $cat[0];  echo $cat -> category_nicename; ?>"
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
        </ul>
        <script type="text/javascript">
        get_social_count_facebook("<?php the_permalink(); ?>", "socialarea_facebook_<?php echo $post->ID;?>");
        get_social_count_twitter("<?php the_permalink(); ?>", "socialarea_twitter_<?php echo $post->ID;?>");
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

<?php endwhile; else: ?>

<p>ページがありません。</p>

<?php endif; ?>
<?php wp_reset_query(); ?>
</div>
</div>

<!--contents-body end-->

<?php get_footer(); ?>