<?php $this->load->view("home-top-header"); ?>

<?php $this->load->view("home-header"); ?>

<section class="page-title page-bg bg-opacity section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>About Us</h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Institutional</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="about section-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a class="img-about">
                    <img src="uploads/<?php echo $about_us->image; ?>" alt="" class="img-responsive">
                </a>
            </div>
            <div class="col-md-6">
                <div class="about-details">
                    <h5>Who we are?</h5>
                    <p>
                        <?php echo $about_us->content; ?>
                    </p>
                    <ul class="image-contact-list">
                        <li><i class="icofont icofont-speech-comments"></i> <span> Reliable and Secure Platform</span>
                        </li>
                        <li><i class="icofont icofont-package"></i> <span>Everything is perfectly organized</span></li>
                        <li><i class="icofont icofont-settings"></i> <span>Simple Line Icon</span></li>
                        <li><i class="icofont icofont-gift"></i> <span>Step on the new level</span></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view("footer"); ?>

<?php $this->load->view("bottom-footer"); ?>