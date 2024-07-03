<section id="counter" class="counter-bg bg-opacity section-padding-60">
    <div class="container">
        <div class="row">
            <?php foreach ($counters as $row) { ?>
            <div class="col-md-3 col-sm-6">
                <div class="counter-item style-2">
                    <div class="counter-item-inner">
                        <i class="<?php echo $row->icon;?>" aria-hidden="true"></i>
                        <h4><?php echo $row->title;?></h4>
                        <span class="counter"><?php echo $row->count;?></span>
                    </div>
                </div>
            </div>
           <?php } ?>

        </div>
    </div>
</section>