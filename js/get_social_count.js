function get_social_count_facebook(url, counterId) {
    $.ajax({
        url:'https://graph.facebook.com/',
        dataType:'jsonp',
        data:{
            id:url
        },
        success:function(res){
            $('#' + counterId + ' .count').text( res.shares || 0 );
        },
        error:function(){
            $('#' + counterId + ' .count').text('?');
        }
    });
}
// Twitterの反応（ツイートやリツイート数）を取得
function get_social_count_twitter(url, counterId) {
    $.ajax({
        url:'http://urls.api.twitter.com/1/urls/count.json',
        dataType:'jsonp',
        data:{
            url:url
        },
        success:function(res){
            $('#' + counterId + ' .count').text( res.count || 0 );
        },
        error:function(){
            $('#' + counterId + ' .count').text('?');
        }
    });
}

// はてなブックマークでブックマークされている数を取得
function get_social_count_hatebu(url, counterId) {
    $.ajax({
        url:'http://api.b.st-hatena.com/entry.count?callback=?',
        dataType:'jsonp',
        data:{
            url:url
        },
        success:function(res){
            $('#' + counterId + ' .count').text( res || 0 );
        },
        error:function(){
            $('#' + counterId + ' .count').text('?');
        }
    });
}

$(function(){
    get_social_count_facebook("<?php the_permalink( ); ?>", "socialarea_facebook");
    get_social_count_twitter("<?php the_permalink( ); ?>", "socialarea_twitter");
    get_social_count_hatebu("<?php the_permalink(); ?>", "socialarea_hatebu");
});