<section id="about" class="about section-padding-top">
    <div class="container">
        <div class="section-title">
            <h2><?php echo $about_us->name; ?></h2>
            <span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a  class="img-about">
                    <img src="uploads/<?php echo $about_us->image;?>" alt="" class="img-responsive">
                </a>
            </div>
            <div class="col-md-6">
                <!-- About text-->
                <div class="about-details">
                    <h5>Who are we?</h5>
                    <p><?php echo $about_us->content;?></p>
                    <ul class="image-contact-list">
                        <li><i class="icofont icofont-speech-comments"></i> <span> Reliable and Secure Platform</span></li>
                        <li><i class="icofont icofont-package"></i> <span>Everything is perfectly organized</span></li>
                        <li><i class="icofont icofont-settings"></i> <span>Simple Line Icon</span></li>
                        <li><i class="icofont icofont-gift"></i> <span>Step on the new level</span></li>

                    </ul>
                    <a class="btn btn-default btn-style hvr-shutter-out-vertical" href="about_us">Read More</a>
                </div>
                <!-- /About text -->
            </div>
        </div>
    </div>
</section>