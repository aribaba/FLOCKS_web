<?php
echo "<ul>";
if ($favorite_post_ids):
	$c = 0;
	$favorite_post_ids = array_reverse($favorite_post_ids);
    foreach ($favorite_post_ids as $post_id) {
    	if ($c++ == $limit) break;
        $p = get_post($post_id);
        echo "<li>";
        echo "<ul>";
        echo "<li class='sidebar-wpfp-thumbnail'>";
        echo "<a href='".get_permalink($post_id)."' title='". $p->post_title ."'>" .get_the_post_thumbnail(). "</a> ";
        echo "</li>";
        echo "<li class='sidebar-wpfp-string'>";
        echo "<a href='".get_permalink($post_id)."' title='". $p->post_title ."'>" . $p->post_title . "</a> ";
        echo "</li>";
        echo "</ul>";
        echo "</li>";
    }
else:
    echo "<li>";
    echo "Your favorites will be here.";
    echo "</li>";
endif;
echo "</ul>";
?>
