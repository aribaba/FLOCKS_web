$.fn.extend({
	slidebreadcrumbslist:function(options){

		//optionsのデフォルト値
		var optionsDefaults = {
			speed: 500,
			delay: 50,
			interval:200,
			easing: "swing"
		}

		//optionsがない場合デフォルト値に置き換える
		for(var key in options){
			if(!options[key]&&　options[key]!= 0){
				options[key]= optionsDefaults[key];
			}
		}

		//li要素を取得
		var list = $(this).find("li");

		//最大の高さ用変数を定義
		var maxHeight = list.first().outerHeight();

		//li要素の配置と重なり順設定し、最大の高さを求める
		list.each(function(i){
			$(this).css("z-index",list.length　- i)
			.css("position","absolute")
			.css("left",-$(this).width())
			.css("margin-top",-$(this).height()/2)
			.css("top","50%");
			if($(this).height()>maxHeight){
				maxHeight = $(this).height(30);

			}
		});
		//ul要素のposition設定
		if($(this).css("position")!="absolute"　&&　$(this).css("position")!="relative"){
			$(this).css("position","relative");
		}
		//ul要素の高さ設定
		if($(this).height()<1){
			$(this).css("height".maxHeight+"px");
		}
	/*	$(this).css("overflow","hidden");*/

		//カスタムイベントをbindする
		list.unbind("slideComlete");
		list.bind("slideComlete",function(event,time){

		//スライド終了の座標を求める
		var offset;
		if($(this).prev().size()){
			offset=　$(this).prev().position().left+$(this).prev().outerWidth();
		}else{
			offset=0;
		}
		//スライド開始位置へ移動
		$(this).css("left",offset- $(this).outerWidth());

		//スライド開始
		$(this).delay(time).animate({
			left:offset+"px"
		},options.speed,options.easing,function(){
			if($(this).next().size()){
				$(this).next().trigger("slideComlete",[options.interval]);
			}else{
				//スライドが全て終了したあとの処理
			}
		});
	});
		//初回実行
		list.first().trigger("slideComlete",[options.delay]);

	}
});