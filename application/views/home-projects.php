<section class="section-padding gray-brackground" id="portfolio">
    <div class="container">
        <div class="section-title">
            <h2>Our <span>Projects</span></h2>
            <span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
        </div>
        <div class="portfolio-content">
            <div class="portfolio portfolio-gutter portfolio-style-2 portfolio-container portfolio-masonry portfolio-column-count-4 ">

                <!-- Single portfolio item -->
                <?php foreach ($projects as $row) { ?>
                <div class="portfolio-item cat1 cat3">
                    <div class="portfolio-item-content">
                        <div class="item-thumbnail">
                            <img src="uploads/<?php echo $row->image;?>" alt="">
                        </div>
                        <div class="portfolio-description">
                            <h4><a href="#" ><?php echo $row->title;?></a></h4>

                            <a href="uploads/<?php echo $row->image;?>" class="portfolio-gallery-set"><i class="fa fa-search-plus"></i></a><a target="_blank" href="#"><i class="fa fa-link"></i></a>
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