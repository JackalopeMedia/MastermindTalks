/**
 * jQuery Cookie plugin
 *
 * Copyright (c) 2010 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */
(function () {
    "use strict";
    jQuery.cookie = function (key, value, options) {

        // key and at least value given, set cookie...
        if (arguments.length > 1 && String(value) !== "[object Object]") {
            options = jQuery.extend({}, options);

            if (value === null || value === undefined) {
                options.expires = -1;
            }

            if (typeof options.expires === 'number') {
                var days = options.expires,
                    t = options.expires = new Date();
                t.setDate(t.getDate() + days);
            }

            value = String(value);

            return (document.cookie = [
                encodeURIComponent(key), '=',
                options.raw ? value : encodeURIComponent(value),
                options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
                options.path ? '; path=' + options.path : '',
                options.domain ? '; domain=' + options.domain : '',
                options.secure ? '; secure' : ''
            ].join(''));
        }

        // key and possibly options given, get cookie...
        options = value || {};
        var result, decode = options.raw ? function (s) {
                return s;
            } : decodeURIComponent;
        return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
    };

    // Array filter
    if (!Array.prototype.filter) {
        Array.prototype.filter = function (fun /*, thisp */ ) {
            if (this === null) {
                throw new TypeError();
            }

            var t = Object(this);
            var len = t.length >>> 0;
            if (typeof fun !== "function") {
                throw new TypeError();
            }

            var res = [];
            var thisp = arguments[1];

            for (var i = 0; i < len; i++) {
                if (i in t) {
                    var val = t[i]; // in case fun mutates this
                    if (fun.call(thisp, val, i, t))
                        res.push(val);
                }
            }

            return res;
        };
    }

    /**
     *
     * Template scripts
     *
     **/

    // onDOMLoadedContent event
    jQuery(document).ready(function () {
        // Thickbox use
        jQuery(document).ready(function () {
            if (typeof tb_init !== "undefined") {
                tb_init('div.wp-caption a'); //pass where to apply thickbox
            }
        });
        // style area
        if (jQuery('#gk-style-area')) {
            jQuery('#gk-style-area div').each(function () {
                jQuery(this).find('a').each(function () {
                    jQuery(this).click(function (e) {
                        e.stopPropagation();
                        e.preventDefault();
                        changeStyle(jQuery(this).attr('href').replace('#', ''));
                    });
                });
            });
        }
        // Function to change styles

        function changeStyle(style) {
            var file = $GK_TMPL_URL + '/css/' + style;
            jQuery('head').append('<link rel="stylesheet" href="' + file + '" type="text/css" />');
            jQuery.cookie($GK_TMPL_NAME + '_style', style, {
                expires: 365,
                path: '/'
            });
        }

        // Responsive tables
        jQuery('article section table').each(function (i, table) {
            table = jQuery(table);
            var heads = table.find('thead th');
            var cells = table.find('tbody td');
            var heads_amount = heads.length;
            // if there are the thead cells
            if (heads_amount) {
                var cells_len = cells.length;
                for (var j = 0; j < cells_len; j++) {
                    var head_content = jQuery(heads.get(j % heads_amount)).text();
                    jQuery(cells.get(j)).html('<span class="gk-table-label">' + head_content + '</span>' + jQuery(cells.get(j)).html());
                }
            }
        });

    });
    //
    var page_loaded = false;
    // animations
    var elementsToAnimate = [];
    //
    var headerHeight = '';
    //
    jQuery(document).ready(function () {
        //
        page_loaded = true;
        headerHeight = jQuery('#gk-head').outerHeight();
        // if admin bar is displayed
        if (jQuery('body').hasClass('admin-bar')) {
            headerHeight += 28;
        }
        // create the list of elements to animate
        jQuery('.gk-horizontal-slide-right-column').each(function (i, element) {
            elementsToAnimate.push(['animation', element, jQuery(element).offset().top]);
        });

        jQuery('.layered').each(function (i, element) {
            elementsToAnimate.push(['animation', element, jQuery(element).offset().top]);
        });

        jQuery('.gk-price-table-animated').each(function (i, element) {
            elementsToAnimate.push(['queue_anim', element, jQuery(element).offset().top]);
        });
    });
    //
    jQuery(window).scroll(function () {
        // menu animation
        if (page_loaded && jQuery('body').hasClass('imageBg')) {
            // if menu is not displayed now
            if (jQuery(window).scrollTop() > headerHeight && !jQuery('#gk-menu-wrap').hasClass('active')) {
                //document.id('gkHeaderNav').inject(document.id('gkMenuWrap'), 'inside');
                jQuery('#gk-menu-wrap').append(jQuery('#gk-header-nav'));
                jQuery('#gk-head').attr('class', 'gk-no-menu');
                // hide
                jQuery('#gk-menu-wrap').attr('class', 'active');
            }
            //
            if (jQuery(window).scrollTop() <= headerHeight && jQuery('#gk-menu-wrap').hasClass('active')) {
                jQuery('#gk-head').first('div').css('display', 'block');
                jQuery('#gk-head').first('div').prepend(jQuery('#gk-header-nav'));
                jQuery('#gk-head').attr('class', '');
                jQuery('#gk-menu-wrap').attr('class', '');
            }
        }
        // animate all right sliders
        if (elementsToAnimate.length > 0) {
            // get the necessary values and positions
            var currentPosition = jQuery(window).scrollTop();
            var windowHeight = jQuery(window).outerHeight();

            // iterate throught the elements to animate
            if (elementsToAnimate.length) {
                for (var i = 0; i < elementsToAnimate.length; i++) {
                    if (elementsToAnimate[i][2] < currentPosition + (windowHeight / 1.2)) {
                        // create a handle to the element
                        var element = elementsToAnimate[i][1];
                        // check the animation type
                        if (elementsToAnimate[i][0] === 'animation') {
                            gkAddClass(element, 'loaded', false);
                            // clean the array element
                            elementsToAnimate[i] = null;
                        }
                        // if there is a queue animation
                        else if (elementsToAnimate[i][0] === 'queue_anim') {
                            jQuery(element).find('dl').each(function (j, item) {
                                gkAddClass(item, 'loaded', j);
                            });
                            // clean the array element
                            elementsToAnimate[i] = null;
                        }
                    }
                }
                // clean the array
                elementsToAnimate = elementsToAnimate.filter(function (item) {
                    return item !== null;
                });
            }
        }
    });
    //

    function gkAddClass(element, cssclass, i) {
        var delay = jQuery(element).attr('data-delay');

        if (!delay) {
            delay = (i !== false) ? i * 150 : 0;
        }

        setTimeout(function () {
            jQuery(element).addClass(cssclass);
        }, delay);
    }
    //

    jQuery(window).ready(function () {
        //
        var menuwrap = new jQuery('<div />', {
            'id': 'gk-menu-wrap'
        });

        //
        jQuery('body').append(menuwrap);
        //
        if (!jQuery('body').hasClass('imageBg')) {
            jQuery('#gk-menu-wrap').append(jQuery('#gk-header-nav'));
            jQuery('#gk-head').attr('class', 'gk-no-menu');
            jQuery('#gk-head > div').first().css('display', 'none');
            jQuery('#gk-menu-wrap').attr('class', 'active');
        }

        //
        // some touch devices hacks
        //

        // hack thickbox boxes ;)
        var links_container = jQuery('body').find('.gk-video-link');
        // register start event
        var links_time_start = 0;
        var links_swipe = false;

        // here
        links_container.bind('touchstart', function (e) {
            links_swipe = true;
            var touches = e.originalEvent.changedTouches || e.originalEvent.touches;

            if (touches.length > 0) {
                links_time_start = new Date().getTime();
            }
        });
        // and then
        links_container.bind('touchend', function (e) {
            var touches = e.originalEvent.changedTouches || e.originalEvent.touches;

            if (touches.length > 0 && links_swipe) {
                if (new Date().getTime() - links_time_start <= 500) {
                    window.location = links_container.attr('href');
                }
            }
        });
    });
})();