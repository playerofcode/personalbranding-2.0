<section class="hero bg-cover bg-position py-4" style="background: url(<?php echo base_url('assets/');?>img/hero-banner-3.jpg)">
      <div class="container py-5 index-forward text-white">
        <h1>Speeches</h1>
        <!-- Breadcrumb-->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-none mb-0 p-0">
            <li class="breadcrumb-item pl-0"><a href="<?php echo base_url();?>"> <i class="fas fa-home mr-2"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Speeches</li>
          </ol>
        </nav>
      </div>
    </section>
    <section class="py-5 shadow-sm index-forward">
      <div class="container py-5">
        <!-- <header>
          <h2>Request a <span class="text-primary">Call </span>Back</h2>
          <p class="mb-5 text-muted">Nanotechnology immersion along the information highway will close the loop on focusing</p>
        </header> -->
        <div class="row">
          <?php foreach ($speeches as $key): ?>
          <div class="col-lg-4">
           <div class="card">
             <div class="card-body p-0">
               <iframe width="100%" height="auto" src="<?php echo $key->link;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>
             <div class="card-footer bg-primary text-white">
              <?php echo $key->title;?>
             </div>
           </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>
    </section>