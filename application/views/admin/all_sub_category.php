<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Sub Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Category ID</th>
                                                <th>Sub Category Name</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($sub_category as $key): ?>
                                              <tr>
                                                <td><?php echo $key->cat_id; ?></td>
                                                <td><?php echo $key->sub_cat_name; ?></td>
                                                <td><img src="<?php echo base_url($key->photo); ?>" style="height:100px;width:120px;box-shadow:0 5px 10px rgba(0,0,0,0.4);border-radius: 10px;border:1px dashed orange;"/></td>
                                                <td>
                                                    <a data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url('admin/edit_sub_category/'.$key->sub_cat_id);?>"><i class="fa fa-edit m-r-5 m-l-5 text-warning"></i></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Remove" onclick="return confirm('Are you sure?');" href="<?php echo base_url('admin/delete_sub_category/'.$key->sub_cat_id);?>"><i class="fa fa-trash m-r-5 m-l-5 text-danger"></i></a>
                                                </td>
                                            </tr>  
                                            <?php $i++;endforeach ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        