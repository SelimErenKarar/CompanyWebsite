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
                <h2> OUR SERVICES</h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li>Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

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
                        <h3><a href="services"><?php echo $row->title;?></a></h3>
                        <?php echo $row->content;?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
</section>
<?php $this->load->view("footer"); ?>
<?php $this->load->view("bottom-footer"); ?>