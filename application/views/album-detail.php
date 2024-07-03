<?php $this->load->view("home-top-header"); ?>
<?php $this->load->view("home-header"); ?>

<section class="page-title page-bg bg-opacity section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo $album->title;?></h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><?php echo $album->title;?></li>
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

                <?php foreach ($album_images as $album_image) { ?>
                <div class="portfolio-item cat1 cat3">
                    <div class="portfolio-item-content">
                        <div class="item-thumbnail">
                            <img src="uploads/<?php echo $album_image->album_images;?>" alt="">
                        </div>
                        <div class="portfolio-description">

                            <a href="uploads/<?php echo $album_image->album_images;?>" class="portfolio-gallery-set"><i class="fa fa-search-plus"></i></a>
                        </div>
                    </div>
                </div>

                <?php } ?>



            </div>
            
        </div>
    </div>
</section>
<?php $this->load->view("footer"); ?>
<?php $this->load->view("bottom-footer"); ?>