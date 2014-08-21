

<div id="wrapper">

  <input type="radio" name="slideshow" id="switch1" checked>
  <input type="radio" name="slideshow" id="switch2">
  <input type="radio" name="slideshow" id="switch3">
  <input type="radio" name="slideshow" id="switch4">

  <div id="slideshow">
     <div class="slideContents">
      <section id="slide1">

        <img src="http://aribaba845.sakura.ne.jp/aribaba_book/wp-content/uploads/2014/06/wallpaper-rain-06.jpg"
        height="400px" width="740px" target="_blank">
        <div id="title">
          <p>雨の日に読みたいマンガ撰</p>
        </div>
        <dl>
          <dt>雨の日に読みたいマンガ撰</dt>
          <dd>梅雨本番ですね。雨が降り続く休日、あなたは何をしますか？部屋の中で、ゆったりとするのもあり。晴れた日の予定を立てるのもあり。雨の中を散歩するのもあり。
            そんな数ある選択肢から、今日はマンガを選んでみませんか？それぞれのライターさんで、雨の日に読みたくなる漫画を選んでみました。</dd>
          <dd id="feature_article_archive">
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
                        'terms'=>'want_read_in_rain',
                        'field'=>'slug',
                        'include_children'=>true,
                        'operator'=>'IN'
                        ),
                    'relation' => 'AND'
                    )
                ));


?>

      <?php if($tax_posts): ?>

<ul class="feature_article_post_ul">
    <?php foreach($tax_posts as $tax_post): ?>
    <li class="feature_article_post_li">
      <ul>
        <li class="feature_article_thumb">
          <a href="<?php echo get_permalink($tax_post->ID); ?>" class="fade fade-black">
            <?php if(has_post_thumbnail($tax_post->ID)) {
                echo get_the_post_thumbnail($tax_post->ID,'post-thumbnail');
             } ?></a>
        </li>
        <li class="feature_aritcle_title"><P><?php echo get_the_title($tax_post->ID); ?></p></li>
        </ul>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; endforeach; endif; ?>

          </dd>
        </dl>

      </section>
      <section id="slide2">
        <img src="http://aribaba845.sakura.ne.jp/aribaba_book/wp-content/uploads/2014/07/PAK86_pennotekakikomi20140312500-e1404282681261.jpg"
        height="400px" width="740px" target="_blank">
        <dl>
          <dt>【急募　◯◯漫画ライター】あなたの好きな漫画を紹介してみませんか？</dt>
          <dd>暑くなってきました。てか、暑いです。もう本当に暑いです。こーんなに暑いのに、flocksの中のヒトが一発で青ざめる事態に直面しています。そう！ライターが少ない。</dd>
          <dd>
            <ul>
              <li>
                <?php echo get_the_post_thumbnail('313','post-thumbnail'); ?>
              </li>
            </ul>
          </dd>
        </dl>
      </section>
      <section id="slide3">
        <img src="http://flocks.jp/wp-content/uploads/2014/07/can_hear_a_sound-.jpg"
        height="400px" width="740px" target="_blank">
        <dl>
          <dt>マンガなのに”音”が聞こえる？名作多し音楽マンガ撰</dt>
          <dd>"音楽"と"漫画"。音が聞こえるはずもないその組み合わせに、感動を覚えるのはなぜでしょうか。
            インパクトと心理描写がとくに重要になるこの手の漫画は、ことさら名作が多い気がします。</dd>
          <dd></dd>
        </dl>
      </section>
      <section id="slide4">
        <img src="http://flocks.jp/wp-content/uploads/2014/07/can_hear_a_sound-.jpg"
        height="400px" width="740px" target="_blank">
      </section>

         </div>
    <p class="arrow prev">
      <i class="ico"></i>
      <label for="switch1"></label>
      <label for="switch2"></label>
      <label for="switch3"></label>
      <label for="switch4"></label>

    </p>
    <p class="arrow next">
      <i class="ico"></i>
      <label for="switch1"></label>
      <label for="switch2"></label>
      <label for="switch3"></label>
      <label for="switch4"></label>

    </p>
  </div>
</div>