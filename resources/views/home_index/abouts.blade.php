@extends('home_index.header')
@section('content')
 <!-- ======= About Section ======= -->
  <section id="about" class="about" style="position:relative;margin-top:40px;">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About</h2>
        <p>About Us</p>
      </div>

      <div class="row content">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <h1 style="color: #0eadf9;font-family: italic;text-align: center;">About NextGeeks Software Services.</h1>
          <center><i class="fa fa-ellipsis-h" style="font-size:48px;color:red"></i>
          <i class="fa fa-ellipsis-h" style="font-size:48px;color:red"></i></center>
          
          <p>
           NextGeeks Software Service is one of the fastest-growing IT companies in Ranchi Jharkhand. serving 200+ clients throughout Jharkhand and other parts of India. We have a team of highly skilled and dedicated designers and developers who have years of experience and having the capabilities to accomplish projects within a specified deadline. In order to understand customer's requirements from their niche point of view, we personally let our developers interact directly with our clients and allow them to take their own decision making approach. Being a leading software company in Ranchi, we believe in providing quality service to our clients as we know the value of trust and expectation they have on us. Nowadays, even small businessmen have started accepting the power of digital innovations that vastly changing the way of running business. Software, mobile app, and websites are the mediums through which they can be a racer of their competitive tracks. We specialized in designing and developing highly responsive and interactive software, mobile apps, and websites that are responsible for refining business processes and help to reach the goals effectively.
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
        <div class="col-lg-1"></div>

      </div><br>
      <img src="{{ asset('assets/img/about4.png')}}" class="line-img" alt="" style="height:550px;width: 100%;">
      

    </div>
  </section><!-- End About Section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection