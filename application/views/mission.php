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
                <h2>Our Mission</h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li>Our Mission</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="about section-padding-top">
    <div class="container">
        <!--<div class="section-title">
            <h2><?php echo $mission->name; ?></h2>
            <span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
        </div>-->
        <div class="row">
            <!-- About image -->
            <div class="col-md-6">
                <a  class="img-about">
                    <img src="uploads/<?php echo $mission->image;?>" alt="" class="img-responsive">
                </a>
            </div>
            <div class="col-md-6">
                <!-- About text-->
                <div class="about-details">
                    <h5>Our Vision</h5>
                    <p><?php echo $mission->content;?></p>


                </div>
                <!-- /About text -->
            </div>
        </div>
    </div>
</section>

<!-- ==== footer section start ==== -->
<?php $this->load->view("footer"); ?>
<!-- ==== footer section end ==== -->

<!-- ====bottom-footer section start ==== -->
<?php $this->load->view("bottom-footer"); ?>
<!-- ==== bottom-footerfooter section end ==== -->