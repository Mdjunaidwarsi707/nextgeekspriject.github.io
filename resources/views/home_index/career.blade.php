@extends('home_index.header')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">
      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-5.jpg">
        <div class="carousel-container">
          <div class="container">
            <center>
            <h2 class="animate__animated animate__fadeInDown">Let’s Lead, <a style="color: yellow;">to innovate.</a><br>
              <span style="color: #0eadf9;font-family: italic;">Career Opportunity</span></h2>
            <p class="animate__animated animate__fadeInUp" style="color: ;">NextGeeks aims to revolutionize the way people work and grow.The backbone of the company – our people.</p>
          </center>
          </div>
        </div>
      </div>

    </div>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Career</h2>
        <p>Career Opportunity</p>
      </div>
      <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us section-bg">
          <div class="container-fluid" data-aos="fade-up">
            <div class="row">
              <div class="col-lg-5 align-items-stretch" style='background-image: url("assets/img/career.jpg");height: 500px;' data-aos="zoom-in" data-aos-delay="100">
              </div>
              <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
                <div class="content">
                  <p>Services Provided By NextGeeks<br> </p>
                  <h3>Our Plan To Upgrade Your  <strong style="color: gold;">Career</strong> </h3>
                  <!--  -->
                  <section id="about" class="about" style="position: relative;margin-top: -100px;">
                      <div class=" content">
                          <ul>
                            <li><i class="ri-check-double-line"></i> Push you to be an expert in your domain.</li>
                            <li><i class="ri-check-double-line"></i>  Opportunity to work with world class clients.</li>
                            <li><i class="ri-check-double-line"></i> Empower you to shape your skills.</li>
                            <li><i class="ri-check-double-line"></i> Diverse industry experience.</li>
                            <li><i class="ri-check-double-line"></i> Our Team and colleague’s objective is pointed at developing a strong development team of enacted and pledged web application development expertise..</li>
                            <li><i class="ri-check-double-line"></i> We try to work around this fact by emphasizing training, credentials, and accountability..</li>
                          </ul>
                        </div>
                  </section>
                  <!--  -->
                </div>
              </div>
            </div>
          </div>
        </section><!-- End Why Us Section -->

    </div>
  </section><!-- End Services Section -->

  <div class="col-lg-12">
    <center>
      <h2 style="color: #0eadf9;font-weight: bold;">Current Openings</h2><br>
    </center>

  </div>

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">
        @foreach($career as $career)
        <div class="col-lg-6 col-md-12 ">
          <div class="count-box" style="box-shadow: 5px 2px 15px 2px #b8ffed;">
            <i class="bi bi-people"></i>
            <h4>&nbsp;  {{$career->role_name}} </h4><span style="font-size: 15px;float: right;">Post - {{$career->created_at}}</span><hr>
            <p><strong>Qualification : </strong>{{$career->qualification}}<br> 
            <strong>Job Location : </strong>{{$career->job_location}}<br>
            <strong>Experience : </strong> {{$career->experience}}<br>
            <strong>Skills : </strong>{{$career->Skills}}<br>
            <strong>Annual Salary : </strong> {{$career->annual_salary}}</p>
            <a href="{{url('resume-apply/'.($career->id))}}">Apply this job &raquo;</a><hr>
          </div><br>
        </div>
        @endforeach

        

      </div>

    </div>
  </section><!-- End Counts Section -->

</main><!-- End #main -->

  
@endsection