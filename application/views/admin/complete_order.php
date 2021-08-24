<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer List</li>
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
                                                <th>Order ID</th>
                                                <th>Customer ID</th>
                                                <th>Customer Name</th>
                                                <th>Mobile No</th>
                                                 <th>Address</th>
                                                <th>Grand Total</th>
                                                <th>Order Status</th>
                                                <td>Details</td>
                                                <td>PDF</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($order as $key): ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $key->order_id; ?></td>
                                                <td><?php echo $key->customer_id; ?></td>
                                                <td><?php echo $key->customer_name; ?></td>
                                                <td><?php echo $key->mobno; ?></td>
                                                <td><?php echo $key->address; ?></td>
                                                <td><?php echo 'Rs '.$key->grand_total; ?></td>
                                                <td><span class=" badge badge-success"><?php echo $key->status; ?></span></td>
                                                <td><input type="button" class="view_data btn btn-info btn-sm" name="view" value="View" id="<?php echo $key->order_id; ?>"></td>
                                                <td><a href="<?php echo base_url('admin/order_item_info/'.$key->order_id);?>">Inovice</a></td>
                                            <?php $i++;endforeach ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        