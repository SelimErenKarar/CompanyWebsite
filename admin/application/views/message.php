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
                                    <h4 class="card-title">Message List</h4>

                                </div>
                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Subject</th>
                                                <th>State</th>
                                                <th style="width: 10%">Edit/Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody id="sortable">

                                            <?php if ($message) {
                                                foreach ($message as $mess) { ?>
                                                    <tr id="rank-<?php echo $mess->id; ?>">
                                                        <td>
                                                            <?php echo $mess->id; ?>
                                                        </td>
                                                        <td> 
                                                            <?php echo $mess->name; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $mess->mail; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $mess->phone; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $mess->subject; ?>
                                                        </td>

                                                        <td>
                                                            <label class="switch">
                                                                <input type="checkbox"
                                                                    data-url="<?php echo base_url("message/isactivesetter/$mess->id"); ?>"
                                                                    id="isActive" <?php echo ($mess->reply_status == 1) ? "checked" : ""; ?>>
                                                                <span class="slider"></span>
                                                            </label>
                                                        </td>

                                                        <td>
                                                            <div class="form-button-action">
                                                                <button type="button" data-toggle="modal"
                                                                    data-target="#updateRowModal<?php echo $mess->id; ?>"
                                                                    class="btn btn-primary btn-sm mx-1"
                                                                    data-original-title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button data-url="message/delete/<?php echo $mess->id; ?>"
                                                                    data-toggle="tooltip"
                                                                    class="btn btn-danger remove-btn btn-sm mx-1"
                                                                    data-original-title="Delete">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="updateRowModal<?php echo $mess->id; ?>"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg " role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-mediumbold">
                                                                            Message
                                                                        </span>
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="message/reply/<?php echo $mess->id; ?>"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        <div class="row">

                                                                            <div class="col-md-6 pr-0">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Name</label>
                                                                                    <input id="addPosition" type="text"
                                                                                        name="name" class="form-control"
                                                                                        value="<?php echo $mess->name; ?> "
                                                                                        readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 pr-0">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Email</label>
                                                                                    <input id="addPosition" type="text"
                                                                                        name="mail" class="form-control"
                                                                                        value="<?php echo $mess->mail; ?>"
                                                                                        readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 pr-0">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Phone Number</label>
                                                                                    <input id="addPosition" type="text"
                                                                                        name="phone" class="form-control"
                                                                                        value="<?php echo $mess->phone; ?>"
                                                                                        readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 pr-0">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Subject</label>
                                                                                    <input id="addPosition" type="text"
                                                                                        name="subject" class="form-control"
                                                                                        value="<?php echo $mess->subject; ?>"
                                                                                        readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12 ">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Incoming Message</label>

                                                                                    <textarea name="content" rows="5"
                                                                                        class="form-control"><?php echo $mess->content; ?></textarea>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12 ">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Answer The Message (
                                                                                        <?php echo $mess->mail; ?>)
                                                                                    </label>

                                                                                    <textarea name="reply"
                                                                                        class="ckeditor"></textarea>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer no-bd">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Answer</button>
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
                                                        <td colspan="8">No data found.</td>
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