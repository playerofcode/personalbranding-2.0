<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Image</li>
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
                    <?php foreach ($images as $key):?>
                            <form class="form-horizontal"  action="<?php echo base_url('admin/updateImage/'.$key->id);?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Update Image</h4>
                                    <center>
                                        <?php if(!empty($key->photo)): ?>
                                            <img src="<?php echo base_url($key->photo);?>" style="height: 100px;width:120px;border-radius:10px;border:1px dashed orange;box-shadow:0 5px 10px rgba(0,0,0,0.4);margin: 10px;">
                                        <?php endif; ?>
                                    </center>
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="photo" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update Image</button>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach?>
                        </div>
                    </div>
                </div>
            </div>
           