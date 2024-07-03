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
                                    <h4 class="card-title">Upload Photo To <?php echo $album->title; ?> Album</h4>

                                </div>
                            </div>
                            <div class="card-body">

                                <form action="albums/uploadimages/<?php echo $album->id; ?>" class="dropzone" id="my-dropzone"></form>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Photos Uploaded To <?php echo $album->title; ?> Album</h4>
                                    <button data-url="albums/alldelete/<?php echo $album->id;  ?>" class="btn btn-danger remove-btn btn-round ml-auto">Delete All</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover text-center" >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Album Name</th>
                                            <th>State</th>
                                            <th style="width: 10%">Delete</th>
                                        </tr>
                                        </thead>
                                        
                                        <tbody id="sortable" data-url="<?php echo base_url("albums/ranksetter2/".$album->id);?>">

                                        <?php if ($albums){
                                            foreach ($albums as $albumss){?>

                                                <tr id="rank-<?php echo $albumss->id;?>">
                                                    <td><?php echo $albumss->id;?></td>
                                                    <td><img width="170" class="rounded" src="../uploads/<?php echo $albumss->album_images;?>"></td>
                                                    <td><?php echo $albumss->album_images;?></td>

                                                    <td>
                                                       <label class="switch">
                                                            <input type="checkbox" data-url="<?php echo base_url("albums/isactivesetter2/$albumss->id");?>" id="isActive" <?php echo ($albumss->status == 1)? "checked" :"";?>/>
                                                            <span class="slider"></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <div class="form-button-action">
                                                            <button data-url="albums/image_delete/<?php echo $albumss->id;  ?>" class="btn btn-danger remove-btn btn-sm mx-1" data-original-title="Delete">
                                                                <i class="fa fa-times-circle"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <script>

                                                Dropzone.autoDiscover = false;

                                                $(function() {
                                                    var myDropzone = new Dropzone("#my-dropzone");
                                                    myDropzone.on("queuecomplete", function(file) {
                                                        $("#open-alert").iziModal({
                                                            title: 'Congrats!',
                                                            subtitle: 'The installation process completed successfully.',
                                                            headerColor: 'green',
                                                            icon: 'far fa-check-circle',
                                                            iconText: null,
                                                            iconColor: '',
                                                            rtl: false,
                                                            width: 450,
                                                            top: null,
                                                            bottom: null,
                                                            borderBottom: true,
                                                            padding: 0,
                                                            radius: 3,
                                                            zindex: 999,
                                                            openFullscreen: false,
                                                            closeOnEscape: true,
                                                            closeButton: true,
                                                            timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
                                                            transitionIn: 'comingIn',
                                                            transitionOut: 'comingOut',
                                                            transitionInOverlay: 'fadeIn',
                                                            transitionOutOverlay: 'fadeOut',
                                                            onClosed: function(){
                                                                window.location.href="<?php echo base_url("albums/uploadpage/".$album->id); ?>";
                                                            }

                                                        });
                                                        $("#open-alert").iziModal("open");
                                                    });
                                                })
                                            </script>
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
