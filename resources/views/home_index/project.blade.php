@extends('home_index.header')
<style type="text/css">
 /* Rating form start*/
*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    /*padding: 0 10px;*/
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */

/* Rating form end*/

 
</style>
@section('content')
<!-- ======= Hero Section ======= -->
<section id="" >
      <div  style="background-image: url(assets/img/project6.jpg);height:350px;background-position:left;
  background-repeat: no-repeat;
  background-size: cover;
  ">
      </div>
</section><!-- End Hero -->

<main id="main">
 <!--  <div class="col-lg-12">
    <center>
      <h3 style="color: #0eadf9;font-weight: bold;">Latest Blog Post</h3>
      <i class="fa fa-ellipsis-h" style="font-size:35px;color:red"></i>
      <i class="fa fa-ellipsis-h" style="font-size:35px;color:red"></i>
    </center>
  </div>
 -->
  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Project</h2>
        <p>All Projects</p>
      </div>
<!-- Fontawesome  -->
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- Fontawesome  -->
      <div class="row no-gutters">
        @foreach($project_data as $project_data)
        <div class="col-lg-4 col-md-6 col-sm-12" >
          <div class="count-box" style="box-shadow: 5px 2px 15px 2px #b8ffed;height: 450px;">
            <a href="{{url('project-data-single-page/'.$project_data->slug)}}">

            @if($project_data->pro_image == "")
            <img src="{{ asset('assets/img/team/team-1.jpg')}}" style="border-radius:5%;height:220px;width:100%;" alt="">
            @else
            <img class="img-fluid" alt="" src="{{asset('assets/Upload-Image/Project-Logo/'.$project_data->pro_image)}}" style="border-radius:5%;height:220px;width:100%;">     
            @endif
          </a>
            <!-- <i class='fas fa-project_data' style="color: red;font-size: 20px;"></i> -->Post By : Admin
            <!-- <span style="font-size: 15px;float: right;">Date :  {{$project_data->created_at}}</span> -->
            <!-- <br><hr>
                
            <br> -->
            <!-- Review Parts Start -->
          <blockquote>
            <label class="rate d-flex">Ratting:
              <!-- {{ $project_data->pro_review }} -->
              @if($project_data->pro_review >=1.0)
                  <span class="fa fa-star checked" style="color:#ff4900;font-size: 10px;"></span>
              @else
                  <span class="fa fa-star" style="color:gray;font-size: 10px;"></span>
              @endif
              @if($project_data->pro_review >=2.0)
                  <span class="fa fa-star checked" style="color:#ff4900;font-size: 10px;"></span>
              @else
                  <span class="fa fa-star" style="color:gray;font-size: 10px;"></span>
              @endif
              @if($project_data->pro_review >=3.0)
                  <span class="fa fa-star checked" style="color:#ff4900;font-size: 10px;"></span>
              @else
                  <span class="fa fa-star" style="color:gray;font-size: 10px;"></span>
              @endif
              @if($project_data->pro_review >=4.0)
                  <span class="fa fa-star checked" style="color:#ff4900;font-size: 10px;"></span>
              @else
                  <span class="fa fa-star" style="color:gray;font-size: 10px;"></span>
              @endif
              @if($project_data->pro_review >=5)
                  <span class="fa fa-star checked" style="color:#ff4900;font-size: 10px;"></span>
              @else
                  <span class="fa fa-star" style="color:gray;font-size: 10px;"></span>
              @endif
            </label>
          </blockquote>
          <!-- Review Parts End -->
          <br><br><hr>
           <a href="{{url('project-data-single-page/'.$project_data->slug)}}" style="color: #0eadf9;font-size: 18px;font-style: italic;">{{$project_data->pro_title}}</a>
           <hr>
           <!-- base64_encode(convert_uuencode($project_data->client_id)) -->
           
          </div><br>    
        </div>
        @endforeach
      </div>

    </div>
  </section><!-- End Counts Section -->

</main><!-- End #main -->

  
@endsection