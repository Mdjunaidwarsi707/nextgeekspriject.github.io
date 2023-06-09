@extends('home_index.header')
@section('content')
<!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg" style="position:relative;margin-top:40px;">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Team</h2>
        <p>Our Team</p>
      </div>

      <div class="row">
        @foreach($our_team as $our_team)
        <div class="col-xl-3 col-lg-4 col-md-6" style="box-shadow: 5px 2px 15px 2px #b8ffed;">
          <div class="member" data-aos="zoom-in" data-aos-delay="100">
            @if($our_team->t_image == "")
            <img src="{{ asset('assets/img/team/team-1.jpg')}}" class="img-fluid" alt="">
            @else
            <img class="img-fluid" alt="" src="{{asset('assets/Upload-Image/OurTeam-Image/'.$our_team->t_image)}}" style="border-radius:2%;height:300px;">     
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

@endsection