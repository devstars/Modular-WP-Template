(function($) {    
    /* console.log(carouselData); */
    $(document).ready(function() {
        $(".banner-js").owlCarousel({
            /* slideSpeed: 1000,   */            
            lazyLoad: false,
            margin: 0,
            /* paginationSpeed: 1000, */
            smartSpeed: 500,
            autoplay: carouselData["autoplay"],
            autoplayTimeout: carouselData["interval"],
            responsiveClass: true,
            loop: true,
            nav: false,
            dots: false,
            items: 1,
            onChanged: function(p) {},
            onInitialized: function() {
                $(".t-prev-js").click(() => {
                    $('.banner-js').find(".owl-prev").trigger('prev.owl.carousel');
                });
                $(".t-next-js").click(() => {
                    $('.banner-js').find(".owl-next").trigger('next.owl.carousel');
                });
            }
        });
    })
}(jQuery))