<?php $this->load->view("home-top-header"); ?>
<!-- ==== Preloader start ==== -->
<!--<div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
</div>-->
<!-- ==== Preloader end ==== -->
<!-- Header start -->
<?php $this->load->view("home-header"); ?>
<!-- Header End -->

<section class="page-title page-bg bg-opacity section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>CONNECTIONS</h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li>Connections</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="contact-info text-center">
                    <span><i class="fa fa-map-marker"></i></span>
                    <h4>Our Address</h4>
                    <h6>25/1 London road, Brighum,London</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="contact-info text-center">
                    <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <h4>Call Us</h4>
                    <h6>+1 916-875-2586-458
                    </h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="contact-info text-center">
                    <span><i class="fa fa-map-marker"></i></span>
                    <h4>Email Us</h4>
                    <h6>info@domaim.com</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="contact-info text-center">
                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                    <h4>Our Website</h4>
                    <h6>info@domaim.com</h6>
                </div>
            </div>
        </div>
        <div class="row padding-60">
            <div class="col-md-7 contact-team">
                <h3 class="text-center">Contact <span>Us</span></h3>
                <div class="contact-send-message">
                    <form class="contact-form row"  action="contact/insert" method="POST">
                        <div class="col col-sm-6">
                            <input type="text" class="form-control" name="name" placeholder="Enter Name*">
                        </div>
                        <div class="col col-sm-6">
                            <input type="email" class="form-control" name="mail" placeholder="Enter E-mail*">
                        </div>
                        <div class="col col-sm-6">
                            <input type="text" class="form-control" name="subject" placeholder="Enter Subject*">
                        </div>
                        <div class="col col-sm-6">
                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone*">
                        </div>
                        <div class="col col-sm-12">
                            <textarea class="form-control" name="content" placeholder="Enter Your Message*"></textarea>
                        </div>
                        <div class="col col-sm-12 text-center">
                            <button type="submit" class="btn btn-default btn-style hvr-shutter-out-vertical">Send</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div id="map" class="thumbnail">
                    <?php echo $settings->maps;?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view("footer"); ?>
<?php $this->load->view("bottom-footer"); ?>