<section class="hero bg-cover bg-position py-4" style="background: url(<?php echo base_url('assets/');?>img/hero-banner-3.jpg)">
      <div class="container py-5 index-forward text-white">
        <h1>Contact Us</h1>
        <!-- Breadcrumb-->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-none mb-0 p-0">
            <li class="breadcrumb-item pl-0"><a href="<?php echo base_url();?>"> <i class="fas fa-home mr-2"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact us</li>
          </ol>
        </nav>
      </div>
    </section>
    <section class="py-5 shadow-sm index-forward">
      <div class="container py-5">
        <header>
          <h2>Request a <span class="text-primary">Call </span>Back</h2>
          <p class="mb-5 text-muted">Nanotechnology immersion along the information highway will close the loop on focusing</p>
          <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
        </header>
        <div class="row">
          <div class="col-lg-7 mb-5 mb-lg-0">
            <div class="pt-1 bg-primary">
              <div class="p-4 p-lg-5 bg-white shadow-sm">
                <form action="<?php echo base_url('home/getEnquiry');?>" method="post">
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <input class="form-control" type="text" name="fname" placeholder="First name" required="">
                    </div>
                    <div class="form-group col-lg-6">
                      <input class="form-control" type="text" name="lname" placeholder="Last name" required="">
                    </div>
                    <div class="form-group col-lg-6">
                      <input class="form-control" type="tel" name="mobno" placeholder="Phone number" required="">
                    </div>
                    <div class="form-group col-lg-6">
                      <input class="form-control" type="text" name="subject" placeholder="Subject" required="">
                    </div>
                    <div class="form-group col-lg-12">
                      <input class="form-control" type="email" name="email" placeholder="Email address" required="">
                    </div>
                    <div class="form-group col-lg-12">
                      <textarea class="form-control" name="message" rows="5" placeholder="Leave your message" required=""></textarea>
                    </div>
                    <div class="form-group col-lg-12">
                      <button class="btn btn-outline-primary" type="submit">Submit now</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <h3>Have a quesion?</h3>
            <p class="text-muted mb-5">If you got any questions please do not hesitate to send us a message.</p>
            <ul class="list-unstyled">
              <li class="d-flex mb-3">
                <div class="icon bg-primary"><i class="fas fa-map-marker-alt text-white fa-fw"></i></div>
                <div class="ml-3">
                  <h5 class="mb-0">Address</h5>
                  <p class="text-muted text-small" id="print_address3"><?php  echo $address; ?></p>
                </div>
              </li>
              <li class="d-flex mb-3">
                <div class="icon bg-primary"><i class="fas fa-envelope text-white fa-fw"></i></div>
                <div class="ml-3">
                  <h5 class="mb-0">Email</h5>
                  <p class="text-muted text-small" id="print_email3"><?php  echo $email; ?></p>
                </div>
              </li>
              <li class="d-flex mb-3">
                <div class="icon bg-primary"><i class="fas fa-mobile text-white fa-fw"></i></div>
                <div class="ml-3">
                  <h5 class="mb-0">Phone</h5>
                  <p class="text-muted text-small" id="print_number3"><?php   echo $mobno; ?></p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>