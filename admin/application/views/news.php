<?php $this->load->view("top-header"); ?>

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {

        opacity: 0;

        width: 0;

        height: 0;

    }

    .slider {

        position: absolute;

        cursor: pointer;

        top: 0;

        left: 0;

        right: 0;

        bottom: 0;

        background-color: #ccc;

        -webkit-transition: .4s;

        transition: .4s;

    }

    .slider:before {

        position: absolute;

        content: "";

        height: 26px;

        width: 26px;

        left: 4px;

        bottom: 4px;

        background-color: white;

        -webkit-transition: .4s;

        transition: .4s;

    }

    input:checked+.slider {

        background-color: #2196F3;

    }

    input:focus+.slider {

        box-shadow: 0 0 1px #2196F3;

    }

    input:checked+.slider:before {

        -webkit-transform: translateX(26px);

        -ms-transform: translateX(26px);

        transform: translateX(26px);

    }

    .slider.round {

        border-radius: 34px;

    }

    .slider.round:before {

        border-radius: 50%;

    }
</style>

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
                                    <h4 class="card-title">News List</h4>
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
                                                        Add New News
                                                    </span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="news/insert" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Image</label>
                                                                <input id="addName" type="file" name="image"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 pr-0">
                                                            <div class="form-group form-group-default">
                                                                <label>Title</label>
                                                                <input id="addPosition" type="text" name="title"
                                                                    class="form-control" placeholder="title">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <div class="form-group form-group-default">
                                                                <label>Tags</label>
                                                                <input id="addPosition" type="text" name="tags"
                                                                    class="form-control" placeholder="tag 1, tag 2, tag 3">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 ">
                                                            <div class="form-group form-group-default">
                                                                <label>Content</label>

                                                                <textarea name="content" class="ckeditor"></textarea>
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
                                                <th>Title</th>
                                                <th>State</th>
                                                <th style="width: 10%">Edit/Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody id="sortable">
                                            <?php if ($news) {
                                                foreach ($news as $new) { ?>

                                                    <tr id="rank-<?php echo $new->id; ?>">
                                                        <td>
                                                            <?php echo $new->id; ?>
                                                        </td>
                                                        <td><img width="170" class="rounded"
                                                                src="../uploads/<?php echo $new->image; ?>"></td>
                                                        <td>
                                                            <?php echo $new->title; ?>
                                                        </td>

                                                        <td>
                                                            <label class="switch">
                                                                <input type="checkbox"
                                                                    data-url="<?php echo base_url("news/isactivesetter/$new->id"); ?>"
                                                                    id="isActive" <?php echo ($new->status == 1) ? "checked" : ""; ?>>
                                                                <span class="slider"></span>
                                                            </label>
                                                        </td>

                                                        <td>
                                                            <div class="form-button-action">
                                                                <button type="button" data-toggle="modal"
                                                                    data-target="#updateRowModal<?php echo $new->id; ?>"
                                                                    class="btn btn-primary btn-sm mx-1"
                                                                    data-original-title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button data-url="news/delete/<?php echo $new->id; ?>"
                                                                    data-toggle="tooltip"
                                                                    class="btn btn-danger remove-btn btn-sm mx-1"
                                                                    data-original-title="Delete">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="updateRowModal<?php echo $new->id; ?>"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-mediumbold">
                                                                            News is Updating</span>
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="news/update/<?php echo $new->id; ?>"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        <div class="row">

                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Uploaded News Image</label>
                                                                                    <img width="100%"
                                                                                        src="../uploads/<?php echo $new->image; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Image</label>
                                                                                    <input id="addName" type="file" name="image"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 pr-0">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Title</label>
                                                                                    <input id="addPosition" type="text"
                                                                                        name="title" class="form-control"
                                                                                        value="<?php echo $new->title; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 ">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Tags</label>
                                                                                    <input id="addPosition" type="text"
                                                                                        name="tags" class="form-control"
                                                                                        value="<?php echo $new->tags; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12 ">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Content</label>

                                                                                    <textarea name="content"
                                                                                        class="ckeditor"><?php echo $new->content; ?></textarea>
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