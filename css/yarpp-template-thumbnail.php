<?php /*
Example template for use with post thumbnails
Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<?php if (have_posts()):?>
<h2>関連記事</h2>
<ol>
<?php while (have_posts()) : the_post(); ?>
<?php if (has_post_thumbnail()):?>
<a href="<?php the_permalink() ?>"  title="<?php the_title_attribute(); ?>"><li><?php the_post_thumbnail(); ?><?php the_title(); ?></li></a>
<?php endif; ?>
<?php endwhile; ?>
<div class="clear"></div>
</ol>
<?php else: ?>
<?php endif; ?>