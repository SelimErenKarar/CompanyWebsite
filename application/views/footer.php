<footer class="footer-bg section-padding-top footer">
    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="f-widget">
                        <a href="">
                            <img width="200" height="39" src="uploads/<?php echo $settings->logo;?>" alt="">
                        </a>
                        <p class="m-t-30"></p>
                        <ul class="f-address">
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $settings->address;?></li>
                            <li><i class="fa fa-phone"></i> <?php echo $settings->phone;?></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i>  <?php echo $settings->mail;?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="f-widget">
                        <div class="f-widget-title">
                            <h4>Pages</h4>
                        </div>
                        <ul class="useful-links">
                            <?php  foreach ($pages as $row) { ?>
                            <li><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="home/page/<?php echo $row->id;?>"><?php echo $row->title;?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="f-widget">
                        <div class="f-widget-title">
                            <h4>Projects</h4>
                        </div>
                        <ul class="instagram-widget">
                            <?php  foreach ($projects as $row) { ?>
                            <li><a href="#"><img src="uploads/<?php echo $row->image;?>" alt="" class="img-responsive"></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="f-widget">
                        <div class="f-widget-title">
                            <h4>Stay Informed!</h4>
                        </div>
                        <p>Join our mailing list for campaigns and announcements:</p>
                        <div class="newsletter">
                            <form action="subscribers/insert" method="POST">
                            <div class="input-group">

                                <input type="email" class="form-control" name="mail" placeholder="Email adresiniz" aria-label="Search for..." autocomplete="off">
                                <span class="input-group-btn">
                      <button class="btn newsletter-btn" type="submit"><i class="fa Example of paper-plane fa-paper-plane"></i></button>

                    </span>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row text-center">
                <div class="copyright-social">
                    <ul class="social-profile">
                        <?php foreach ($social as $row) {?>
                            <li><a href="<?php echo $row->link;?>"><i class="<?php echo $row->icon;?>"></i></a></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>