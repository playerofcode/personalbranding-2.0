<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Delivery Partner List</li>
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
                                                <!-- <th>Distributor</th> -->
                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <th>Pin Code</th>
                                                <th>Address</th>
                                                <th>Password</th>
                                                <th>Photo</th>
                                                <th>Adhar</th>
                                                <th>Joining Datetime</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($delivery_list as $key): ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <!-- <td><span class="badge badge-success badge-pill px-2 py-1"><?php echo $key->distributor; ?></span></td> -->
                                                <td><?php echo $key->name; ?></td>
                                                <td><?php echo $key->mobno; ?></td>
                                                <td><?php echo $key->email; ?></td>
                                                <td><?php echo $key->pincode; ?></td>
                                                <td><?php echo $key->address; ?></td>
                                                <td><?php echo $key->password; ?></td>
                                                <td><a href="<?php echo base_url().$key->photo; ?>" target="_blank"><?php if(!empty($key->photo)):?>View <?php else: echo 'not found';endif; ?></a></td>
                                                 <td><a href="<?php echo base_url().$key->adhar; ?>" target="_blank"><?php if(!empty($key->adhar)):?>View <?php else: echo 'not found';endif; ?></a></td>
                                                <td><?php echo $key->date; ?></td>
                                            <?php $i++;endforeach ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        