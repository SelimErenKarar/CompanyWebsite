<section id="team" class="section-padding">
    <div class="container">
        <div class="section-title">
            <h2>Our <span>Team</span></h2>
            <span class="s-title-icon"><i class="icofont icofont-diamond"></i></span>
        </div>
        <div class="row">
            <?php  foreach ($teams as $row) {?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="team-single text-center m-b-30">
                    <div class="team-img">
                        <img src="uploads/<?php echo $row->image;?>" alt="" class="img img-responsive">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-content">
                        <h3><a href=""><?php echo $row->name;?></a></h3>
                        <span><?php echo $row->degree;?></span>
                    </div>
                </div>
            </div>

            <?php } ?>



        </div>
    </div>
</section>