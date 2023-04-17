;(function($, window, document, undefined) {
    'use strict';


    /*=================================*/
    /* ADD IMAGE ON BACKGROUND */

    /*=================================*/

    function wpc_add_img_bg(img_sel, parent_sel) {
        if (!img_sel) {

            return false;
        }
        var $parent, $imgDataHidden, _this;
        $(img_sel).each(function () {
            _this = $(this);
            $imgDataHidden = _this.data('s-hidden');
            $parent = _this.closest(parent_sel);
            $parent = $parent.length ? $parent : _this.parent();
            $parent.css('background-image', 'url(' + this.src + ')').addClass('s-back-switch');
            if ($imgDataHidden) {
                _this.css('visibility', 'hidden');
                _this.show();
            }
            else {
                _this.hide();
            }
        });
    }

    if($('#toggle-demos').length){
        $('#toggle-demos').on('click', function () {
            $('.thb-demo-holder img').each(function () {
                var src = $(this).data('src');
                $(this).attr('src', src);
            });
            wpc_add_img_bg('.s-img-switch');
            setTimeout(function () {
                $('.thb-demo-holder').addClass('active');
            }, 500);
        });
    }

    if($('.thb-demo-holder svg').length){
        $('.thb-demo-holder svg').on('click', function () {
            $('.thb-demo-holder').removeClass('active');
            $('.thb-demo-holder img').each(function () {
                $(this).attr('src', '#');
            });
        });
    }


    $(window).on('load', function () {
        $('.thb-demo-holder .row')
    });




    $('.js-version').on('click', function(e) {
        if ($(this).attr('data-state') == 'light') {
            localStorage.setItem('dark', '1');
            $('.demo-version').addClass('active');
            $('html').addClass('dark-demo');

            $(this).attr('data-state', 'dark');
        } else {
            $('.demo-version').removeClass('active');
            $('html').removeClass('dark-demo');
            localStorage.clear();

            $(this).attr('data-state', 'light');
        }

    });



    $(document).on('ready', function () {
        if($('.demo-version').length){

            var elementLink = localStorage.getItem('dark');

            var str1 = window.location.href;
            var str2 = "phoxy-dark";

            //alert(elementLink)


            //if(elementLink == null) {
                //if( str1.indexOf(str2) != -1) {

                    // black version
                    $('.demo-version').addClass('active');
                    $('html').addClass('dark-demo');

                    localStorage.setItem('dark', '1');

                    $('.js-version').attr('data-state', 'dark');
                // } else{
                //     // white version

                //     $('.js-version').attr('data-state', 'light');
                //     localStorage.clear();
                // }

            // } else{
            //     $('.demo-version').addClass('active');
            //     $('html').addClass('dark-demo');
            //     $('.js-version').attr('data-state', 'dark');
            // }
        }

    });

    $("#footer .copyright").html('CompanyName 2023');

})(jQuery, window, document);

