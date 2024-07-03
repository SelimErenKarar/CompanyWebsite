<header>
    <div class="hidden-xs hidden-sm nav-top primary-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="nav-top-access">
                        <ul>
                            <li><i class="fa fa-phone"></i><?php echo $settings->phone;?></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $settings->mail;?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="nav-top-social">
                        <ul>
                            <?php foreach ($social as $row) {?>
                            <li><a href="<?php echo $row->link;?>"><i class="<?php echo $row->icon;?>"></i></a></li>
                            <?php }?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="">
                            <img width="200" height="39" src="uploads/<?php echo $settings->logo;?>" alt="">
                        </a>
                    </div>
                    <div class="responsive-menu"></div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="mainmenu">
                        <nav>
                            <ul id="navigation">
                                <li class="current-page-item"><a href="">Homepage</a>

                                </li>
                                <li>
                                    <a href="javascript:void;">
                                        Institutional
                                    </a>
                                    <ul>
                                        <li><a href="about_us">About Us</a></li>
                                        <li><a href="vision">Our Vision</a></li>
                                        <li><a href="mission">Our Mission</a></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="services">Services</a>
                                </li>
                                <li>
                                    <a href="projects">Projects</a>
                                </li>
                                <li>
                                    <a href="news">News</a>

                                </li>

                                <li>
                                    <a href="javascript:void;">Others</a>
                                    <ul>
                                        <li><a href="faq">F.A.Q.</a></li>    
                                        <li><a href="albums">Albums</a></li>
                                        <li><a href="videos">Videos</a></li>

                                    </ul>
                                </li>
                                <li><a href="contact">Connections</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>