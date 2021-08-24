<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Sub Cell</li>
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
                            <?php foreach($subcell as $row): ?>
                            <form class="form-horizontal"  action="<?php echo base_url('admin/updateSubCell/'.$row->id);?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Sub Cell</h4>
                                    <div class="form-group row">
                                        <label for="cat_image" class="col-sm-3  control-label col-form-label">Cell</label>
                                        <div class="col-sm-9">
                                            <select name="cell_id" class="form-control" required="">
                                                <option value="" disabled="">Choose Cell</option>
                                                <?php foreach ($cell as $key): ?>
                                                <option value="<?php echo $key->id;?>" <?php if($row->id == $key->id)echo "selected";?>><?php echo $key->cell_name;?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Sub Cell Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="subcell_name"class="form-control"  value="<?php echo $row->subcell_name;?>"placeholder="Sub Cell Name Here" required="">
                                        </div>
                                    </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update Sub Cell</button>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           