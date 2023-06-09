<!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>NextGeeks</h3>
              <p class="pb-3"><em>Lane No -02, Sattar Colony, Bariatu, Ranchi</em></p>
              <p>
                Pincode - 834009 <br>
                Ranchi, Jharkhand<br><br>
                <strong>Phone:</strong> <p>+91 7205609612<br>+91 7504289838</p><br>
                <strong>Email:</strong> nextgeeks.in@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about.us') }}">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('testimonial') }}">Testimonial</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('contact') }}">Contact Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('feedback') }}">Feedback</a></li>
              
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('Services') }}">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('our.team') }}">Our Team</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="##">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="##">App Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="##">Hepl </a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Email Address</p>
            <form action="{{ route('email.subscribe') }}" method="post">
              @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
            
            <!-- @if (count($errors) > 0)
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
            @endif -->

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>NextGeeks Software Services</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="##">NextGeeks Software Services</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>