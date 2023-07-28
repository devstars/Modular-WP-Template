<div class="c-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-white pt-20">
                    <h2 class="section__title"> <?= get_field("t_title", ID_FRONT_PAGE) ?></h2>

                    <div class="testimonials-carousel-js owl-carousel owl-theme">
                        <?php
                        while (have_rows('s_testimonials')) : the_row();
                        ?>
                            <a href="" class="testimonial section-white u-parent-link">
                                <h4 class="testimonial__client mb-1"><?= get_sub_field("t_client_name") ?></h4>

                                <div class="testimonial__stars mb-6">
                                    <?php
                                    $stars = get_sub_field("t_rating");
                                    for ($star = 1; $star <= $stars; $star++) :
                                        echo "<span>&#9733;</span>";
                                    endfor;
                                    ?>
                                </div>
                                <q class="testimonial__excerpt"><?= get_sub_field("t_description") ?></q>
                                <!-- <div class="clearfix mb-7"></div> -->
                                <!-- <div class="testimonial__readmore "><span class="u-child-link">Read more</span> <i class="fas fa-chevron-right"></i></div> -->
                            </a>
                        <?php
                        endwhile;
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    (function($) {

        $(document).ready(function() {

            $('.testimonials-carousel-js').owlCarousel({
                slideSpeed: 300,
                margin: 10,
                paginationSpeed: 400,
                autoplay: false,
                items: 2,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                        dots: true
                    },
                    768: {
                        items: 2,
                        nav: true,
                        dots: true
                    }

                },
                loop: false,
                nav: true,
                navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],
            });

        });

    }(jQuery));
</script>