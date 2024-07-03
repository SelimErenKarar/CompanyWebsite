
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
                                    <h4 class="card-title">Subscriber List</h4>

                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover text-center" >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Icon</th>
                                            <th>E-Mail</th>
                                            <th>State</th>
                                            <th style="width: 10%">Delete</th>
                                        </tr>
                                        </thead>

                                        <tbody id="sortable" >

                                        <?php if ($subscribers){
                                            foreach ($subscribers as $subs){?>

                                                <tr id="rank-<?php echo $subs->id;?>">
                                                    <td><?php echo $subs->id;?></td>
                                                    <td><i class="<?php echo $subs->icon;?> fa-2x"></i></td>
                                                    <td><?php echo $subs->mail;?></td>

                                                    <td>
                                                        <label class="switch">
                                                            <input type="checkbox" data-url="<?php echo base_url("subscribers/isactivesetter/$subs->id");?>" id="isActive" <?php echo ($subs->status == 1)? "checked" :"";?>>
                                                            <span class="slider"></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <div class="form-button-action">

                                                            <button data-url="subscribers/delete/<?php echo $subs->id;?>" data-toggle="tooltip"  class="btn btn-danger remove-btn btn-sm mx-1" data-original-title="Delete">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php }
                                        }else{?>

                                            <tr><td colspan="7">No data found.</td></tr>

                                        <?php }?>

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