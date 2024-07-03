<?php $this->load->view("home-top-header"); ?>
<?php $this->load->view("home-header"); ?>

<section class="page-title page-bg bg-opacity section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>News</h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding gray-brackground" id="portfolio">
    <div class="container">

        <div class="portfolio-content">
            <section class="blog-main-section section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="blog-grids-s2 blog-content-wrapper">
                                <div class="row">
                                    <?php foreach ($news as $new) { ?>
                                        <div class="col-md-6 m-b-30">
                                            <div class="grid">
                                                <div class="entry-header">
                                                    <img src="uploads/<?php echo $new->image ?>" alt=""
                                                        class="img img-responsive">
                                                </div>
                                                <div class="entry-body">
                                                    <div class="entry-meta">
                                                        <ul>
                                                            <li><i class="fa fa-user"></i>Post by: <a href="">Selim Eren
                                                                    Karar</a></li>
                                                            <li><i class="fa fa-calendar"></i> <a href="">
                                                                    <?php echo $new->created_at; ?>
                                                                </a></li>
                                                            <li><i class="fa fa-commenting"></i> <a href="#">10 Yorum</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="entry-details">
                                                        <h3><a href="news/detail/<?php echo $new->id; ?>">
                                                                <?php echo $new->title ?>
                                                            </a></h3>
                                                        <?php echo $new->content; ?>
                                                        <a href="news/detail/<?php echo $new->id; ?>">Devamı <i
                                                                class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>




                                </div>
                            </div>
                            <div class="pagi m-t-0 text-center">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-long-arrow-left"></i></a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a>2</a></li>
                                    <li><a>3</a></li>
                                    <li>
                                        <a><i class="fa fa-long-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>
</section>
<?php $this->load->view("footer"); ?>
<?php $this->load->view("bottom-footer"); ?>