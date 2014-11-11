    <?php
    /*
    Template Name: member
    */
    ?>
    <?php get_header(); ?>
    <?php get_sidebar(); ?>
    <div id="contents-body">
    	<?php
    		if (!is_front_page() && function_exists('bread_crumb')) :
    			bread_crumb('navi_element=nav&elm_id=bread-crumb');
    		endif;
    		?>

                <!-- <header id="page-header-writer">

                <h1 id="page-title-writer">
                    <?php the_title(); ?>
                </h1>



                            </header> -->

            <!-- ここからコンテンツ -->
    <div id="member-archive">
 <?php


        /*-------------
        ユーザー数の取得と設定
        --------------------*/
        $total_users = count_users();
        $total_users = $total_users['total_users'];
        $paged = get_query_var('paged');
        $number = 10; // 1ページに表示したいユーザー数
        $args = array(
            'orderby'=>'post_count',
            'order'=>'DESC',
            'offset' => $paged ? ( ($paged - 1) * $number) : 0,
            'number' => $number,);
    $Eusers =get_users('role=Editor','order=asc','orderby=ID');
    echo '<ul class="users box-shadow clear-fix">';
    foreach($Eusers as $Euser):
     $Euid = $Euser->ID;
     $EuserData = get_userdata($Euid);
     $Euser_post_count = count_user_posts($Euid);
     echo '<a class="userposts fade_black_member fade" href="'.get_bloginfo(url).'/?author='.$Euid.'" >';
     echo '<li class="author-info">';

     echo '<div class="author-avatar">';
     echo get_avatar( $Euid ,150 );
     echo '</div>';

     echo '<dl>';
     echo '<dt class="nickname">'.$Euser->display_name.'</dt>';
     echo '<dd class="cast">'.$Euser->cast. '</dd></dl>';



     echo '</li>';
     echo '</a>';
    endforeach;


        ?>



        <?php


        /*-------------
        ユーザー数の取得と設定
        --------------------*/


    $Cusers =get_users('role=Author','order=asc','orderby=ID');
    foreach($Cusers as $Cuser):
     $Cuid = $Cuser->ID;
     $CuserData = get_userdata($Cuid);
     $Cuser_post_count = count_user_posts($Cuid);
     echo '<a class="userposts fade_black_member fade" href="'.get_bloginfo(url).'/?author='.$Cuid.'" >';
     echo '<li class="author-info">';

     echo '<div class="author-avatar">';
     echo get_avatar( $Cuid ,150 );
     echo '</div>';

     echo '<dl>';
     echo '<dt class="nickname">'.$Cuser->display_name.'</dt>';
     echo '<dd class="cast">'.$Cuser->cast. '</dd></dl>';



     echo '</li>';
     echo '</a>';
    endforeach;
    echo '</ul>';


        ?>
    </div>
    </div>
    <?php get_footer(); ?>
