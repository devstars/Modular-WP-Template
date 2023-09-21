<?php get_header(); ?>

<div class="c-section--post-feed pt-5 pt-lg-16 pb-16 pb-lg-17 section-white ">
    <div class="container-fluid">
        
                <h1 class="section__title u-text-left pb-5 pt-6">Blog</h1>
                <div class="row l-tiles">                    
                        <?php
                        $index = 0;
                        while (have_posts()) : the_post();
                        ?>

                            <div class="col-6 col-lg-3 ">
                                <?php
                                $group = floor( $index / 2 );
                                $group_lg = floor( $index / 4 );
                                get_template_part('template-parts/post-tile', null, array("group" => $group, "group_lg" => $group_lg, "block_id" => "blog"));
                                $index++;
                                ?>
                            </div>

                        <?php endwhile;  ?>
                    
                </div>
                <div class="row ">
                    <div class="col-12">
                        <?php Pagination::view();
                        //wp_reset_postdata();
                        ?>
                    </div>
                </div>
       

    </div>
</div>

<?php get_footer(); ?>