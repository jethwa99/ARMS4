
(function ($) {
    "use strict";
    var mainApp = {
        scrollAnimation_fun: function () {
            
            window.scrollReveal = new scrollReveal();

        },
         scroll_fun: function () {
            $(function () {
                $('.move-me a').bind('click', function (event) { 
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1000, 'easeInOutQuad');
                    event.preventDefault();
                });
            });

        },

         top_flex_slider_fun:function()
         {
             $('#main-section').flexslider({
                 animation: "fade", 
                 slideshowSpeed: 3000,           
                 animationSpeed: 1000,        
                 startAt: 0, 
             });
         },
      
        custom_fun:function()
        {
           

        },

    }
   
   
    $(document).ready(function () {
        mainApp.scrollAnimation_fun();
        mainApp.scroll_fun();
        mainApp.top_flex_slider_fun();
        mainApp.custom_fun();
    });
}(jQuery));


