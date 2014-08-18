<article class="top-article">

        <header class="page-header">
        	<p class="page-thumbnail">
        		<?php the_post_thumbnail('top_thubnail'); ?>
        	</p>
            <span id="feature-name">
              <?php echo get_the_term_list($post->ID, 'feature'); ?>

            </span>
            <h1 class="page-title">
                <?php the_title(); ?>
            </h1>
            <div id="page-tag">
            <span class="page-tags" ><?php the_tags(''); ?></span>
            </div>
                    <?php
        $canonical_url=get_permalink();//記事のURL取得
        $title=wp_title( '', false, 'right' ).'｜'.get_bloginfo('name');//記事タイトル取得
        $canonical_url_encode=urlencode($canonical_url);//記事URLエンコード
        $title_encode=urlencode($title);//記事タイトルエンコード
        ?>
        <ul class="social-buttons">

        <div>
            <ul class="page_sns_counter">
                <li class="page_fb_counts">
                    <ul><li>
                        <a onclick="javascript:window.open(encodeURI(decodeURI('http://www.facebook.com/sharer.php?src=bm&u=<?php echo $canonical_url_encode;?>&amp;t=<?php echo $title_encode;?>')), '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" class="page_counts_img" id="page_fb_counts_img"></a>
                        </li>
                        <li>
                            <div id="socialarea_facebook_<?php echo $post->ID;?>" class="page_sns_count_number"><p><span class="count"></span></p>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="page_tw_counts">
                    <ul><li>
                        <a onclick="javascript:window.open(encodeURI(decodeURI('http://twitter.com/intent/tweet?url=<?php echo $canonical_url_encode;?>&text=<?php echo $title_encode; ?>')
                            ), '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" class="page_counts_img" id="page_tw_counts_img">
                        </a>
                        </li>
                        <li>
                    <div id="socialarea_twitter_<?php echo $post->ID;?>" class="page_sns_count_number"><p><span class="count"></span></p></div>
                        </li>
                    </ul>
                </li>
                <li class="page_hb_counts">
                    <ul><li>
                    <a onclick="javascript:window.open('http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $canonical_url_encode;?>&title=<?php echo $_title;?>', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" class="page_counts_img" id="page_hb_counts_img">
                        </a>
                    </li>
                        <li>
                    <div id="socialarea_hatebu_<?php echo $post->ID;?>" class="page_sns_count_number"><p><span class="count"></span></p></div>
                    </li>

                    </ul>
                </li>
                <li class="page_fav_counts">
                    <ul>
                        <li><?php wpfp_link() ?></li>
                        <li id="page_fav_number"><?php echo get_post_meta($post->ID, 'wpfp_favorites', true); ?></li>
                    </ul>
                </li>

                <li><div id="view-style"> <span id="view-number"><?php if (function_exists('wpp_get_views')) { echo wpp_get_views( get_the_ID() ); } ?></span><span id="view">views</span></div></li>
            </ul>
        <script type="text/javascript">
        get_social_count_facebook("<?php the_permalink(); ?>", "socialarea_facebook_<?php echo $post->ID;?>");
        get_social_count_twitter("<?php the_permalink(); ?>", "socialarea_twitter_<?php echo $post->ID;?>");
        get_social_count_hatebu("<?php the_permalink(); ?>", "socialarea_hatebu_<?php echo $post->ID;?>");
        </script>
            <?php reaction_buttons_html() ;?>
        </div>

        <li>
            <ul id="header-user">
                <li><div class="header-user-thumbnail">
           <?php echo get_avatar(get_the_author_id(), 60); ?>          </div>
                </li>
                <li>
                    <div class="header-user-name">
            <?php the_author_posts_link(get_the_author_id()); ?>
            </div>

                </li>
            </ul>
        </li>

        </ul>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

    <div id="favorite-pack">
        <div id="favorite-link">
            <?php wpfp_link() ?>
        </div>

        <div id="favorite-link-number">
            <?php echo get_post_meta($post->ID, 'wpfp_favorites', true); ?>
        </div>

    </div>

    <div class="contents-foot">
        <span id="sns-button">この漫画を他の人におすすめする</span>

    <ul class="social-buttons">
            <li>
        <div class="share-buttons">
    <div class="fb-iine">
        <a href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $canonical_url_encode;?>&amp;t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" class="fade-black fade">
        <span class="icon-facebook-squared-ffffff">&nbsp;FBでシェアする</span>
        </a>
    </div>
    </li>
    <li>
    <div class="tweet">
        <a href="http://twitter.com/intent/tweet?url=<?php echo $canonical_url_encode;?>&text=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" class="fade-black fade">
        <span class="icon-twitter-squared-ffffff">&nbsp;Tweetする</span>
        </a>
    </div>
    </li>


    <li>
                <div class="hatebu">
        <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $canonical_url_encode;?>&title=<?php echo $_title;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" class="fade-black fade">
        <span class="icon-hatebu-squared-ffffff">&nbsp;はてブに追加する</span>
        </a>


    </div>
    </li>
            </ul>


