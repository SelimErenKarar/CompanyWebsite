<?php $this->load->view("home-top-header"); ?>
<?php $this->load->view("home-header"); ?>

<section class="page-title page-bg bg-opacity section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Videos</h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Others</a></li>
                        <li>Videos</li>
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

                <?php foreach ($videos as $video) { ?>
                <div class="portfolio-item cat1 cat3">
                    <div class="portfolio-item-content">
                        <div class="item-thumbnail">
                            <iframe src="https://www.youtube.com/embed/<?php echo $video->link;?>" width="100%" height="250" allowfullscreen></iframe>
                        </div>
                        <div class="portfolio-description">

                            <a href="javascript:void;" data-izimodal-open="#modal-youtube-<?php echo $video->id;?>"><i class="fa fa-video-camera"></i></a>
                            <div id="modal-youtube-<?php echo $video->id;?>"
                                 class="modais"
                                 data-izimodal-transitionin="fadeInDown"
                                 data-izimodal-title="<?php echo $video->title;?>"
                                 data-izimodal-iframeURL="https://www.youtube.com/embed/<?php echo $video->link;?>"></div>
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