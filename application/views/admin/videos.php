<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Video</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
                            <form class="form-horizontal"  action="<?php echo base_url('admin/addVideo');?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Add Video</h4>
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Video Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title"class="form-control" placeholder="Enter Video Title">
                                        <?php echo form_error('title'); ?>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Youtube Link</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="link"class="form-control" placeholder="Enter Youtube Link">
                                        <?php echo form_error('link'); ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Add Video</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           