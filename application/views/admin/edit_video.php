<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Video</li>
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
                    <?php foreach ($videos as $key): ?>
                            <form class="form-horizontal"  action="<?php echo base_url('admin/updateVideo/'.$key->id);?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Update Video</h4>
                                    
                                      
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Video Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="form-control"  value="<?php echo $key->title;?>" placeholder="Enter Speech Title">
                                        </div>
                                    </div>
                                    <?php echo form_error('title'); ?>
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Youtube Link</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="link" class="form-control"  value="<?php echo $key->link;?>" placeholder="Youtube Link">
                                        </div>
                                    </div>
                                    <?php echo form_error('link'); ?>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update Video</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
           