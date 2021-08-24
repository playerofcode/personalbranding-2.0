    <section class="hero bg-cover bg-position py-4" style="background: url(<?php echo base_url('assets/');?>img/hero-banner-1.jpg)">
      <div class="container py-5 index-forward text-white">
        <h1>Biography</h1>
        <!-- Breadcrumb-->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-none mb-0 p-0">
            <li class="breadcrumb-item pl-0"><a href="<?php echo base_url();?>"> <i class="fas fa-home mr-2"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Biography</li>
          </ol>
        </nav>
      </div>
    </section>
    <section class="py-5">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="p-2 border"><img class="img-fluid" src="<?php if(!empty($profile_picture)):echo base_url($profile_picture);else:echo base_url('assets/img/about-img.jpg');endif;?>" alt=""></div>
          </div>
          <div class="col-lg-6">
            <p class="h6 mb-1 text-uppercase text-primary mb-3">Biography</p>
            <h2 class="mb-4" id="print_name7"><?php   echo $name; ?></h2>
        <!--     <p class="text-small text-muted" id="print_short_bio2"></p> -->
        <p id="print_short_bio3"><?php  echo $short_bio; ?></p>

            <!-- <ul class="list-check list-unstyled row px-3 mb-4">
              <li class="text-small text-muted col-lg-6 mb-2">Acquire live chat enables sales</li>
              <li class="text-small text-muted col-lg-6 mb-2">Learn from customer feedback</li>
              <li class="text-small text-muted col-lg-6 mb-2">Engage - marketing automation</li>
              <li class="text-small text-muted col-lg-6 mb-2">Support -customer support</li>
              <li class="text-small text-muted col-lg-6 mb-2">Acquire live chat enables sales</li>
              <li class="text-small text-muted col-lg-6 mb-2">Learn from customer feedback</li>
            </ul> -->
           <!--  <ul class="list-inline py-4 border-top border-bottom d-flex align-items-center">
              <li class="list-inline-item pr-4 mr-0"><img src="img/about-sign.png" alt="" width="80"></li>
              <li class="list-inline-item px-4 mr-0 border-left">
                <h5 class="mb-0">Jhon Martin</h5>
                <p class="small font-weight-normal text-muted mb-0">Chairnan and founder </p>
              </li>
              <li class="list-inline-item pl-4 border-left">
                <h5 class="mb-0" id="print_number5"></h5>
                <p class="small font-weight-normal text-muted mb-0">Call to ask any question</p>
              </li>
            </ul> -->
          </div>
        </div>
      </div>
    </section>
    <section class="py-5 bg-light">
      <div class="container py-5">
        <header class="mb-5 text-center">
          <div class="row">
            <div class="col-lg-7 mx-auto">
              <p class="h6 text-uppercase text-primary">Reliable &amp; Trustworthy</p>
              <h2>We're looking for specific approach to each cases</h2>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
            </div>
          </div>
        </header>
        <div class="row align-items-stretch">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="bg-white h-100">
              <div class="bg-primary px-4 py-3 d-inline-block">
                <svg class="svg-icon text-white">
                  <use xlink:href="#arrow-target-1"> </use>
                </svg>
              </div>
              <div class="px-5 pt-0 pb-5 bg-white text-center">
                <h2 class="h4 mb-3">Our mission</h2>
                <p class="text-muted text-small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, nobis aliquid iusto quibusdam, neque obcaecati delectus. Aliquid veritatis, quo, dignissimos quam magni debitis, minima blanditiis pariatur quae molestiae cumque amet?</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="bg-white h-100">
              <div class="bg-primary px-4 py-3 d-inline-block">
                <svg class="svg-icon text-white">
                  <use xlink:href="#stack-1"> </use>
                </svg>
              </div>
              <div class="px-5 pt-0 pb-5 bg-white text-center">
                <h2 class="h4 mb-3">Our vision</h2>
                <p class="text-muted text-small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis fuga amet necessitatibus. At enim ipsa amet quae autem tempora voluptates, fugit dolorem cum, non praesentium sed neque, hic quasi voluptas?</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="bg-white h-100">
              <div class="bg-primary px-4 py-3 d-inline-block">
                <svg class="svg-icon text-white">
                  <use xlink:href="#sales-up-1"> </use>
                </svg>
              </div>
              <div class="px-5 pt-0 pb-5 bg-white text-center">
                <h2 class="h4 mb-3">Our strategies</h2>
                <p class="text-muted text-small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem aperiam, vitae sit voluptatibus, sunt dolore esse. Eaque ullam, delectus illum earum et non quasi commodi in obcaecati qui mollitia a.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>