<?php $this->load->view("home-top-header"); ?>
<?php $this->load->view("home-header"); ?>

<section class="page-title page-bg bg-opacity section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Our Vision</h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a>Institutional</a></li>
                        <li>Our Vision</li>
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
                    <img src="uploads/<?php echo $vision->image; ?>" alt="" class="img-responsive">
                </a>
            </div>
            <div class="col-md-6">
                <div class="about-details">
                    <h5>Our Vision</h5>
                    <p>
                        <?php echo $vision->content; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view("footer"); ?>

<?php $this->load->view("bottom-footer"); ?>