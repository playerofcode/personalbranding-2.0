<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Enquiry</li>
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
                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <!-- <th>Reply</th> -->
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($enquiry as $key): ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $key->name; ?></td>
                                                <td><?php echo $key->mobno; ?></td>
                                                <td><?php echo $key->email; ?></td>
                                                <td><?php echo $key->subject; ?></td>
                                                <td><?php echo $key->message; ?></td>
                                               <!--  <td>
                                                    <?php 
                                                    if(!empty($key->reply)):echo $key->reply;else:
                                                     ?>
                                                    <a href="<?php echo base_url('admin/reply/'.$key->id);?>">Reply</a>
                                                    <?php endif; ?>
                                                </td> -->
                                                <td>
                                                    <a data-toggle="tooltip" data-placement="top" title="Remove" onclick="return confirm('Are you sure?');" href="<?php echo base_url('admin/delete_enquiry/'.$key->id);?>"><i class="fa fa-trash m-r-5 m-l-5 text-danger"></i></a>
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
        