var site = {
    firstLoad: true,
    init: function () {
        jQuery('html').addClass('js');
        site.firstLoad = false;
        site.common.init();
        if (jQuery('body').hasClass('page-template-page-home-php')) {
            site.sections.homepage.init();
        }
    },
    common: {
        init: function () {
            //
            jQuery(".fancybox").fancybox({
                maxWidth    : 800,
                maxHeight   : 600,
                fitToView   : true,
                width       : '70%',
                height      : '70%',
                autoSize    : false,
                closeClick  : false,
                openEffect  : 'none',
                closeEffect : 'none',
                padding: 0
            });
            //
            jQuery("#mainNav a:not(#mainNav a.active), .upload-now").hover( function() {
                name = jQuery(this).attr('class');
                jQuery(this).find('img').attr('src', 'http://turnercomp.prettygoodwebhost.com/wp-content/themes/turner_comp/assets/img/' + name + '-active.png');
            }, function() {
                jQuery(this).find('img').attr('src', 'http://turnercomp.prettygoodwebhost.com/wp-content/themes/turner_comp/assets/img/' + name + '.png');
            });
            //
            jQuery(".submit_button").hover( function() {
                jQuery(this).attr('src', 'http://turnercomp.prettygoodwebhost.com/wp-content/themes/turner_comp/assets/img/upload-now-active.png');
            }, function() {
                jQuery(this).attr('src', 'http://turnercomp.prettygoodwebhost.com/wp-content/themes/turner_comp/assets/img/upload-now.png');
            });
        }
    },
    sections: {
        homepage: {
            init: function () {
                //
            }
        }
    }
};
jQuery(document).ready(function () { site.init(); });
// jQuery(window).load(function () { 
// });