<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="contents-body">
<!-- feature -->
<div id="fadearea">
	<!-- <div id="prev" ></div> -->
<div id="feature-top">
	<ul>
		<?php
		$rand = mt_rand();

		if (($rand % 3 ) === 0) {
			?>

		<li id="i1" class="slide_img">
			<a href="http://flocks.jp/arichives/feature/want_read_in_rain/">
				<img src="http://aribaba845.sakura.ne.jp/aribaba_book/wp-content/uploads/2014/06/wallpaper-rain-06.jpg" height="400px" width="740px" target="_blank">

				<ul id="feature-description">
			<li id="feature-des-title">雨の日に読みたいマンガ撰</li>
			<li id="feature-des-excerption">梅雨本番ですね。雨が降り続く休日、あなたは何をしますか？部屋の中で、ゆったりとするのもあり。晴れた日の予定を立てるのもあり。雨の中を散歩するのもあり。そんな数ある選択肢から、今日はマンガを選んでみませんか？それぞれのライターさんで、雨の日に読みたくなる漫画を選んでみました。</li>
				</ul>
			</a>
		</li>
<?php
		}elseif (($rand % 3 ) === 1) {
			?>
		<li id="il" class="slide_img">
			<a href="http://flocks.jp/arichives/2064/">
				<img src="http://aribaba845.sakura.ne.jp/aribaba_book/wp-content/uploads/2014/07/PAK86_pennotekakikomi20140312500-e1404282681261.jpg" height="400px" width="740px" target="_blank">
				<ul id="feature-description">
					<li id="feature-des-title">【急募　◯◯漫画ライター】あなたの好きな漫画を紹介してみませんか？</li>
					<li id="feature-des-excerption">フロックスでは、ライターを随時募集しています。BL、打ち切り漫画、麻雀、アメコミ、エロマンガ、少年漫画でも少女漫画でも。面白い漫画について僕たちと語りませんか？</li>
				</ul>
			</a>
		</li>
		<?php
		}else{
			?>
		<li id="il" class="slide_img">
			<a href="http://flocks.jp/arichives/2064/">
				<img src="http://flocks.jp/wp-content/uploads/2014/07/can_hear_a_sound-.jpg" height="400px" width="740px" target="_blank">
				<ul id="feature-description">
					<li id="feature-des-title">マンガなのに”音”が聞こえる？名作多し音楽マンガ撰</li>
					<li id="feature-des-excerption">"音楽"と"漫画"。音が聞こえるはずもないその組み合わせに、感動を覚えるのはなぜでしょうか。インパクトと心理描写がとくに重要になるこの手の漫画は、名作との出会いが多い気がします。</li>
				</ul>
			</a>
		</li>

		<?php
		}
		?>
	</ul>

</div>

</div>
<!--feature end -->




<div id="article-top">

<?php
$paged = get_query_var('page');
query_posts($query_string .  '&' .'posts_per_page=20&category_name=all&paged='.$paged);
if (have_posts()) :
while (have_posts()) :
	the_post();
get_template_part('content-archive');
  endwhile;
endif;
?>


</div>
<!-- article-top end -->

<?php wp_pagenavi();
wp_reset_query();
?>

<div class="main-column-fb">

<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fflocks.jp&amp;width=710&amp;height=250&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=752067121476709" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:710px; height:250px;" allowTransparency="true"></iframe>


</div>



</div>




<!--contents-body end-->
<?php get_footer(); ?>