<section class="hero bg-cover bg-position py-4" style="background: url(<?php echo base_url('assets/');?>img/hero-banner-3.jpg)">
      <div class="container py-5 index-forward text-white">
        <h1>Contact Us</h1>
        <!-- Breadcrumb-->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-none mb-0 p-0">
            <li class="breadcrumb-item pl-0"><a href="<?php echo base_url();?>"> <i class="fas fa-home mr-2"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registration Form</li>
          </ol>
        </nav>
      </div>
    </section>
    <section class="py-5 shadow-sm index-forward">
      <div class="container py-5">
        <header>
          <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
        </header>
        <div class="row">
          <div class="col-lg-12 mb-5 mb-lg-0">
            <div class="pt-1 bg-primary">
              <div class="p-4 p-lg-5 bg-white shadow-sm">
                <form action="<?php echo base_url('home/authUser');?>" method="post">
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <input class="form-control" type="text" name="name" placeholder="Full name" required="">
                    </div>
                    <div class="form-group col-lg-12">
                      <input class="form-control" type="tel" name="mobno" placeholder="Mobile Number" required="">
                    </div>
                    <div class="form-group col-lg-12">
                      <input class="form-control" type="email" name="email" placeholder="Email address" required="">
                    </div>
                    <div class="form-group col-lg-12">
                      <textarea class="form-control" name="address" rows="3" placeholder="Full Address" required=""></textarea>
                    </div>
                    <div class="form-group col-lg-12">
                      <button class="btn btn-outline-primary" type="submit">Register</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>