</div>




<div id="related-article-space">

<!-- タグによる関連記事 -->



<?php
// タグを使う場合はこちら
$tags = wp_get_post_tags($post->ID, array('orderby'=>'rand'));?>

<section id="related">
<h1>同タグ(<?php the_tags(''); ?>)の他の記事</h1>
<?php
    $original_post = $post;
    $tags = wp_get_post_tags($post->ID);
    $tagIDs = array();
    if ($tags) {
        $tagcount = count($tags);
        for ($i = 0; $i < $tagcount; $i++) {
            $tagIDs[$i] = $tags[$i]->term_id;
        }
    $args=array(
        'tag__in' => $tagIDs,
    'post__not_in' => array($post->ID),
    'showposts'=>4,
    'caller_get_posts'=>1,
    'orderby' => 'rand',
    );
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <div id="relation"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"onclick="ga('send','event','related_article', 'link_click', 'tag',0,true);" class="fade-black fade"><ul ><li><?php the_post_thumbnail(array(100,100), array('alt'=>get_the_title(), 'title'=>get_the_title())); ?></li  ><li id="relation-title"><?php the_title(); ?></li></ul></a></div>
<?php endwhile; wp_reset_query(); ?>
<?php } else { ?>
   <p>※関連する記事は見当たりません。</p>
<?php } } ?>
</section>


<!-- タグによる関連記事終わり -->


<!-- カテゴリーによる関連記事 -->


<section id="related">


<?php

$cat = get_the_category();
$cat = $cat[0];
$cat_id = $cat->cat_ID;

?>



<h1>同カテゴリー(<a href="http://flocks.jp/arichives/category/all/recommend/<?php echo $cat->slug ?>" ><?php echo $cat->cat_name ?></a>)の他の記事</h1>

<?php




$cat_id = $cat->cat_ID;


    $my_query = new WP_Query('cat=' .$cat_id . '&showposts=4&orderby=rand');
if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <div id="relation"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"onclick="ga('send','event','related_article', 'link_click', 'category',0,true);" class="fade-black fade"><ul ><li><?php the_post_thumbnail(array(100,100), array('alt'=>get_the_title(), 'title'=>get_the_title())); ?></li  ><li id="relation-title"><?php the_title(); ?></li></ul></a></div>
<?php endwhile; wp_reset_query(); ?>
<?php } else { ?>
   <p>※関連する記事は見当たりません。</p>
<?php }  ?>

</section>
</div>
<!-- カテゴリーによる関連記事終わり -->


        <div class="user-info">

    <p id="user">この記事を書いた人</p>

            <div class="user-thumbnail">
           <?php echo get_avatar(get_the_author_id(), 110); ?>          </div>
        <div class="user-right">
            <div class="user-name">
            <?php the_author_posts_link(get_the_author_id()); ?>

            </div>




<div class="user-description">
<?php the_author_meta( description, $author ); ?>
</div>

</div>

<div id="related">

    <div id="related-username"><p><?php the_author_posts_link(get_the_author_id()); ?>さんが書いた記事</p></div>

<?php

$authorId = $post->post_author;


    $my_query = new WP_Query('author=' .$authorId . '&showposts=4&orderby=rand');
if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <div id="relation"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"onclick="ga('send','event','related_article', 'link_click', 'author',0,true);" class="fade-black fade"><ul ><li><?php the_post_thumbnail(array(100,100), array('alt'=>get_the_title(), 'title'=>get_the_title())); ?></li  ><li id="relation-title"><?php the_title(); ?></li></ul></a></div>
<?php endwhile; wp_reset_query(); ?>
<?php } else { ?>
   <p>※関連する記事は見当たりません。</p>
<?php }  ?>
</div>

</div>



<div class="main-column-fb">

<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fflocks.jp&amp;width=710&amp;height=250&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=752067121476709" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:710px; height:250px;" allowTransparency="true"></iframe>


</div>

</article>

