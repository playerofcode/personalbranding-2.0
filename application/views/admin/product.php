<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                            <form class="form-horizontal"  action="<?php echo base_url('admin/add_product');?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Add Product</h4>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <select name="cat_id" id="cat_id" class="form-control">
                                                <option selected="" disabled="">Choose Category </option>
                                                <?php foreach ($category as $key): ?>
                                                    <option value="<?php echo $key->cat_id; ?>" <?php echo  set_select('cat_id',$key->cat_id); ?>><?php echo $key->cat_name;?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <?php echo form_error('cat_id'); ?>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Choose Sub Category</label>
                                        <div class="col-sm-9">
                                            <select name="sub_cat_id" id="sub_cat_id" class="form-control" required="">
                                                <option value="" disabled="" selected="">Choose Sub Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Choose Product Category</label>
                                        <div class="col-sm-9">
                                            <select name="p_cat_id" id="p_cat_id" class="form-control" required="">
                                                <option value="" disabled="" selected="">Choose Product Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3  control-label col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="p_name"class="form-control" value="<?php echo set_value('p_name'); ?>" placeholder="Product Name Here">
                                            <?php echo form_error('p_name'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3  control-label col-form-label">Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="tel" name="p_qty"class="form-control" value="<?php echo set_value('p_qty',1); ?>" placeholder="Product Quantity Here">
                                            <?php echo form_error('p_qty'); ?>
                                        </div>
                                    </div>
                              
                                 <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Unit</label>
                                        <div class="col-sm-9">
                                            <select name="p_unit" id="" class="form-control">
                                                <option selected="" disabled="">Choose Unit</option>
                                                <option value="kg" <?php echo  set_select('p_unit', 'kg'); ?>>kg</option>
                                                <option value="gm" <?php echo  set_select('p_unit', 'gm'); ?>>gm</option>
                                                <option value="ltr" <?php echo  set_select('p_unit', 'ltr'); ?>>ltr</option>
                                                <option value="ml" <?php echo  set_select('p_unit', 'ml'); ?>>ml</option>
                                                <option value="piece" <?php echo  set_select('p_unit', 'piece'); ?>>piece</option>
                                            </select>
                                            <?php echo form_error('p_unit'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3  control-label col-form-label">Original Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="1" name="m_price"class="form-control" value="<?php echo set_value('m_price'); ?>" placeholder="Original Price Here">
                                            <?php echo form_error('m_price'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3  control-label col-form-label">Discount Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="1" name="d_price"class="form-control" value="<?php echo set_value('d_price'); ?>" placeholder="Discount Price Here">
                                            <?php echo form_error('d_price'); ?>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3  control-label col-form-label">Wholesale Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="1" name="h_price"class="form-control" value="<?php echo set_value('h_price'); ?>" placeholder="Wholesale Price Here">
                                            <?php echo form_error('h_price'); ?>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Availability</label>
                                        <div class="col-sm-9">
                                            <select name="availability" id="" class="form-control">
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>
                                            </select>
                                            <?php echo form_error('availability'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select name="status" id="" class="form-control">
                                                <option value="1">active</option>
                                                <option value="0">deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="p_description" id="ckeditor" cols="30" rows="10" class="form-control" style="resize: none;"><?php echo set_value('p_description'); ?></textarea>
                                            <?php echo form_error('p_description'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 1</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img1" class="form-control" >
                                            <?php if(isset($upload_error)){echo $upload_error;}; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 2</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img2" class="form-control">
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 3</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 4</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img4" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 5</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img5" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 6</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img6" class="form-control">
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 7</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img7" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 8</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img8" class="form-control">
                                        </div>
                                    </div>

                                      </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Add Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
     <script>
         CKEDITOR.replace( 'ckeditor' );
    </script>
           