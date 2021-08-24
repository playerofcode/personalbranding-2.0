        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">key List</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">key List</li>
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
                                <h5 class="card-title">All Media</h5>
                                 <?php if($responce = $this->session->flashdata('msg')): ?>
                     <div class="alert alert-warning"><?php echo $responce;?></div>
            <?php endif;?>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-success text-white">
                                                <th>Cat ID</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($media as $key):?>
                                           <tr>
                                                <td><?php echo $key->id?></td>
                                                <td><img src="<?php echo base_url().$key->image;?>" style="height:50px;width:50px;"/></td>
                                                <td><?php echo $key->title?></td>
                                                <td><?php echo $key->description?></td>  
                                                <td><a href="<?php echo base_url('admin/editkey/');?><?php echo $key->id; ?>">Edit</a></td>
                                                <td><a onclick="return confirm('Are you sure want to delete?');"href="<?php echo base_url('admin/deleteMedia/');?><?php echo $key->id; ?>">Delete</a></td>
                                           </tr>
                                           <?php endforeach;?>
                                        </tbody>
                                       <!--  <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot> -->
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
           