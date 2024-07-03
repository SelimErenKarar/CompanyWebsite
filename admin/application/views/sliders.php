<?php $this->load->view("top-header"); ?>

<div class="wrapper">
    <?php $this->load->view("header"); ?>
    <?php $this->load->view("sidebar"); ?>

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Slide List</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#addRowModal">
                                        <i class="fa fa-plus"></i>
                                        Add New
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Modal -->
                                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">
                                                        Add New Slide</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="sliders/insert" method="POST"
                                                    enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Image</label>
                                                                <input id="addName" type="file" name="image"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 ">
                                                            <div class="form-group form-group-default">
                                                                <label>Content</label>

                                                                <textarea name="content" class="ckeditor"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 pr-0">
                                                            <div class="form-group form-group-default">
                                                                <label>Left Button</label>
                                                                <input id="addPosition" type="text" name="btn_left"
                                                                    class="form-control" placeholder="left button">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Right Button</label>
                                                                <input id="addOffice" type="text" name="btn_right"
                                                                    class="form-control" placeholder="right button">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pr-0">
                                                            <div class="form-group form-group-default">
                                                                <label>Left Button Link</label>
                                                                <input id="addPosition" type="text" name="btn_left_link"
                                                                    class="form-control" placeholder="left button link">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Right Button Link</label>
                                                                <input id="addOffice" type="text" name="btn_right_link"
                                                                    class="form-control" placeholder="right button link">
                                                            </div>
                                                        </div>

                                                    </div>


                                            </div>
                                            <div class="modal-footer no-bd">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancel</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Left Button</th>
                                                <th>Right Button</th>
                                                <th>State</th>
                                                <th style="width: 10%">Edit/Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody id="sortable" data-url="<?php echo base_url("sliders/ranksetter"); ?>">

                                            <?php if ($sliders) {
                                                foreach ($sliders as $slider) { ?>
                                                    <tr id="rank-<?php echo $slider->id; ?>">
                                                        <td>
                                                            <?php echo $slider->id; ?>
                                                        </td>
                                                        <td><img width="250" height="100" class="rounded"
                                                                src="../uploads/<?php echo $slider->image; ?>"></td>
                                                        <td>
                                                            <?php echo $slider->btn_left; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $slider->btn_right; ?>
                                                        </td>
                                                        <td>
                                                            <label class="switch">
                                                                <input type="checkbox"
                                                                    data-url="<?php echo base_url("sliders/isactivesetter/$slider->id"); ?>"
                                                                    id="isActive" <?php echo ($slider->status == 1) ? "checked" : ""; ?>>
                                                                <span class="slider"></span>
                                                            </label>
                                                        </td>

                                                        <td>
                                                            <div class="form-button-action">
                                                                <button type="button" data-toggle="modal"
                                                                    data-target="#updateRowModal<?php echo $slider->id; ?>"
                                                                    class="btn btn-primary btn-sm mx-1"
                                                                    data-original-title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button data-url="sliders/delete/<?php echo $slider->id; ?>"
                                                                    data-toggle="tooltip"
                                                                    class="btn btn-danger remove-btn btn-sm mx-1"
                                                                    data-original-title="Delete">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="updateRowModal<?php echo $slider->id; ?>"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-mediumbold">
                                                                            Slide is Updating
                                                                        </span>
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="sliders/update/<?php echo $slider->id; ?>"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        <div class="row">

                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Uploaded Slide</label>
                                                                                    <img width="100%"
                                                                                        src="../uploads/<?php echo $slider->image; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Image</label>
                                                                                    <input id="addName" type="file" name="image"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12 ">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Content</label>

                                                                                    <textarea name="content"
                                                                                        class="ckeditor"><?php echo $slider->content; ?></textarea>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 pr-0">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Left Button</label>
                                                                                    <input id="addPosition" type="text"
                                                                                        name="btn_left" class="form-control"
                                                                                        value="<?php echo $slider->btn_left; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Right Button</label>
                                                                                    <input id="addOffice" type="text"
                                                                                        name="btn_right" class="form-control"
                                                                                        value="<?php echo $slider->btn_right; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 pr-0">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Left Button Link</label>
                                                                                    <input id="addPosition" type="text"
                                                                                        name="btn_left_link"
                                                                                        class="form-control"
                                                                                        value="<?php echo $slider->btn_left_link; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Right Button Link</label>
                                                                                    <input id="addOffice" type="text"
                                                                                        name="btn_right_link"
                                                                                        class="form-control"
                                                                                        value="<?php echo $slider->btn_right_link; ?>">
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer no-bd">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                            <button type="button" class="btn btn-danger"
                                                                                data-dismiss="modal">Cancel</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php }

                                            } else { ?>

                                                    <tr>
                                                        <td colspan="7">No data found.</td>
                                                    </tr>

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

        <?php $this->load->view("footer"); ?>


    </div>

</div>


<?php $this->load->view("bottom-footer"); ?>