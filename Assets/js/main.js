!(function ($) {
    "use strict";

    var scrolltoOffset = 50;

    $(document).on("click", ".navbar-nav a", function (e){
        if (
            location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);

            if (target.length) {
                e.preventDefault();

                var scrollto = target.offset().top - scrolltoOffset;
                
                console.log(scrollto);

                $("html, body").animate(
                    {
                        scrollTop: scrollto
                    }, 1500
                );

                if ($(this).parents(".navbar-nav").length) {
                    $(".navbar-nav .active").removeClass("active");
                    $(this).closest("a").addClass("active");
                }
            }

            
        }
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $(".back-to-top").fadeIn("slow");                    
        }else{
            $(".back-to-top").fadeOut("slow");
        }
    });

    $(".back-to-top").click(function () { 
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            1500
        );
        return false;        
    });
})(jQuery);