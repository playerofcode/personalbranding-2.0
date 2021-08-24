<section class="hero bg-cover bg-position py-4" style="background: url(<?php echo base_url('assets/');?>img/hero-banner-3.jpg)">
      <div class="container py-5 index-forward text-white">
        <h1>Photos</h1>
        <!-- Breadcrumb-->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-none mb-0 p-0">
            <li class="breadcrumb-item pl-0"><a href="<?php echo base_url();?>"> <i class="fas fa-home mr-2"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Photos</li>
          </ol>
        </nav>
      </div>
    </section>
    <section class="py-5 shadow-sm index-forward">
      <div class="container py-5">
        <div class="row">
          <?php foreach ($images as $key): ?>
          <div class="col-lg-4">
           <div class="card m-2 shadow">
             <div class="card-body p-0">
             <img src="<?php echo base_url($key->photo);?>" width="100%" height="250px">
             </div>
           </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>
    </section>