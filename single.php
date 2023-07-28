<?php get_header(); ?>

<?php include(locate_template('template-parts/banner.php')); ?>
<?php get_template_part('template-parts/breadcrumbs'); ?>

<div class="c-section l-section-top section-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8">
                <h3 class="section__title u-text-left mb-8">Cards</h3>
                <div class="row  page-text">
                    <?php 
                     global $wp_query;

                     while (have_posts()) : the_post();
                         ?>
                         <h5><a class="post-title" href=<?php echo the_permalink(); ?>><?php the_title(); ?></a></h5>
                         
             
             
                         <?php the_content(); ?>                                
             
                         <div class="u-clearfix"></div>
                         <div class="post-navigation"> 
                             <div class="nav-previous">
                                 <?=  get_previous_post_link('%link','%title',false); ?>
                             </div>
                             <div class="nav-next">    
                                 <?= get_next_post_link('%link','%title',false); ?>
                             </div>
                         </div> 
             
                     <?php endwhile; ?> 
                </div>
         
            </div>
            <div class="col-12 col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>
