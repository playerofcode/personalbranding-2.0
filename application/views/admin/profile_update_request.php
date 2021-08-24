<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Profile Request</li>
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
                                                <th>ID</th>
                                                <th>Store Name</th>
                                                <th>GSTIN</th>
                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <th>Pincode</th>
                                                <th>Address</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($distributor as $key): ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $key->name; ?></td>
                                                <td><?php echo $key->gstin; ?></td>
                                                <td><?php echo $key->name; ?></td>
                                                <td><?php echo $key->mobno; ?></td>
                                                <td><?php echo $key->email; ?></td>
                                                <td><?php echo $key->pincode; ?></td>
                                                <td><?php echo $key->address; ?></td>
                                                <td><?php echo $key->state; ?></td>
                                                <td><?php echo $key->city; ?></td>
                                                <td><a href="<?php echo base_url('admin/approveProfileChangeRequest/'.$key->id);?>" class="btn btn-primary">Approve</a></td>
                                            <?php $i++;endforeach ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        