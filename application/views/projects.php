<?php $this->load->view("home-top-header"); ?>
<?php $this->load->view("home-header"); ?>

<section class="page-title page-bg bg-opacity section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>OUR PROJECTS</h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li>Projects</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding gray-brackground" id="portfolio">
    <div class="container">

        <div class="portfolio-content">
            <div class="portfolio portfolio-gutter portfolio-style-2 portfolio-container portfolio-masonry portfolio-column-count-4 ">

                <?php foreach ($projects as $row) { ?>
                <div class="portfolio-item cat1 cat3">
                    <div class="portfolio-item-content">
                        <div class="item-thumbnail">
                            <img src="uploads/<?php echo $row->image;?>" alt="">
                        </div>
                        <div class="portfolio-description">
                            <h4><a href="projects/"><?php echo $row->title;?></a></h4>

                            <a href="uploads/<?php echo $row->image;?>" class="portfolio-gallery-set"><i class="fa fa-search-plus"></i></a><a target="_blank" href="projects"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>

                <?php } ?>



            </div>
            <div class="text-center">
                <a class="btn btn-default btn-style hvr-shutter-out-vertical" href="projects">View More</a>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view("footer"); ?>
<?php $this->load->view("bottom-footer"); ?>