<div class="c-section--tiles section-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="section__title text-left mb-8">Tiles</h3>
                <div class="tiles__wrapper">
                    <?php for ($i = 1; $i <= 8; $i++) : ?>
                        <div class="c-tile">
                            <a class="tile__default section-white u-tran-all-slow" href="#">                            
                                <img data-src="<?= IMAGES ?>/os1.png" alt="" class="tile__img">
                                <h4 class="tile__title">Tile title</h4>
                            </a>
                            <a class="tile__hover section-blue u-tran-all-slow" href="#">                            
                                <img data-src="<?= IMAGES ?>/os1.png" alt="" class="tile__img">
                                <h4 class="tile__title">Tile title</h4>
                            </a>
                        </div>
                        
                    <?php endfor; ?>
                </div>

            </div>
        </div>
    </div>
</div>