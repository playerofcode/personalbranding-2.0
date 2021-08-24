<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile No</th>
                                                 <th>Address</th>
                                                <th>Created At</th>
                                                <th>Assign</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($users as $key): ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $key->name; ?></td>
                                                <td><?php echo $key->email; ?></td>
                                                <td><?php echo $key->mobno; ?></td>
                                                <td><?php echo $key->address; ?></td>
                                                <td><?php echo $key->created_at; ?></td>
                                                <td><a class="btn btn-success" href="<?php echo base_url('admin/assign/'.$key->id);?>">Assign</a></td>
                                            <?php $i++;endforeach ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        