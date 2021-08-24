<footer class="bg-dark">
      <div class="bg-dark py-5 text-white">
        <div class="container">
          <div class="row py-5">
            <div class="col-lg-4 col-md-6">

              <!--<img class="mb-4" src="<?php echo base_url('assets/');?>img/logo-white.svg" alt="" width="200"> -->
              <p class="text-muted text-small mb-4" id="print_short_bio2"><?php  echo $short_bio; ?></p>
              <p class="mb-1"><i class="fas fa-envelope mr-3 text-primary fa-fw"></i><span class="text-small text-muted"><?php echo $email; ?></span></p>
              <p class="mb-1"><i class="fas fa-mobile mr-3 text-primary fa-fw"></i><span class="text-small text-muted" id="print_number2"><?php echo $mobno; ?></p>
              <p class="mb-1"><i class="fas fa-map-marker-alt mr-3 text-primary fa-fw"></i><span class="text-small text-muted" id="print_address2"><?php echo $address; ?></span></p>
            </div>
            <div class="col-lg-2 col-md-6">
              <h5 class="mt-3 mb-4 font-weight-normal">Quick links</h5>
              <ul class="list-unstyled">
                <li class="mb-2"><a class="footer-link" href="<?php echo base_url(); ?>">Home</a></li>
                <li class="mb-2"><a class="footer-link" href="<?php echo base_url('home/about'); ?>">About</a></li>
                <li class="mb-2"><a class="footer-link" href="#">Services</a></li>
                <li class="mb-2"><a class="footer-link" href="#">Contacts</a></li>
                <li class="mb-2"><a class="footer-link" href="#">Pages</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-6">
              <h5 class="mt-3 mb-4 font-weight-normal">Our services</h5>
              <ul class="list-unstyled">
                <li class="mb-2"><a class="footer-link" href="#">Make Appointment</a></li>
                <li class="mb-2"><a class="footer-link" href="#">Customer Services</a></li>
                <li class="mb-2"><a class="footer-link" href="#">Department Service</a></li>
                <li class="mb-2"><a class="footer-link" href="#">Our Case Studies</a></li>
                <li class="mb-2"><a class="footer-link" href="#">Free Consultation</a></li>
                <li class="mb-2"><a class="footer-link" href="#">Meet Our Experts</a></li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-6">
              <h5 class="mt-3 mb-4 font-weight-normal">Social Media</h5>
              <!-- <ul class="list-unstyled mb-0">
                <li class="d-flex mb-4">
                  <div class="pr-2"><img src="<?php echo base_url('assets/'); ?>img/blog-thumb-1.jpg" alt="" width="60"></div>
                  <div class="ml-3">
                    <p class="small text-muted mb-0">May 01, 2019 </p>
                    <h6 class="text-light font-weight-normal mb-0">Successful Growth In Business 2018</h6><a class="reset-anchor text-primary text-small" href="#">Read more<i class="fas fa-angle-right ml-2"></i></a>
                  </div>
                </li>
                <li class="d-flex">
                  <div class="pr-2"><img src="<?php echo base_url('assets/'); ?>img/blog-thumb-2.jpg" alt="" width="60"></div>
                  <div class="ml-3">
                    <p class="small text-muted mb-0">May 01, 2019 </p>
                    <h6 class="text-light font-weight-normal mb-0">Successful Growth In Business 2018</h6><a class="reset-anchor text-primary text-small" href="#">Read more<i class="fas fa-angle-right ml-2"></i></a>
                  </div>
                </li>
              </ul> -->
            </div>
          </div>
        </div>
      </div>
      <div class="bg-darker py-4">
        <div class="container text-center">
          <p class="mb-0 text-muted text-small">&copy; All rights reserved.Developed by <a href="#">CMJKPYYA</a>. </p>
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="<?php echo base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/');?>vendor/owl.carousel2/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assets/');?>vendor/modal-video/js/modal-video.js"></script>
    <script src="<?php echo base_url('assets/');?>vendor/leaflet/leaflet.js"></script>
    <script src="<?php echo base_url('assets/');?>js/front.js"></script>
    <script type="text/javascript" defer>
      // var print_name1=document.getElementById('print_name1');
      // var print_name2=document.getElementById('print_name2');
      // var print_name3=document.getElementById('print_name3');
      // var print_name4=document.getElementById('print_name4');
      // var print_name5=document.getElementById('print_name5');
      // var print_name6=document.getElementById('print_name6');
      // var print_name7=document.getElementById('print_name7');
      // const getName = () => {
      //   $.ajax({
      //      url:"<?php echo base_url('home/getName');?>",
      //       method:"GET",
      //       success:function(data)
      //       {
      //         if(data !='')
      //         {
      //         print_name1.innerHTML=data;
      //         print_name2.innerHTML=data;
      //         print_name3.innerHTML=data;
      //         print_name4.innerHTML=data;
      //         print_name5.innerHTML=data;
      //         print_name6.innerHTML=data;
      //         print_name7.innerHTML=data;
      //         }
      //       }
      //   });
      // }
      // getName();
      // var print_address1=document.getElementById('print_address1');
      // var print_address2=document.getElementById('print_address2');
      // var print_address3=document.getElementById('print_address3');
      // const getAddress = () =>{
      //   $.ajax({
      //     url:"<?php echo base_url('home/getAddress');?>",
      //       method:"GET",
      //       success:function(data)
      //       {
      //         if(data !='')
      //         {
      //         print_address1.innerHTML=data;
      //         print_address2.innerHTML=data;
      //         print_address3.innerHTML=data;
      //         }
      //       }
      //   });
      // }
      // getAddress();
      // var print_number1=document.getElementById('print_number1');
      // var print_number2=document.getElementById('print_number2');
      // var print_number3=document.getElementById('print_number3');
      // var print_number4=document.getElementById('print_number4');
      // var print_number5=document.getElementById('print_number5');
      // const getNumber = () =>{
      //    $.ajax({
      //     url:"<?php echo base_url('home/getNumber');?>",
      //       method:"GET",
      //       success:function(data)
      //       {
      //         if(data !='')
      //         {
      //         print_number1.innerHTML=data;
      //         print_number2.innerHTML=data;
      //         print_number3.innerHTML=data;
      //         print_number4.innerHTML=data;
      //         print_number5.innerHTML=data;
      //         }
      //       }
      //     });
      // }
      // getNumber();
      // var print_email1=document.getElementById('print_email1');
      // var print_email2=document.getElementById('print_email2');
      // var print_email3=document.getElementById('print_email3');
      // const getEmail = () =>{
      //   $.ajax({
      //     url:"<?php echo base_url('home/getEmail');?>",
      //       method:"GET",
      //       success:function(data)
      //       {
      //       if(data !='')
      //       { 
      //       print_email1.innerHTML=data;
      //       print_email2.innerHTML=data;
      //       print_email3.innerHTML=data;
      //       }
      //       }
      //   });
      // }
      // getEmail();
      // var print_short_bio1=document.getElementById('print_short_bio1');
      // var print_short_bio2=document.getElementById('print_short_bio2');
      // var print_short_bio3=document.getElementById('print_short_bio3');
      // const getShortBio = () =>{
      //   $.ajax({
      //     url:"<?php echo base_url('home/getShortBio');?>",
      //       method:"GET",
      //       success:function(data)
      //       {
      //       if(data !='')
      //       {
      //         print_short_bio1.innerHTML=data;
      //         print_short_bio2.innerHTML=data;
      //         print_short_bio3.innerHTML=data;
      //       }
      //       }
      //     });
      // }
      // getShortBio();
    </script>
    <script>
     
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>