<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Distributor List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
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
                                                <th>Firm Name</th>
                                                <th>GSTIN</th>
                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <th>Pin Code</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Address</th>
                                                <th>Password</th>
                                                <th>Joining Datetime</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($distributor_list as $key): ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="badge badge-success badge-pill px-2 py-1"><?php echo $key->store_name; ?></span></td>
                                                <td><?php echo $key->gstin; ?></td>
                                                <td><?php echo $key->name; ?></td>
                                                <td><?php echo $key->mobno; ?></td>
                                                <td><?php echo $key->email; ?></td>
                                                <td><?php echo $key->pincode; ?></td>
                                                <td><?php echo $key->state; ?></td>
                                                <td><?php echo $key->city; ?></td>
                                                <td><?php echo $key->address; ?></td>
                                                <td><?php echo $key->password; ?></td>
                                                <td><?php echo $key->date; ?></td>
                                                <td>
                                                    <form action="<?php echo base_url('admin/change_distributor_status');?>" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $key->id;?>">
                                                        <input type="hidden" name="status" value="<?php echo $key->status; ?>">
                                                        <button type="submit" class="btn btn-sm
                                                        <?php 
                                                        if($key->status=='active')
                                                        {
                                                            echo 'btn-success';
                                                        }
                                                        else
                                                        {
                                                            echo 'btn-danger';
                                                        }

                                                        ?>
                                                        "><?php echo $key->status; ?></button>
                                                    </form>
                                                </td>
                                            <?php $i++;endforeach ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        