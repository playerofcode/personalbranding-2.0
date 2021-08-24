<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Raise Ticket</li>
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
                                                <th>Ticket ID</th>
                                                <th>Distributor</th>
                                                <th>Query</th>
                                                <th>Reply</th>
                                                <th>Created At</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($ticket as $key): ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $key->id; ?></td>
                                                <td><?php echo $key->distributor; ?></td>
                                                <td><?php echo $key->query; ?></td>
                                                <td>
                                                    <?php 
                                                    if(!empty($key->reply)):echo $key->reply;else:
                                                     ?>
                                                    <a href="<?php echo base_url('admin/ticketReply/'.$key->id);?>">
                                                        Reply<i class="fa fa-reply m-r-5 m-l-5 text-danger"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo $key->created_at; ?></td>
                                                <td>
                                                    <a data-toggle="tooltip" data-placement="top" title="Remove" onclick="return confirm('Are you sure?');" href="<?php echo base_url('admin/deleteTicket/'.$key->id);?>"><i class="fa fa-trash m-r-5 m-l-5 text-danger"></i></a>
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
        