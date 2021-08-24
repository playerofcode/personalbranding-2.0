<div class="page-wrapper">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Filter Sub Category</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('home/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Filter Sub Category</li>
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
       				<div class="card-header bg-success text-white">
       					Filter Sub Category
       				</div>
       				<div class="card-body">
					<div class="form-group">
						<label>Select Category</label>
						<select name="cat_id" id="get_sub_cat" class="form-control">
							<option>Salect Category</option>
							<?php foreach ($category as $key): ?>
								<option value="<?php echo $key->cat_id;?>"><?php echo $key->cat_name; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<span id="filter_sub_cat_message" class="text-success"></span>
					<div id="display_filter_sub_cat">

					</div>

       				</div>
       			</div>
       			</div>
       		</div>
       		</div>
</div>