@extends('home_index.header')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-7.jpg">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Software &amp; Website Development <span></span></h2>
            <h5><p class="animate__animated animate__fadeInUp" style="color: yellow;font-style: italic;">We are the best software company in Ranchi with a dedicated team to deliver Softwares and Websites in Drupal. Drupal 9.1 is Here : Are you ready to upgrade ?
            listen to what our clients have to say.Maximize Customer Revenue with NextGeeks</p>
            <p style="font-weight: bold;"><?php echo date("l jS \ F Y h:i:s A") ;?></p></h5>
            <a href="##" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item" style="background-image: url(assets/img/slide/slide-4.jpg)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Software &amp;   Android Mobile Apps<!-- <span></span> --></h2>
            <h2 class="animate__animated animate__fadeInDown"> & Website Development</h2>
            <h5><p class="animate__animated animate__fadeInUp" style="color: yellow;font-style: italic;">We are the best software company in Ranchi with a dedicated team to deliver Softwares and Websites.We Create Real Impact For Those Who Partner With Us</p>
            
            <p class="animate__animated animate__fadeInUp" style="color: yellow;">Publish Your Mobile Applications on Google's Play Store &amp; Apple's App Store Through NextGeeks Software.</p>
            <p style="font-weight: bold;"><?php echo date("l jS \ F Y h:i:s A") ;?></p></h5>
            <a href="##" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Live Project Training | <!-- Industrial Training  | --> Internship Programs</h2>
            <h5><p class="animate__animated animate__fadeInUp" style="color: yellow;font-style: italic;">NextGeeks Software Services offers Training Programs for IT Students &amp; Professionals</p>
            <p style="font-weight: bold;"><?php echo date("l jS \ F Y h:i:s A") ;?></p></h5>
            <a href="##" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About</h2>
        <p>Welcome to NextGeeks Software Services.</p>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <p>
           NextGeeks Software Services is an best software company in Ranchi, Jharkhand for Customized Softwares, Ecommerce Websites and Mobile Apps. With over more than 3 years of experience in IT industries. NextGeeks offers a customized software development services with an integration of all new technologies and diverse platform.
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Domain & Hosting.</li>
            <li><i class="ri-check-double-line"></i> Website Design & Development.</li>
            <li><i class="ri-check-double-line"></i> Ecommerce Development.</li>
            <li><i class="ri-check-double-line"></i> Software Development.</li>
            <li><i class="ri-check-double-line"></i> Mobile Apps Development.</li>
            <li><i class="ri-check-double-line"></i> Application Integration Services.</li>

          </ul>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
             we have gained Excellence in providing the best IT Solutions for businesses and recognized as one of the fastest-growing Software companies in Ranchi,Jharkhand.
          </p>
          <a href="##" class="btn-learn-more">Learn More</a>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <!--  -->
    <div class="container" style="background:#f4f4f4;">
      <div class="row">
       <div class="col-md-12">
         <img src="{{ asset('assets/img/b2.jpg')}}" class="line-img" alt="" style="height:550px;width:100%;">
       </div>
      </div>
    </div><br><br>
       
       <!--  -->
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <span data-purecounter-start="0" data-purecounter-end="200" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Our Clients : </strong> consequuntur quae qui deca rode</p>
            <a href="##">Find out more &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-journal-richtext"></i>
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Projects : </strong> adipisci atque cum quia aut numquam delectus</p>
            <a href="##">Find out more &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-headset"></i>
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Hours Of Support : </strong> aut commodi quaerat. Aliquam ratione</p>
            <a href="##">Find out more &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-people"></i>
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Employee : </strong> rerum asperiores dolor molestiae doloribu</p>
            <a href="##">Find out more &raquo;</a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">

    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Services</h2>
        <p>Our Services</p>
      </div>
      <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us section-bg">
    <div class="container-fluid" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-5 align-items-stretch" style='background-image: url("assets/img/why-us.jpg");height: 500px;' data-aos="zoom-in" data-aos-delay="100">
        </div>
        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
          <div class="content">
            <p>Services Provided By NextGeeks<br> </p>
            <h3>Best <strong style="color: gold;">Software Company </strong> in Ranchi</h3>
            <p>
              Being a big name on offering the best software solutions in Ranchi,Jharkhand. we continuously strive to adopt the newest technology trends and popular platforms for implementing successfully on business applications. Our cutting-edge software solutions help brands to enhance their business operations and services towards their customers. In an emerging city like Ranchi where people are vastly adapting digitization for efficient management of businesses, NextGeeks is dedicated to providing them the best software solutions with all support in terms of reliability, functionality, and scalability.
            </p>
            <!--  -->
            <section id="about" class="about" style="position: relative;margin-top: -100px;">
                <div class=" content">
                    <ul>
                      <li><i class="ri-check-double-line"></i> Software: Professional and Managed Services.</li>
                      <li><i class="ri-check-double-line"></i> Website Design & Development.</li>
                      <li><i class="ri-check-double-line"></i> Ecommerce Development.</li>
                      <li><i class="ri-check-double-line"></i> Managed Services.</li>
                      <li><i class="ri-check-double-line"></i> Mobile Apps Development.</li>
                      <li><i class="ri-check-double-line"></i> Application Integration Services.</li>
                    </ul>
                  </div>
            </section>

            <!--  -->
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Why Us Section -->

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4><a href="">Website Design & Development</a></h4>
            <p>Our team of web Designers is extremely motivated, passionate and creative. We provide custom website design services ranging from simple online brochure sites to sophisticated ecommerce, social networking or any customized web application based site. </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="">Software Training</a></h4>
            <p>Nextgeeks provides Training services to all the candidates who wish to have a bright future in software IT Fields.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4><a href="">Ecommerce Development</a></h4>
            <p>With technological improvements, Nextgeeks is at the forefront of delivering a revolution in the sector of eCommerce. The majority of individuals use the internet for a variety of reasons. It shed light on some main motivations for developing an eCommerce website for your company.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4><a href="">SEO Services</a></h4>
            <p>Search Engines are the most effective way to get your website noticed by potential customers. Search Engine Optimization or SEO is a science that analyzes search engine algorithms.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="">Web Design & Hosting</a></h4>
            <p>Nextgeeks is the leading web hosting company in Ranchi jharkhand.We provide online business marketing for web hosting websites.We offer the latest in web technology with exceptional server configuration best suited for your website and hosting plans that suit your budget and requirements.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-arch"></i></div>
            <h4><a href="">Mobile Apps</a></h4>
            <p>This is the age of smart phones and tablet PCs. The “Touch” function has replaced keys and smart apps have replaced mobile websites.As a leading mobile application development company in India, We select best Mobile App Developers to get the highly qualified team to give you the right Mobile App development of your project.</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Testimonials</h2>
        <center>
          <p>Don’t take our word for it</p>
          <h3 style="color: #0eadf9;">listen to what our clients have to say</h3>
        </center>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

           @foreach($testimonial as $testimonial)
           <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                 @if($testimonial->test_image == "")
                  <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                  @else
                  <img class="testimonial-img" alt="" src="{{asset('assets/Upload-Image/Testimonial-Image/'.$testimonial->test_image)}}" style="border-radius:1%;height:;">@endif
                <h3>{{$testimonial->test_name}}</h3>
                <h4>{{$testimonial->test_role}}</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{$testimonial->test_message}}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->
          @endforeach

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta"  style="background: #3b82f6;">
    <div class="container" data-aos="zoom-in">

      <div class="text-center">
        <h3>Plans and Pricing</h3>
        <p> We offer the cheapest pricing for the best features in project.</p>
        <a class="cta-btn" href="##">Call To Now</a>
      </div>

    </div>
  </section> <!-- End Cta Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Team</h2>
        <p>Our Team</p>
      </div>

      <div class="row">

        @foreach($our_team as $our_team)
        <div class="col-xl-3 col-lg-4 col-md-6">
          <div class="member" data-aos="zoom-in" data-aos-delay="100">
            @if($our_team->t_image == "")
            <img src="{{ asset('assets/img/team/team-1.jpg')}}" class="img-fluid" alt="">
            @else
            <img class="img-fluid" alt="" src="{{asset('assets/Upload-Image/OurTeam-Image/'.$our_team->t_image)}}" style="border-radius:5%;height:300px;">     
            @endif
            <div class="member-info">
              <div class="member-info-content">
                <h4>{{$our_team->t_name}}</h4>
                <span>{{$our_team->t_role}}</span>
              </div>
              <div class="social">
                <a href="##"><i class="bi bi-twitter"></i></a>
                <a href="##"><i class="bi bi-facebook"></i></a>
                <a href="##"><i class="bi bi-instagram"></i></a>
                <a href="##"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>

    </div>
  </section><!-- End Team Section -->


</main><!-- End #main -->

  
@endsection