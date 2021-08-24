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
                            <form class="form-horizontal"  action="<?php echo base_url('admin/update_product');?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Add Product</h4>
                                    <?php foreach ($product_info as $res): ?>
                                        <input type="hidden" name="p_id" value="<?php echo $res->p_id;?>">
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <select name="cat_id" id="cat_id" class="form-control">
                                                <?php foreach ($category as $key): ?>
                                                    <option value="<?php echo $key->cat_id; ?>" <?php if($res->cat_id ==$key->cat_id){echo 'selected';}?>><?php echo $key->cat_name;?></option>
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
                                                <?php foreach($sub_category as $key): ?>
                                                <option value="<?php echo $key->sub_cat_id;?>" <?php if($res->sub_cat_id == $key->sub_cat_id){echo "selected";}?>><?php echo $key->sub_cat_name; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Choose Product Category</label>
                                        <div class="col-sm-9">
                                            <select name="p_cat_id" id="p_cat_id" class="form-control" required="">
                                                <option value="" disabled="" selected="">Choose Product Category</option>
                                                <?php foreach ($product_category as $keyy): ?>
                                                    <option value="<?php echo $keyy->p_cat_id;?>" <?php if($res->p_cat_id == $keyy->p_cat_id){echo "selected";}?>><?php echo $keyy->p_cat_name; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3  control-label col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="p_name"class="form-control" value="<?php echo set_value('p_name',$res->p_name); ?>" placeholder="Product Name Here">
                                            <?php echo form_error('p_name'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3  control-label col-form-label">Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="tel" name="p_qty"class="form-control" value="<?php echo set_value('p_qty',$res->p_qty); ?>" placeholder="Product Quantity Here">
                                            <?php echo form_error('p_qty'); ?>
                                        </div>
                                    </div>
                              
                                 <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Unit</label>
                                        <div class="col-sm-9">
                                            <select name="p_unit" id="" class="form-control">
                                                <option selected="" disabled="">Choose Unit</option>
                                                <option value="kg" <?php echo  set_select('p_unit', 'kg'); ?><?php if($res->p_unit =='kg'){echo 'selected';} ?>>kg</option>
                                                <option value="gm" <?php echo  set_select('p_unit', 'gm'); ?>
                                                <?php if($res->p_unit =='gm'){echo 'selected';} ?>>gm</option>
                                                <option value="ltr" <?php echo  set_select('p_unit', 'ltr'); ?> <?php if($res->p_unit =='ltr'){echo 'selected';} ?>>ltr</option>
                                                <option value="ml" <?php echo  set_select('p_unit', 'ml'); ?>
                                                <?php if($res->p_unit =='ml'){echo 'selected';} ?>>ml</option>
                                                <option value="piece" <?php echo  set_select('p_unit', 'piece'); ?>
                                                <?php if($res->p_unit =='piece'){echo 'selected';} ?>>piece</option>
                                            </select>
                                            <?php echo form_error('p_unit'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3  control-label col-form-label">Original Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="1" name="m_price"class="form-control" value="<?php echo set_value('m_price',$res->m_price); ?>" placeholder="Original Price Here">
                                            <?php echo form_error('m_price'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3  control-label col-form-label">Discount Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="1" name="d_price"class="form-control" value="<?php echo set_value('d_price',$res->d_price); ?>" placeholder="Discount Price Here">
                                            <?php echo form_error('d_price'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3  control-label col-form-label">Wholesale Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="1" name="h_price"class="form-control" value="<?php echo set_value('h_price',$res->h_price); ?>" placeholder="Wholesale Price Here">
                                            <?php echo form_error('h_price'); ?>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Availability</label>
                                        <div class="col-sm-9">
                                            <select name="availability" id="" class="form-control">
                                                <option value="yes" <?php if($res->availability =='yes'){echo 'selected';} ?>>yes</option>
                                                <option value="no" <?php if($res->availability =='no'){echo 'selected';} ?>>no</option>
                                            </select>
                                            <?php echo form_error('availability'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select name="status" id="" class="form-control">
                                                <option value="1" <?php if($res->status ==1){echo 'selected';} ?>>active</option>
                                                <option value="0" <?php if($res->status ==0){echo 'selected';} ?>>deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="p_description" id="ckeditor" cols="30" rows="10" class="form-control" style="resize: none;"><?php echo set_value('p_description',$res->p_description); ?></textarea>
                                            <?php echo form_error('p_description'); ?>
                                        </div>
                                    </div>
                                    <?php
                                        if(!empty($res->p_img1))
                                        {
                                            echo "<center><img src=".base_url().$res->p_img1." style='height:100px;width:100px;border:1px solid blue;border-radius:5px;margin:5px;'></center>";
                                        }
                                        ?>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 1</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img1" class="form-control" >
                                            <?php if(isset($upload_error)){echo $upload_error;}; ?>
                                        </div>
                                    </div>
                                        <?php
                                        if(!empty($res->p_img2))
                                        {
                                            echo "<center><img src=".base_url().$res->p_img2." style='height:100px;width:100px;border:1px solid blue;border-radius:5px;margin:5px;'></center>";
                                        }
                                        else
                                        {
                                            echo "<center style='margin:5px;color:red;'>Product Image 2 not uploaded</center>";
                                        }
                                        ?>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 2</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img2" class="form-control">
                                        </div>
                                    </div>
                                        <?php
                                        if(!empty($res->p_img3))
                                        {
                                            echo "<center><img src=".base_url().$res->p_img3." style='height:100px;width:100px;border:1px solid blue;border-radius:5px;margin:5px;'></center>";
                                        }
                                        else
                                        {
                                            echo "<center style='margin:5px;color:red;'>Product Image 3 not uploaded</center>";
                                        }
                                        ?> 
                                     <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 3</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img3" class="form-control">
                                        </div>
                                    </div>
                                    <?php
                                        if(!empty($res->p_img4))
                                        {
                                            echo "<center><img src=".base_url().$res->p_img4." style='height:100px;width:100px;border:1px solid blue;border-radius:5px;margin:5px;'></center>";
                                        }
                                        else
                                        {
                                            echo "<center style='margin:5px;color:red;'>Product Image 4 not uploaded</center>";
                                        }
                                        ?>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 4</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img4" class="form-control">
                                        </div>
                                    </div>
                                    <?php
                                        if(!empty($res->p_img5))
                                        {
                                            echo "<center><img src=".base_url().$res->p_img5." style='height:100px;width:100px;border:1px solid blue;border-radius:5px;margin:5px;'></center>";
                                        }
                                        else
                                        {
                                            echo "<center style='margin:5px;color:red;'>Product Image 5 not uploaded</center>";
                                        }
                                        ?>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 5</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img5" class="form-control">
                                        </div>
                                    </div>
                                     <?php
                                        if(!empty($res->p_img6))
                                        {
                                            echo "<center><img src=".base_url().$res->p_img6." style='height:100px;width:100px;border:1px solid blue;border-radius:5px;margin:5px;'></center>";
                                        }
                                        else
                                        {
                                            echo "<center style='margin:5px;color:red;'>Product Image 6 not uploaded</center>";
                                        }
                                        ?>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 6</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img6" class="form-control">
                                        </div>
                                    </div>
                                    <?php
                                        if(!empty($res->p_img7))
                                        {
                                            echo "<center><img src=".base_url().$res->p_img7." style='height:100px;width:100px;border:1px solid blue;border-radius:5px;margin:5px;'></center>";
                                        }
                                        else
                                        {
                                            echo "<center style='margin:5px;color:red;'>Product Image 7 not uploaded</center>";
                                        }
                                        ?>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 7</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img7" class="form-control">
                                        </div>
                                    </div>
                                    <?php
                                        if(!empty($res->p_img8))
                                        {
                                            echo "<center><img src=".base_url().$res->p_img8." style='height:100px;width:100px;border:1px solid blue;border-radius:5px;margin:5px;'></center>";
                                        }
                                        else
                                        {
                                            echo "<center style='margin:5px;color:red;'>Product Image 8 not uploaded</center>";
                                        }
                                        ?>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Product Image 8</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="p_img8" class="form-control">
                                        </div>
                                    </div>
                                      </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                    </div>
                                    <?php endforeach ?>
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
           