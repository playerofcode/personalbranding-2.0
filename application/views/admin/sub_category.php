<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Sub Category</li>
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
                            <form class="form-horizontal"  action="<?php echo base_url('admin/add_sub_category');?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Add Sub Category</h4>
                                    <div class="form-group row">
                                        <label for="cat_image" class="col-sm-3  control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select name="cat_id" class="form-control" required="">
                                                <option value="" disabled="" selected="">Choose Category</option>
                                                <?php foreach ($category as $key): ?>
                                                <option value="<?php echo $key->cat_id;?>"><?php echo $key->cat_name;?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Sub Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sub_cat_name"class="form-control"  placeholder="Sub Category Name Here" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="photo" class="form-control"  >
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Add Sub Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           