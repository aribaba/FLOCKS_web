<div id="sidebar">

	<div id="side-category">
	<ul class="rist-menu" id="list1">
		<?php
if(is_single()) {
		$category = get_the_category();
		$class .= $category[0]->cat_ID;
		}?>
		<?php wp_list_categories('title_li=&child_of=1&show_count=1&orderby=count&order=desc&exclude=295&current_category='.$class); ?>
</ul>


</div>

	<div id="go_writer_page"><a href="http://flocks.jp/writer/" target="_blank" class="fade-black-2 fade">
		<p>ライター</p>
	</a></div>


	<div id="side-contents">
	<?php dynamic_sidebar('primary-widget-area' ); ?>
</div>




<div id="side-sns">
	<div id="side_sns_contents">
		<div id="side_tw" >
			<a href="http://twitter.com/Flocks_mng" target="_blank" id="side_tw_a" >

			</a>
		</div>
		<div id="side_fb" >
			<a href="https://www.facebook.com/flocks.jp?ref=hl" target="_blank" id="side_fb_a" >

			</a>
		</div>
	</div>


</div>
</div>
<!--sidebar end-->