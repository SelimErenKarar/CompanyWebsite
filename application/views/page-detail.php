<?php $this->load->view("home-top-header"); ?>
<?php $this->load->view("home-header"); ?>
<section class="page-title page-bg bg-opacity section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo $pag->title;?></h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Pages</a></li>
                        <li><?php echo $pag->title;?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-details-post section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-12">
                <div class="post-content">
                    <div class="blog-grids-s2 blog-content-wrapper">
                        <div class="entry-media">

                        </div>
                        <div class="entry-header">

                            <div class="entry-title">
                                <h2><?php echo $pag->title;?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="entry-body">
                        <?php echo $pag->content;?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view("footer"); ?>
<?php $this->load->view("bottom-footer"); ?>