<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Product Category</li>
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
                            <?php foreach($product_category as $row): ?>
                            <form class="form-horizontal"  action="<?php echo base_url('admin/update_product_category/'.$row->p_cat_id);?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Product Category</h4>
                                    <div class="form-group row">
                                        <label for="cat_image" class="col-sm-3  control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select name="cat_id" class="form-control" required="">
                                                <option value="" disabled="">Choose Category</option>
                                                <?php foreach ($category as $key): ?>
                                                <option value="<?php echo $key->cat_id;?>" <?php if($row->cat_id == $key->cat_id)echo "selected";?>><?php echo $key->cat_name;?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cat_image" class="col-sm-3  control-label col-form-label">Sub Category</label>
                                        <div class="col-sm-9">
                                            <select name="sub_cat_id" class="form-control" required="">
                                                <option value="" disabled="">Choose Sub Category</option>
                                                 <?php foreach ($sub_category as $key): ?>
                                                <option value="<?php echo $key->sub_cat_id;?>" <?php if($row->sub_cat_id == $key->sub_cat_id)echo "selected";?>><?php echo $key->sub_cat_name;?></option>
                                                <?php endforeach ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="p_cat_name" class="col-sm-3  control-label col-form-label">Product Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="p_cat_name"class="form-control"  value="<?php echo $row->p_cat_name;?>"placeholder="Product Category Name Here" required="">
                                        </div>
                                    </div>
                                    <center><img src="<?php echo base_url($row->p_cat_image);?>" style="height:100px;width: 120px;box-shadow: 0px 5px 10px rgba(0,0,0,0.4);border-radius: 10px;margin:10px;" alt="image not found" /></center>
                                     <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Product Category Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_cat_image"class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update Product Category</button>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
           