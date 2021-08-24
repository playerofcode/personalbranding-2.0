<div class="page-wrapper">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Update User Info</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update User Info</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
       		</div>
       		<div class="container-fluid">
       			<div class="row wizard-content">
       				<div class="col-sm-12">
       					 <?php if($responce = $this->session->flashdata('msg')): ?>
                     <div class="alert alert-warning"><?php echo $responce;?></div>
            <?php endif;?>
       			<div class="card ">
       				<div class="card-header bg-primary text-white">
       					Update User Info
       				</div>
       				<div class="card-body">
       					<?php foreach ($user_info as $key):?>
          <form action="<?php echo base_url('admin/updateUserInfo/'.$key->id);?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo set_value('name',$key->name); ?>" placeholder="Enter Name">
            <?php echo form_error('name');?>
          </div>
          <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" name="mobno" class="form-control" value="<?php echo set_value('mobno',$key->mobno); ?>" placeholder="Enter Mobile Number">
            <?php echo form_error('mobno');?>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo set_value('email',$key->email); ?>" placeholder="Enter Email">
            <?php echo form_error('email');?>
          </div>   
           <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo set_value('address',$key->address); ?>" placeholder="Enter Address">
            <?php echo form_error('address');?>
          </div>    
          <div class="form-group">
            <label>Image</label><br>
            <center><img src="<?php echo base_url($key->photo); ?>" alt="Image not updated yet" style="height: 100px;width:100px;border:1px dashed orange;border-radius: 10px;margin:5px;box-shadow: 0 5px 10px rgba(0,0,0,0.3);"></center>
            <input type="file" name="photo" class="form-control" >
            <?php if(isset($upload_error)){echo $upload_error; } ?>
          </div>
          <div class="form-group">
            <label>Short Bio</label>
            <textarea name="short_bio" cols="30" rows="5" class="form-control" placeholder="Enter Short Bio"><?php echo set_value('short_bio',$key->short_bio); ?></textarea>
            <?php echo form_error('short_bio');?>
          </div>
          <div class="form-group">
            <input type="submit"  class="btn btn-primary" value="Update Profile">
          </div>
        </form>
      <?php endforeach;?>
       				</div>
       			</div>
       			</div>
       		</div>
       		</div>
</div>