@extends('home_index.header')
@section('content')

<main id="main">
  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg" style="position:relative;margin-top:40px;">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Testimonials</h2>
        <p>Our Testimonials</p>
      </div>
      <div class="row">

         @foreach($testimonial as $testimonial)
          <div class="col-lg-6">
            <div class="testimonials-slider " data-aos="fade-up" data-aos-delay="100">
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
            </div>
          </div>
         @endforeach
      </div>
    </div>
  </div>
  </section><!-- End Testimonials Section -->
</main><!-- End #main -->
@endsection