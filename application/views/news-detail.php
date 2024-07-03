<?php $this->load->view("home-top-header"); ?>
<?php $this->load->view("home-header"); ?>

<section class="page-title page-bg bg-opacity section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo $news->title;?></h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="">News</a></li>
                        <li><?php echo $news->title;?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-details-post section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-9">
                <div class="post-content">
                    <div class="blog-grids-s2 blog-content-wrapper">
                        <div class="entry-media">
                            <img src="uploads/<?php echo $news->image;?>" alt="" class="img img-responsive">
                        </div>
                        <div class="entry-header">
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i>Post by: <a href="#">Deniz Göçer</a></li>
                                    <li><i class="fa fa-calendar"></i> <a href="#"><?php echo $news->created_at;?></a></li>
                                    <li><i class="fa fa-commenting"></i> <a href="#">5 Yorum</a></li>
                                </ul>
                            </div>
                            <div class="entry-title">
                                <h2><?php echo $news->title;?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="entry-body">
                        <?php echo $news->title;?>
                    </div>
                    <div class="tag-social-share">
                        <div class="tag">
                            <?php
                            $seo = explode(",",$news->tags);
                              foreach ($seo as $seoo) {?>
                                <a href="javascript:void;">#<?php echo $seoo;?></a>
                            <?php }?>

                        </div>
                        <div class="social-share">
                            <span>Share:</span>
                            <ul class="social-links">
                                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url("news/detail/$news->id");?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-lg-3">
                <div class="blog-sidebar">
                    <div class="widget search-widget">
                        <form class="form">
                            <div>
                                <input type="text" class="form-control" placeholder="Search...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="widget categories-widget">
                        <h3>Categories</h3>
                        <ul>
                            <li><a>Apps Design</a></li>
                            <li><a>Photography</a></li>
                            <li><a>Creative Design</a></li>
                            <li><a>Developer</a></li>
                            <li><a>HTML &amp; CSS</a></li>
                        </ul>
                    </div>
                    <div class="widget recent-posts-widget">
                        <h3>Recent posts</h3>
                        <div class="post">
                            <h4><a>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h4>
                            <span class="date">Aug 08, 2017</span>
                        </div>
                        <div class="post">
                            <h4><a>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h4>
                            <span class="date">Aug 08, 2017</span>
                        </div>
                    </div>
                    <div class="widget tags-widget">
                        <h3>Tags Clouds</h3>
                        <div>
                            <a>Advisor</a>
                            <a>Consulting</a>
                            <a>Credit</a>
                            <a>Welth management</a>
                            <a>Finance</a>
                            <a>Advisor</a>
                            <a>Consulting</a>
                            <a>Credit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</section>
<?php $this->load->view("footer"); ?>

<?php $this->load->view("bottom-footer"); ?>