<section id="home" >
    <div class="main-slider-1 white-clr-all">
        <div id="carosel-mr-1" class="carousel home-carousel-2 slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach ($sliders as $slider) {?>
                <li data-target="#carosel-mr-1" data-slide-to="<?php echo $slider->rank; ?>" class="<?php echo ($slider->rank == 0) ? "active" : ""; ?>"></li>
                <?php } ?>
            </ol>
            <div class="carousel-inner main-sld" role="listbox">
                <?php foreach ($sliders as $slider) {?>
                <div class="item <?php echo ($slider->rank == 0) ? "active" : ""; ?> main-sld">
                    <div class="slider-bg" style="background-image: url('uploads/<?php echo $slider->image;?>');"></div>
                    <div class="slider-cell">
                        <div class="slider-ver">
                            <div class="slider-con text-center">
                                <?php echo $slider->content; ?>
                                <a class="btn btn-default btn-animate btn-style hvr-shutter-out-vertical" href="<?php echo $slider->btn_left_link; ?>"><?php echo $slider->btn_left; ?></a>
                                <a class="btn btn-default btn-animate btn-style hvr-shutter-out-vertical" href="<?php echo $slider->btn_right_link; ?>"><?php echo $slider->btn_right; ?></a>
                            </div>

                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>