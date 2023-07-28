<div class="section-gray u-nabar-top-fix">
    <div class="c-breadcrumb-yoast">
        <div class="container-fluid">
            <div class="c-media">
                <i class="fas fa-info-circle pr-2"></i>               
                <div class="media-body d-flex align-self-center">                    
                    <?php
                    if ( function_exists('yoast_breadcrumb') ) {                        
                        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );                        
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
