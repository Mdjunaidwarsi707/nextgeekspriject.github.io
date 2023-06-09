@extends('home_index.header')
@section('content')
  
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg" style="position:relative;margin-top:40px;">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Contact</h2>
      <p>Contact Us</p>
    </div>

    <div class="row">

      <div class="col-lg-6">

        <div class="row">
          <div class="col-md-12">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Lane No -02, Sattar Colony, Bariatu, Ranchi</p>
              <p>Pincode - 834009</p>
              <p>Ranchi, Jharkhand </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>nextgeeks.in@gmail.com<br></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+91 7205609612<br>+91 7504289838</p>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-6 card"><br>
        <form action="{{ route('contact.create') }}" method="POST">
          @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" maxlength="10" name="mobile" id="mobile" placeholder="Mobile No" required>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            @if (count($errors) > 0)
              <div class="alert alert-danger" id="error-message">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                   @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                   @endforeach
                </ul>
              </div>
            @endif
            @if ($message = Session::get('success'))
              <div class="alert alert-success" id="success-message">
                <span ></span>
                <p>{{ $message }}</p>
              </div>
            @endif
          </div>
          <div class="text-center"><button class="btn btn-warning">Send Message</button></div>
        </form>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->
@endsection
@section('script')
<script>
    setTimeout(function(){
         $("#success-message").fadeOut();
         $("#error-message").fadeOut();
        },5000);
</script>
@endsection