<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sub Cell List</li>
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
                            <div class="card-header">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+ Add Sub Cell</button>
                            </div>
                            <div class="card-body">
                                <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Cell ID</th>
                                                <th>Sub Cell Name</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($subcell as $key): ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $key->cell_id; ?></td>
                                                <td><?php echo $key->subcell_name; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/editSubCell/'.$key->id);?>" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/deleteSubCell/'.$key->id);?>" class="btn btn-success">Delete</a>
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
            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Cell</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('admin/addSubCell');?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <label>Select Cell</label>
            <select name="cell_id" class="form-control">
                <?php foreach ($cell as $key): ?>
                    <option value="<?php echo $key->id?>"><?php echo $key->cell_name;?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label>Sub Cell Name</label>
            <input type="text" name="subcell_name" class="form-control" placeholder="Sub Cell Name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Sub Cell</button>
      </div>
      </form>
    </div>
  </div>
</div>
        