<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Enquiry Reply</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>

                    <?php foreach ($enquiry as $key): ?>
                            <form class="form-horizontal"  action="<?php echo base_url('admin/add_reply/'.$key->id);?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Enquiry Reply</h4>
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email"class="form-control"  placeholder="Email" value="<?php echo $key->email;?>" required="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Message</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="message" class="form-control"  placeholder="Email" value="<?php echo $key->message;?>" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label col-form-label">Reply</label>
                                        <div class="col-sm-9">
                                            <textarea name="reply" cols="30" rows="10" class="form-control" placeholder="Write Here..." required=""></textarea>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
                            </form>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
           