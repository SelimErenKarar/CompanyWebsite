<section id="service" class="service section-padding-top">
    <div class="container">
        <div class="section-title">
            <h2>Services</span></h2>
            <span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
        </div>

        <div class="row content service-grid-s1">
            <?php foreach ($services as $row) { ?>
            <div class="col-md-4 col-sm-6">
                <div class="grid">
                    <div class="icon">
                        <i class="<?php echo $row->icon;?>"></i>
                    </div>
                    <div class="details">
                        <h3><a href="#"><?php echo $row->title;?></a></h3>
                        <?php echo $row->content;?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
</section>


