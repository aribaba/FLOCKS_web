/**
 * floater
 *
 * @category    jQuery plugin
 * @license     http://www.opensource.org/licenses/mit-license.html  MIT License
 * @copyright   2010 RaNa design associates, inc.
 * @author      keisuke YAMAMOTO <keisukey@ranadesign.com>
 * @link        http://kaelab.ranadesign.com/
 * @version     1.1.2
 * @date        Jun 10, 2011
 *
 * 繧ｳ繝ｳ繝�Φ繝�ｒ繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ縺ｫ霑ｽ蠕薙＆縺帙√ラ繧ｭ繝･繝｡繝ｳ繝医�荳贋ｸ九↓謗･逹縺輔○繧九�繝ｩ繧ｰ繧､繝ｳ縲
 *
 * [繧ｪ繝励す繝ｧ繝ｳ]
 * marginTop:     荳翫�菴咏區
 * marginBottom:  荳九�菴咏區
 * wait:          0�1(蛻晄悄蛟､ 0.5)縲0縺ｯ繝翫ン縺碁壹ｊ驕弱℃繧九∪縺ｧ蠕�▽縲1縺ｯ繝翫ン縺ｮ譛ｫ遶ｯ縺悟�繧九→縺吶＄蜍輔″縺縺吶
 * speed:         繧｢繝九Γ繝ｼ繧ｷ繝ｧ繝ｳ縺ｫ縺九￠繧区凾髢薙
 * easing:        繧､繝ｼ繧ｸ繝ｳ繧ｰ
 * fixed:         true縺ｧposition: fixed縺ｫ蛻�ｊ譖ｿ縺医ょ�譛溷､縺ｯfalse縲
 *
 */

(function($) {

    $.fn.extend({

        floater: function(options) {
            var config = {
                marginTop: 0,
                marginBottom: 0,
                wait: 0.5,  // 0-1
                speed: 1000,
                easing: "swing",
                fixed: false
            };
            $.extend(config, options);
            config.wait = $(this).outerHeight() - $(window).height() * config.wait;
            config.marginTop = parseInt(config.marginTop, 10) || 0;
            config.marginBottom = parseInt(config.marginBottom, 10) || 0;

            $(this).each(function() {
                var self = $(this);
                var d = $(document).height();
                var h = self.outerHeight() + config.marginTop + config.marginBottom;

                if (config.fixed === true) {
                    self._fixed(config);
                    return true;
                }

                self.css("position", "absolute");

                $(window).scroll(function() {
                    var s = $(window).scrollTop();
                    var w = $(window).height();

                    if (Math.abs(s - self.offset().top) < config.wait) {
                        return;
                    }

                    self.stop(true).animate({
                        top: (d - h) * s / (d - w) + config.marginTop
                    }, {
                        duration: config.speed,
                        easing: config.easing
                    });
                }).scroll();
            });

            return this;
        },

        _fixed: function(config) {
            if ($.browser.msie && $.browser.version < 7) {
                $(this).css("position", "absolute");
                this[0].style.cssText = "top: expression(documentElement.scrollTop + " + config.marginTop + " + 'px')";
                document.body.style.background = "url(null) fixed";
            } else {
                $(this).css("position", "fixed").css("top", config.marginTop);
            }
        }

    });

})(jQuery);