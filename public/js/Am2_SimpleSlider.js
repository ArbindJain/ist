/*
* jQuery Slider Plugin
* Version : Am2_SimpleSlider.js 
* NOTE : "jQuery v1.8.2 used while developing"
*/

(function ($) {

    jQuery.fn.Am2_SimpleSlider = function () {
        //popup div

        $div = $('<div class="product-gallery-popup"> <div class="popup-overlay"></div> <div class="product-popup-content"> <div class="product-image"> <img id="gallery-img" src="" alt="" /> <div class="gallery-nav-btns"> <a id="nav-btn-next" class="nav-btn next" ></a> <a id="nav-btn-prev" class="nav-btn prev" ></a></div> </div><div class="product-information"> <h3 class="product-title"></h3><p class="product-desc"></p><div class="like-mode"><a class="likebutton" data-model="Picture" data-id="" data-action=""><i class="fa fa-star-o"></i>&nbsp;<span class="btntext"></span></a></div></div></div> <div class="clear"></div><a href="#" class="cross">X</a></div></div>').appendTo('body');

        //on image click   
        $(this).click(function () {
            $('.product-gallery-popup').fadeIn(500);
            $('body').css({ 'overflow': 'hidden' });
            $('.product-popup-content .product-image img').attr('src', $(this).find('img').attr('src'));
            $('.product-popup-content .product-information p').text($(this).find('div').attr('data-desc'));
            $('.product-popup-content .product-information h3').text($(this).find('span').attr('data-title'));
            $('.product-popup-content .product-information .btntext').text($(this).find('.l-module').attr('data-likemodule'));
            $('.product-popup-content .product-information .likebutton').attr('data-id',($(this).find('.l-id').attr('data-likeid')));
            $('.product-popup-content .product-information .likebutton').attr('data-action',($(this).find('.l-action').attr('data-likeaction')));
            
            $Current = $(this);
            $PreviousElm = $(this).prev();
            $nextElm = $(this).next();
            if ($PreviousElm.length === 0) { $('.nav-btn.prev').css({ 'display': 'none' }); }
            else { $('.nav-btn.prev').css({ 'display': 'block' }); }
            if ($nextElm.length === 0) { $('.nav-btn.next').css({ 'display': 'none' }); }
            else { $('.nav-btn.next').css({ 'display': 'block' }); }
        });

        //on Next click
        $('.next').click(function () {
            $NewCurrent = $nextElm;
            $PreviousElm = $NewCurrent.prev();
            $nextElm = $NewCurrent.next();
            $('.product-popup-content .product-image img').clearQueue().animate({ opacity: '0' }, 0).attr('src', $NewCurrent.find('img').attr('src')).animate({ opacity: '1' }, 500);
          
          
            
            $('.product-popup-content .product-information p').text($NewCurrent.find('div').attr('data-desc'));
            $('.product-popup-content .product-information h3').text($NewCurrent.find('span').attr('data-title'));
            $('.product-popup-content .product-information .btntext').text($NewCurrent.find('.l-module').attr('data-likemodule'));
            $('.product-popup-content .product-information .likebutton').attr('data-id',($NewCurrent.find('.l-id').attr('data-likeid')));
            $('.product-popup-content .product-information .likebutton').attr('data-action',($NewCurrent.find('.l-action').attr('data-likeaction')));
            
            if ($PreviousElm.length === 0) { $('.nav-btn.prev').css({ 'display': 'none' }); }
            else { $('.nav-btn.prev').css({ 'display': 'block' }); }
            if ($nextElm.length === 0) { $('.nav-btn.next').css({ 'display': 'none' }); }
            else { $('.nav-btn.next').css({ 'display': 'block' }); }
        });
        //on Prev click
        $('.prev').click(function () {
            $NewCurrent = $PreviousElm;
            $PreviousElm = $NewCurrent.prev();
            $nextElm = $NewCurrent.next();
            $('.product-popup-content .product-image img').clearQueue().animate({ opacity: '0' }, 0).attr('src', $NewCurrent.find('img').attr('src')).animate({ opacity: '1' }, 500);
            
            $('.product-popup-content .product-information p').text($NewCurrent.find('div').attr('data-desc'));
            $('.product-popup-content .product-information h3').text($NewCurrent.find('span').attr('data-title'));
            $('.product-popup-content .product-information .btntext').text($NewCurrent.find('.l-module').attr('data-likemodule'));
            $('.product-popup-content .product-information .likebutton').attr('data-id',($NewCurrent.find('.l-id').attr('data-likeid')));
            $('.product-popup-content .product-information .likebutton').attr('data-action',($NewCurrent.find('.l-action').attr('data-likeaction')));
            
            if ($PreviousElm.length === 0) { $('.nav-btn.prev').css({ 'display': 'none' }); }
            else { $('.nav-btn.prev').css({ 'display': 'block' }); }
            if ($nextElm.length === 0) { $('.nav-btn.next').css({ 'display': 'none' }); }
            else { $('.nav-btn.next').css({ 'display': 'block' }); }
        });
        //Close Popup
        $('.cross,.popup-overlay').click(function () {
            $('.product-gallery-popup').fadeOut(500);
            $('body').css({ 'overflow': 'initial' });
        });

        //Key Events
        $(document).on('keyup', function (e) {
            e.preventDefault();
            //Close popup on esc
            if (e.keyCode === 27) { $('.product-gallery-popup').fadeOut(500); $('body').css({ 'overflow': 'initial' }); }
            //Next Img On Right Arrow Click
            if (e.keyCode === 39) { NextProduct(); }
            //Prev Img on Left Arrow Click
            if (e.keyCode === 37) { PrevProduct(); }
        });

        function NextProduct() {
            if ($nextElm.length === 1) {
                $NewCurrent = $nextElm;
                $PreviousElm = $NewCurrent.prev();
                $nextElm = $NewCurrent.next();
                $('.product-popup-content .product-image img').clearQueue().animate({ opacity: '0' }, 0).attr('src', $NewCurrent.find('img').attr('src')).animate({ opacity: '1' }, 500);
                
                $('.product-popup-content .product-information p').text($NewCurrent.find('div').attr('data-desc'));
                $('.product-popup-content .product-information h3').text($NewCurrent.find('span').attr('data-title'));
                $('.product-popup-content .product-information .btntext').text($NewCurrent.find('.l-module').attr('data-likemodule'));
            $('.product-popup-content .product-information .likebutton').attr('data-id',($NewCurrent.find('.l-id').attr('data-likeid')));
            $('.product-popup-content .product-information .likebutton').attr('data-action',($NewCurrent.find('.l-action').attr('data-likeaction')));
            
           if ($PreviousElm.length === 0) { $('.nav-btn.prev').css({ 'display': 'none' }); }
                else { $('.nav-btn.prev').css({ 'display': 'block' }); }
                if ($nextElm.length === 0) { $('.nav-btn.next').css({ 'display': 'none' }); }
                else { $('.nav-btn.next').css({ 'display': 'block' }); }
            }

        }

        function PrevProduct() {
            if ($PreviousElm.length === 1) {
                $NewCurrent = $PreviousElm;
                $PreviousElm = $NewCurrent.prev();
                $nextElm = $NewCurrent.next();
                $('.product-popup-content .product-image img').clearQueue().animate({ opacity: '0' }, 0).attr('src', $NewCurrent.find('img').attr('src')).animate({ opacity: '1' }, 500);
        
                $('.product-popup-content .product-information p').text($NewCurrent.find('div').attr('data-desc'));
                $('.product-popup-content .product-information h3').text($NewCurrent.find('span').attr('data-title'));
                $('.product-popup-content .product-information .btntext').text($NewCurrent.find('.l-module').attr('data-likemodule'));
            $('.product-popup-content .product-information .likebutton').attr('data-id',($NewCurrent.find('.l-id').attr('data-likeid')));
            $('.product-popup-content .product-information .likebutton').attr('data-action',($NewCurrent.find('.l-action').attr('data-likeaction')));
            
                if ($PreviousElm.length === 0) { $('.nav-btn.prev').css({ 'display': 'none' }); }
                else { $('.nav-btn.prev').css({ 'display': 'block' }); }
                if ($nextElm.length === 0) { $('.nav-btn.next').css({ 'display': 'none' }); }
                else { $('.nav-btn.next').css({ 'display': 'block' }); }
            }

        }

    };

} (jQuery));
