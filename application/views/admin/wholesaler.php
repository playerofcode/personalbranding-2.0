<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Wholesaler</li>
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
                                                <th>S.No.</th>
                                                <th>Photo</th>
                                                <th>Store Name</th>
                                                <th>GSTIN</th>
                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <th>Pincode</th>
                                                <th>Address</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach($wholesalers as $key): ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><img src="<?php if(file_exists($key->photo)):echo  base_url($key->photo); endif;?>" style="height: 100px;width:100px;border:1px dashed orange;border-radius:10px;box-shadow:0 5px 10px rgba(0,0,0,0.4);"></td>
                                                <td><?php echo $key->store_name; ?></td>
                                                <td><?php echo $key->gstin; ?></td>
                                                <td><?php echo $key->name; ?></td>
                                                <td><?php echo $key->mobno; ?></td>
                                                <td><?php echo $key->email; ?></td>
                                                <td><?php echo $key->pincode; ?></td>
                                                <td><?php echo $key->address; ?></td>
                                                <td><?php echo $key->state; ?></td>
                                                <td><?php echo $key->city; ?></td>
                                                <td>
                                                    <a class="btn <?php if($key->status=='active'):echo 'btn-success';else:echo 'btn-danger';endif;?>" href="<?php echo base_url('admin/changeWholesalerAccountStatus/'.$key->id);?>"><?php echo $key->status;?></a>
                                                </td>
                                            </tr>  
                                            <?php $i++; endforeach; ?>
                                        </tbody> 
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        