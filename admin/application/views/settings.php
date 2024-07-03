
<?php $this->load->view("top-header"); ?>

<div class="wrapper">
    <?php $this->load->view("header"); ?>
    <?php $this->load->view("sidebar"); ?>
    
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">General Settings</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="home">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="settings">General Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-md-3">
                                        <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-site-tab-icons" data-toggle="pill" href="#v-pills-site-icons" role="tab" aria-controls="v-pills-site-icons" aria-selected="true">
                                                <i class="flaticon-stopwatch"></i>
                                                Website Settings
                                            </a>
                                            <a class="nav-link" id="v-pills-iletisim-tab-icons" data-toggle="pill" href="#v-pills-iletisim-icons" role="tab" aria-controls="v-pills-iletisim-icons" aria-selected="false">
                                                <i class="flaticon-message"></i>
                                                Communication Settings
                                            </a>
                                            <a class="nav-link" id="v-pills-smtp-tab-icons" data-toggle="pill" href="#v-pills-smtp-icons" role="tab" aria-controls="v-pills-smtp-icons" aria-selected="false">
                                                <i class="flaticon-mailbox"></i>
                                                Smtp Settings
                                            </a>
                                            <a class="nav-link" id="v-pills-lf-tab-icons" data-toggle="pill" href="#v-pills-lf-icons" role="tab" aria-controls="v-pills-lf-icons" aria-selected="false">
                                                <i class="flaticon-layers-1"></i>
                                                Logo & Favicon Settings
                                            </a>
                                            <a class="nav-link" id="v-pills-sm-tab-icons" data-toggle="pill" href="#v-pills-sm-icons" role="tab" aria-controls="v-pills-sm-icons" aria-selected="false">
                                                <i class="flaticon-share"></i>
                                                Social Media Settings
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-9">
                                        <div class="tab-content" id="v-pills-with-icon-tabContent">

                                            <div class="tab-pane fade show active" id="v-pills-site-icons" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                                <form action="settings/update_site_ayarlari/<?php echo $settings->id; ?>" method="POST" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label for="">Website Title</label>
                                                        <input type="text" name="title" value="<?php echo $settings->title; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Website Description</label>
                                                        <input type="text" name="description" value="<?php echo $settings->description; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Website Keywords</label>
                                                        <input type="text" name="keywords" value="<?php echo $settings->keywords; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Website Author</label>
                                                        <input type="text" name="author" value="<?php echo $settings->author; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Website Footer</label>
                                                        <input type="text" name="footer" value="<?php echo $settings->footer; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit"  class="btn btn btn-primary">Update</button>
                                                    </div>

                                                 </form>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-iletisim-icons" role="tabpanel" aria-labelledby="v-pills-iletisim-tab-icons">
                                                <form action="settings/update_iletisim/<?php echo $settings->id; ?>" method="POST" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label for="">Phone</label>
                                                        <input type="text" name="phone" value="<?php echo $settings->phone; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="text" name="mail" value="<?php echo $settings->mail; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Fax</label>
                                                        <input type="text" name="fax" value="<?php echo $settings->fax; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Address</label>
                                                        <input type="text" name="address" value="<?php echo $settings->address; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Map</label>
                                                        <textarea type="text" name="maps" rows="5" class="form-control"><?php echo $settings->maps; ?></textarea>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit"  class="btn btn btn-primary">Update</button>
                                                    </div>

                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-smtp-icons" role="tabpanel" aria-labelledby="v-pills-smtp-tab-icons">
                                                <form action="settings/update_smtp/<?php echo $settings->id; ?>" method="POST" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label for="">Host</label>
                                                        <input type="text" name="host" value="<?php echo $settings->host; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">User Email</label>
                                                        <input type="text" name="user_mail" value="<?php echo $settings->user_mail; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Password</label>
                                                        <input type="text" name="user_password" value="<?php echo $settings->user_password; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Port</label>
                                                        <input type="text" name="port" value="<?php echo $settings->port; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Informed Email</label>
                                                        <input type="text" name="notification_mail" value="<?php echo $settings->notification_mail; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit"  class="btn btn btn-primary">Update</button>
                                                    </div>

                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-lf-icons" role="tabpanel" aria-labelledby="v-pills-lf-tab-icons">
                                                <form action="settings/logoayarlari/<?php echo $settings->id; ?>" method="POST" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label for="">Uploaded Logo</label><br>
                                                        <img width="200" height="39" src="../uploads/<?php echo $settings->logo; ?>"  class="img-thumbnail">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Upload New Logo</label>
                                                        <input type="file" name="logo" class="form-control">
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" name="" class="btn btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                                    <hr>
                                                <form action="settings/faviconsettings/<?php echo $settings->id; ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="">Uploaded Favicon</label><br>
                                                        <img width="35" height="35" src="../uploads/<?php echo $settings->favicon; ?>"  class="img-thumbnail">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Upload Favicon</label>
                                                        <input type="file" name="favicon" class="form-control">
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit"  class="btn btn btn-primary">Update</button>
                                                    </div>

                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-sm-icons" role="tabpanel" aria-labelledby="v-pills-sm-tab-icons">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="d-flex align-items-center">
                                                                <h4 class="card-title">Account List</h4>
                                                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                                                    <i class="fa fa-plus"></i>
                                                                    Add New
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header no-bd">
                                                                            <h5 class="modal-title">
                                                                                <span class="fw-mediumbold">
                                                                                    Add New Account
                                                                                </span>
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="social/insertsocial" method="POST" enctype="multipart/form-data">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group form-group-default">
                                                                                            <label>Name</label>
                                                                                            <input id="addName" type="text" name="title" class="form-control" placeholder="name">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 pr-0">
                                                                                        <div class="form-group form-group-default">
                                                                                            <label>Icon</label>
                                                                                            <input id="addPosition" type="text" name="icon" class="form-control" placeholder="icon">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group form-group-default">
                                                                                            <label>Link</label>
                                                                                            <input id="addOffice" type="text" name="link" class="form-control" placeholder="link giriniz">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                        </div>
                                                                        <div class="modal-footer no-bd">
                                                                            <button type="submit"  class="btn btn-primary">Add</button>
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="table-responsive">
                                                                <table id="add-row" class="display table table-striped table-hover text-center" >
                                                                    <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Icon</th>
                                                                        <th>Title</th>
                                                                        <th>Link</th>
                                                                        <th>State</th>
                                                                        <th style="width: 10%">Edit/Delete</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody id="sortable" data-url="<?php echo base_url("social/ranksetter"); ?>">

                                                                    <?php if ($social) {
                                                                        foreach ($social as $sm) { ?>

                                                                                                                            <tr id="rank-<?php echo $sm->id; ?>">
                                                                                                                                <td><?php echo $sm->id; ?></td>
                                                                                                                                <td><i class="<?php echo $sm->icon; ?> fa-2x"></i></td>
                                                                                                                                <td><?php echo $sm->title; ?></td>
                                                                                                                                <td><?php echo $sm->link; ?></td>
                                                                                                                                <td>
                                                                                                                                    <label class="switch">
                                                                                                                                        <input type="checkbox" data-url="<?php echo base_url("social/isactivesetter/$sm->id"); ?>" id="isActive" <?php echo ($sm->status == 1) ? "checked" : ""; ?>>
                                                                                                                                        <span class="slider"></span>
                                                                                                                                    </label>
                                                                                                                                </td>

                                                                                                                                <td>
                                                                                                                                    <div class="form-button-action">
                                                                                                                                        <button type="button" data-toggle="modal" data-target="#updateRowModal<?php echo $sm->id; ?>" class="btn btn-primary btn-sm mx-1" data-original-title="Edit">
                                                                                                                                            <i class="fa fa-edit"></i>
                                                                                                                                        </button>
                                                                                                                                        <button data-url="social/deletesocial/<?php echo $sm->id; ?>"  class="btn btn-danger remove-btn btn-sm mx-1" data-original-title="Delete">
                                                                                                                                            <i class="fa fa-times"></i>
                                                                                                                                        </button>
                                                                                                                                    </div>
                                                                                                                                </td>
                                                                                                                            </tr>

                                                                                                                            <div class="modal fade" id="updateRowModal<?php echo $sm->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                                                                <div class="modal-dialog" role="document">
                                                                                                                                    <div class="modal-content">
                                                                                                                                        <div class="modal-header no-bd">
                                                                                                                                            <h5 class="modal-title">
                                                                                                        <span class="fw-mediumbold">
                                                                                                        <?php echo $sm->title; ?> Account is Updating
                                                                                                    </span>
                                                                                                        
                                                                                                                                            </h5>
                                                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                                            </button>
                                                                                                                                        </div>
                                                                                                                                        <div class="modal-body">
                                                                                                                                            <form action="social/updatesocial/<?php echo $sm->id; ?>" method="POST" enctype="multipart/form-data">
                                                                                                                                                <div class="row">
                                                                                                                                                    <div class="col-sm-12">
                                                                                                                                                        <div class="form-group form-group-default">
                                                                                                                                                            <label>Name</label>
                                                                                                                                                            <input id="addName" type="text" name="title" class="form-control" value="<?php echo $sm->title; ?>">
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col-md-6 pr-0">
                                                                                                                                                        <div class="form-group form-group-default">
                                                                                                                                                            <label>Icon</label>
                                                                                                                                                            <input id="addPosition" type="text" name="icon" class="form-control" value="<?php echo $sm->icon; ?>">
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col-md-6">
                                                                                                                                                        <div class="form-group form-group-default">
                                                                                                                                                            <label>Link</label>
                                                                                                                                                            <input id="addOffice" type="text" name="link" class="form-control" value="<?php echo $sm->link; ?>">
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>

                                                                                                                                        </div>
                                                                                                                                        <div class="modal-footer no-bd">
                                                                                                                                            <button type="submit"  class="btn btn-primary">Update</button>
                                                                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                                                                                        </div>
                                                                                                                                        </form>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                            <?php }

                                                                    } else { ?>

                                                                                            <tr><td>No data found.</td></tr>

                                                                   <?php } ?>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        
        <?php $this->load->view("footer"); ?>
        

    </div>

</div>
<?php $this->load->view("bottom-footer"); ?>

