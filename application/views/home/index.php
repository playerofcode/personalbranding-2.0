
    <!-- Hero Slider -->
    <section>
      <div class="owl-carousel owl-theme-default hero-slider owl-nav-custom">
        <!-- Hero Slide-->
        <div class="hero-slide bg-size bg-center py-5" style="background: url(<?php echo base_url('assets/');?>img/hero-banner-1.jpg)">
          <!-- <div class="container text-white py-5 index-forward">
            <div class="row">
              <div class="col-lg-7">
                <h1>Choose right solution for your business</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                <ul class="list-inline">
                  <li class="list-inline-item"><a class="btn btn-primary" href="#">Read More</a></li>
                  <li class="list-inline-item"><a class="btn btn-outline-light" href="#">Our company</a></li>
                </ul>
              </div>
            </div>
          </div> -->
        </div>
        <!-- Hero Slide -->
        <div class="hero-slide bg-size bg-center py-5" style="background: url(<?php echo base_url('assets/');?>img/hero-banner-2.jpg)">
         <!--  <div class="container text-white py-5 index-forward">
            <div class="row">
              <div class="col-lg-7">
                <h1>We will help you to grow your business</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                <ul class="list-inline">
                  <li class="list-inline-item"><a class="btn btn-primary" href="#">Read More</a></li>
                  <li class="list-inline-item"><a class="btn btn-outline-light" href="#">Our company</a></li>
                </ul>
              </div>
            </div>
          </div> -->
        </div>
        <!-- Hero Slide -->
        <div class="hero-slide bg-size bg-center py-5" style="background: url(<?php echo base_url('assets/');?>img/hero-banner-3.jpg)">
          <!-- <div class="container text-white py-5 index-forward">
            <div class="row">
              <div class="col-lg-7">
                <h1>You always get the best guidance</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                <ul class="list-inline">
                  <li class="list-inline-item"><a class="btn btn-primary" href="#">Read More</a></li>
                  <li class="list-inline-item"><a class="btn btn-outline-light" href="#">Our company</a></li>
                </ul>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </section>
    <!-- Features Section -->
    <section class="py-5 bg-light">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1">
            <p class="h6 mb-1 text-uppercase text-primary mb-3">ABOUT</p>
            <h2 class="mb-4" id="print_name3"><?php  echo $name; ?></h2>
            <p class="text-small text-muted" id="print_short_bio1"><?php  echo $short_bio; ?></p>
            <!-- <ul class="list-check list-unstyled row px-3 mb-4">
              <li class="text-small text-muted col-lg-6 mb-2">Acquire live chat enables sales</li>
              <li class="text-small text-muted col-lg-6 mb-2">Learn from customer feedback</li>
              <li class="text-small text-muted col-lg-6 mb-2">Engage - marketing automation</li>
              <li class="text-small text-muted col-lg-6 mb-2">Support -customer support</li>
              <li class="text-small text-muted col-lg-6 mb-2">Acquire live chat enables sales</li>
              <li class="text-small text-muted col-lg-6 mb-2">Learn from customer feedback</li>
            </ul> -->
            <center><a href="<?php echo base_url('home/biography/');?>" class="btn btn-primary">View Bio</a></center>
           <!--  <ul class="list-inline py-4 border-top border-bottom d-flex align-items-center">
              <li class="list-inline-item pr-4 mr-0"><img src="<?php echo base_url('assets/'); ?>img/about-sign.png" alt="" width="80"></li>
              <li class="list-inline-item px-4 mr-0 border-left">
                <h5 class="mb-0">Jack Foxx</h5>
                <p class="small font-weight-normal text-muted mb-0">Chairnan and founder </p>
              </li>
              <li class="list-inline-item pl-4 border-left">
                <h5 class="mb-0">+420 754 6545 6564</h5>
                <p class="small font-weight-normal text-muted mb-0">Call to ask any question</p>
              </li>
            </ul> -->
          </div>
          <div class="col-lg-5 ml-auto mb-4 mb-lg-0 order-1 order-lg-2">
            <div class="p-2 border"><img class="img-fluid" src="<?php if(!empty($profile_picture)):echo $profile_picture;else:echo base_url('assets/img/about-img.jpg');endif;?>" alt=""></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Services Section -->
    <section class="py-5">
      <div class="container py-5 text-center">
        <div class="row align-items-stretch">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="px-4 py-5 border border-width-md border-dash h-100">
              <svg class="svg-icon mb-4 text-primary svg-icon-light svg-icon-big">
                <use xlink:href="#laptop-screen-1"> </use>
              </svg>
              <h3 class="h5"><a href="<?php echo base_url('home/speeches');?>">Speech</a></h3>
              <p class="text-small mb-0 text-muted"><span id="print_name4"><?php  echo $name; ?></span>'s Speech- Get all details about the latest speeches of Shri Rajnath Singh.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="px-4 py-5 border border-width-md border-dash h-100">
              <svg class="svg-icon mb-4 text-primary svg-icon-light svg-icon-big">
                <use xlink:href="#quality-1"> </use>
              </svg>
               <h3 class="h5"><a href="<?php echo base_url('home/photos');?>">Photos</a></h3>
              <p class="text-small mb-0 text-muted">Download Photos: Get real-time update of <?php  echo $name; ?>.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="px-4 py-5 border border-width-md border-dash h-100">
              <svg class="svg-icon mb-4 text-primary svg-icon-light svg-icon-big">
                <use xlink:href="#survey-1"> </use>
              </svg>
              <h3 class="h5"><a href="<?php echo base_url('home/videos');?>">Videos</a></h3>
              <p class="text-small mb-0 text-muted">Watch the latest update of <span id="print_name6"><?php  echo $name; ?></span> in the video section.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="px-4 py-5 border border-width-md border-dash h-100">
              <svg class="svg-icon mb-4 text-primary svg-icon-light svg-icon-big">
                <use xlink:href="#pie-chart-1"> </use>
              </svg>
             <h3 class="h5"><a href="#">Journey</a></h3>
              <p class="text-small mb-0 text-muted">In 1977, he was elected as an MLA in UP Assembly. In 1983, he became a State Secretary of UP BJP.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="px-4 py-5 border border-width-md border-dash h-100">
              <svg class="svg-icon mb-4 text-primary svg-icon-light svg-icon-big">
                <use xlink:href="#pay-1"> </use>
              </svg>
             <h3 class="h5"><a href="#">Interview</a></h3>
              <p class="text-small mb-0 text-muted">In this section, view <?php  echo $name; ?>'s latest media interview.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="px-4 py-5 border border-width-md border-dash h-100">
              <svg class="svg-icon mb-4 text-primary svg-icon-light svg-icon-big">
                <use xlink:href="#stack-1"> </use>
              </svg>
              <h3 class="h5"><a href="#">Achievement</a></h3>
              <p class="text-small mb-0 text-muted">As Education minister in 1992, he took initiative and got Anti Copy Act Passed.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Divider Section -->
    <section class="bg-cover bg-center" style="background: url(img/hero-banner-2.jpg)">
      <div class="primary-overlay py-5">
        <div class="overlay-content">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-7 text-center text-lg-left mb-4 mb-lg-0">
                <h2 class="text-white mb-2">You Always ready to help you.</h2>
                <p class="text-white mb-0">We believe that we can make some big toghter. Share your ideas with us fr better tomorrow.</p>
              </div>
              <div class="col-lg-3 ml-auto text-center text-lg-right"><a class="btn btn-outline-light" href="<?php echo base_url('home/contact');?>">Request a quote</a></div>
            </div>
          </div>
        </div>
      </div>
    </section>