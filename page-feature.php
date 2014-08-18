<?php
/*
Template Name: feature
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="taxonomy-feature">
<div id="contents-body">

	<header id="taxonomy-header">
		<h1 class="page-title">特集一覧</h1>

	</header>
	<div id="article-top">
	<div class="feature-post">
<?php
$args = array(
'parent'       => 0,
'hierarchical' => 0,
'orderby'      => 'term_order', // Category Order and Taxonomy Terms Order を使用
'order'        => 'ASC'
);
    $taxonomy_name = 'feature';
    $taxonomys = get_terms($taxonomy_name,$args);
    if(!is_wp_error($taxonomys) && count($taxonomys)):
        foreach($taxonomys as $taxonomy):
        $url = get_term_link($taxonomy->slug, $taxonomy_name);
        $tax_posts = get_posts(array(
                'post_type' => post,
                'posts_per_page' => 4, // 表示させたい記事数
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
                ));


?>

<a href="http://flocks.jp/arichives/feature/<?php echo esc_html($taxonomy->slug); ?>" >

<h2 id="<?php echo esc_html($taxonomy->slug); ?>" class="feature-title"><?php echo esc_html($taxonomy->name); ?></h2></a>

<p><?php echo esc_html($taxonomy->description) ?></p>




<?php if($tax_posts): ?>

<ul>
    <?php foreach($tax_posts as $tax_post): ?>
    <li>
        <span class="thumb">

            <?php if(has_post_thumbnail($tax_post->ID)) {
                echo get_the_post_thumbnail($tax_post->ID,'post-thumbnail');
             } ?>

        </span>
        <span class="title"><?php echo get_the_title($tax_post->ID); ?></span>
    </li>

    <?php endforeach; ?>
</ul>





<?php endif; endforeach; endif; ?>

</div>
</div>
</div>
<!--contents-body end-->

<?php get_footer(); ?>