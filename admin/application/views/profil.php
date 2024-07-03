<?php $this->load->view("top-header"); ?>



<div class="wrapper">
    <?php $this->load->view("header"); ?>
    <?php $this->load->view("sidebar"); ?>

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Admin Profile</h4>
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
                            <a href="profil">Profile Settings</a>
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
                                    <div class="col-md-3">
                                        <form action="profil/updateprofilimage/<?php echo $admin->id; ?>" method="POST"
                                            enctype="multipart/form-data">

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="form-group">
                                                        <label for="">Uploaded Profile Photo</label><br>
                                                        <img width="350" height="100"
                                                            src="../uploads/<?php echo $admin->image; ?>"
                                                            class="img-thumbnail">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Update Profile Photo</label>
                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" name=""
                                                            class="btn btn btn-primary btn-block">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-9">
                                        <form action="profil/updateprofilinfo/<?php echo $admin->id; ?>" method="POST"
                                            enctype="multipart/form-data">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">User Name</label>
                                                        <input type="text" name="name"
                                                            value="<?php echo $admin->name; ?>" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">User Email</label>
                                                        <input type="text" name="mail"
                                                            value="<?php echo $admin->mail; ?>" class="form-control">
                                                    </div>

                                                    <div class="form-group text-right">
                                                        <button type="submit"
                                                            class="btn btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <form action="profil/updateprofilpassword/<?php echo $admin->id; ?>"
                                            method="POST" enctype="multipart/form-data">

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="form-group">
                                                        <label for="">New Password</label>
                                                        <input type="password" name="password1"
                                                            placeholder="New Password" class="form-control">
                                                        <?php if (isset($form_error)) { ?>
                                                            <small>
                                                                <?php echo form_error("password1"); ?>
                                                            </small>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">New Password (Again)</label>
                                                        <input type="password" name="password2"
                                                            placeholder="New Password (Again)" class="form-control">
                                                        <?php if (isset($form_error)) { ?>
                                                            <small>
                                                                <?php echo form_error("password2"); ?>
                                                            </small>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="form-group text-right">
                                                        <button type="submit"
                                                            class="btn btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

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