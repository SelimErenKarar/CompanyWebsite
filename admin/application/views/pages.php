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
                                    <h4 class="card-title">Page List</h4>
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
                                    <div class="modal-dialog modal-lg " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">
                                                        Add New Page
                                                    </span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="pages/insert" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-6 pr-0">
                                                            <div class="form-group form-group-default">
                                                                <label>Icon</label>
                                                                <input id="addPosition" type="text" name="icon"
                                                                    class="form-control" placeholder="icon">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 pr-0">
                                                            <div class="form-group form-group-default">
                                                                <label>Title</label>
                                                                <input id="addPosition" type="text" name="title"
                                                                    class="form-control" placeholder="title">
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
                                                <th>Page Icon</th>
                                                <th>Page Title</th>
                                                <th>State</th>
                                                <th style="width: 10%">Edit/Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody id="sortable" data-url="<?php echo base_url("pages/ranksetter"); ?>">

                                            <?php if ($pages) {
                                                foreach ($pages as $page) { ?>
                                                    <tr id="rank-<?php echo $page->id; ?>">
                                                        <td>
                                                            <?php echo $page->id; ?>
                                                        </td>
                                                        <td><i class="<?php echo $page->icon; ?> fa-2x"></i></td>
                                                        <td>
                                                            <?php echo $page->title; ?>
                                                        </td>

                                                        <td>
                                                            <label class="switch">
                                                                <input type="checkbox"
                                                                    data-url="<?php echo base_url("pages/isactivesetter/$page->id"); ?>"
                                                                    id="isActive" <?php echo ($page->status == 1) ? "checked" : ""; ?>>
                                                                <span class="slider"></span>
                                                            </label>
                                                        </td>

                                                        <td>
                                                            <div class="form-button-action">
                                                                <button type="button" data-toggle="modal"
                                                                    data-target="#updateRowModal<?php echo $page->id; ?>"
                                                                    class="btn btn-primary btn-sm mx-1"
                                                                    data-original-title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button data-url="pages/delete/<?php echo $page->id; ?>"
                                                                    data-toggle="tooltip"
                                                                    class="btn btn-danger remove-btn btn-sm mx-1"
                                                                    data-original-title="Delete">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="updateRowModal<?php echo $page->id; ?>"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg " role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-mediumbold">
                                                                            Page is Updating </span>
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="pages/update/<?php echo $page->id; ?>"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        <div class="row">

                                                                            <div class="col-md-6 pr-0">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Page Icon</label>
                                                                                    <input id="addPosition" type="text"
                                                                                        name="icon" class="form-control"
                                                                                        value="<?php echo $page->icon; ?>">
                                                                                </div>
                                                                            </div>



                                                                            <div class="col-md-6 pr-0">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Page Title</label>
                                                                                    <input id="addPosition" type="text"
                                                                                        name="title" class="form-control"
                                                                                        value="<?php echo $page->title; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12 ">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Content</label>

                                                                                    <textarea name="content"
                                                                                        class="ckeditor"><?php echo $page->content; ?></textarea>
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