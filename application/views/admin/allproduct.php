<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Products</li>
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
                                                <th>Product ID</th>
                                                <!--<th>Category ID</th>
                                                <th>Sub Category ID</th>
                                                <th>Product Category ID</th>-->
                                                <th>Distributor/Self</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Original Price</th>
                                                <th>Discount Price</th>
                                                <th>Wholesale Price</th>
                                                <th>Offer</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($product as $key): ?>
                                              <tr>
                                                <td><?php echo $key->p_id; ?></td>
                                                <!--<td><?php echo $key->cat_id; ?></td>
                                                <td><?php echo $key->sub_cat_id; ?></td>
                                                <td><?php echo $key->p_cat_id; ?></td>-->
                                                <td><?php echo $key->distributor; ?></td>
                                                <td><?php echo $key->p_name; ?></td>
                                                <td><?php echo $key->p_qty.' '.$key->p_unit; ?></td>
                                                <td><?php echo $key->m_price; ?></td>
                                                <td><?php echo $key->d_price; ?></td>
                                                <td><?php echo $key->h_price; ?></td>
                                                <td><?php echo $key->offer.'%'; ?></td>
                                                <td><a href="<?php echo base_url('admin/change_product_status/'.$key->p_id);?>" class="badge badge-pill <?php
                                                 if($key->status=='1')
                                                 {echo 'badge-success';}
                                                 else
                                                 {echo 'badge-danger';}
                                                 ?>"><?php if($key->status=='1'){echo 'active';}else{echo 'deactive';};?></a></td>
                                                <td>
                                                    <a data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url('admin/edit_product/'.$key->p_id);?>"><i class="fa fa-edit m-r-5 m-l-5 text-warning"></i></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Remove" onclick="return confirm('Are you sure?');" href="<?php echo base_url('admin/delete_product/'.$key->p_id);?>"><i class="fa fa-trash m-r-5 m-l-5 text-danger"></i></a>
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
        