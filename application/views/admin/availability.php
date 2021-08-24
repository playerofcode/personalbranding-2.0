<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Availability</li>
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
                                                <th>S.No.</th>
                                                <th>Area Name</th>
                                                <th>Pin Code</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($availability as $key): ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $key->area_name; ?></td>
                                                <td><?php echo $key->pin_code; ?></td>
                                                <td><a href="" class="badge badge-pill <?php
                                                 if($key->status=='1')
                                                 {echo 'badge-success';}
                                                 else
                                                 {echo 'badge-danger';}
                                                 ?>"><?php if($key->status=='1'){echo 'active';}else{echo 'deactive';};?></a></td>
                                                <td>
                                                    <a data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url('admin/edit_product/'.$key->id);?>"><i class="fa fa-edit m-r-5 m-l-5 text-warning"></i></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Remove" onclick="return confirm('Are you sure?');" href="<?php echo base_url('admin/delete_product/'.$key->id);?>"><i class="fa fa-trash m-r-5 m-l-5 text-danger"></i></a>
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
        