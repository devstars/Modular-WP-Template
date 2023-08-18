(function ($) {

    $(document).ready(function () {

        $.each($(".logotypes-js"), function(i,logotypes) {

            var logotypes = $(logotypes);
            
            logotypes.owlCarousel({                
                lazyLoad: true,
                margin: 0,                
                smartSpeed: 500,
                autoplay: false,
                autoplayTimeout: 3000,
                responsiveClass: true,
                loop: true,
                nav: false,
                dots: false,
                items: 2,                
                onInitialized: function (el) {                     

                    $(el.target).parent().find(".l-prev-js").click(() => {                        
                        logotypes.find(".owl-prev").trigger('prev.owl.carousel');
                    });
                    $(el.target).parent().find(".l-next-js").click(() => {
                        logotypes.find(".owl-next").trigger('next.owl.carousel');
                    });
                },
                responsive: {
                    678: {
                        items: 3,                    
                    },
                    992: {
                        items: 4,                    
                    },
                    1200: {
                        items: 6,                    
                    }
                }
            });
        });

    })

}(jQuery))