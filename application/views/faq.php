<?php $this->load->view("home-top-header"); ?>
<?php $this->load->view("home-header"); ?>

<section class="page-title page-bg bg-opacity section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>FREQUENTLY ASKED QUESTIONS</h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li>Frequently Asked Questions</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding gray-brackground" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-xs-12">
                <?php foreach ($faq as $row) { ?>
                    <div class="panel-group accordion-s1" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseOne<?php echo $row->id; ?>" aria-expanded="true">
                                    <?php echo $row->title; ?> ?
                                </a>
                            </div>

                            <div id="collapseOne<?php echo $row->id; ?>"
                                class="panel-collapse collapse <?php echo ($row->rank == 0) ? "in" : ""; ?> ">
                                <div class="panel-body">
                                    <?php echo $row->content; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>
            <div class="col-md-5 col-xs-12">
                <div class="faq-text text-center">
                    <h1>F.A.Q.</h1>
                    <h5><span>Frequently</span>Asked</span><span>Question</span></h5>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<?php $this->load->view("footer"); ?>
<?php $this->load->view("bottom-footer"); ?>