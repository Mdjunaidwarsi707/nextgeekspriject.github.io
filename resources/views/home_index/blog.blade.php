@extends('home_index.header')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="" >
      <div  style="background-image: url(assets/img/blog2.jpg);height: 380px;">
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
        <h2>Blogs</h2>
        <p>Latest Blog Post</p>
      </div>
<!-- Fontawesome  -->
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- Fontawesome  -->
      <div class="row no-gutters">
        @foreach($blog as $blog)
        <div class="col-lg-4 col-md-6 col-sm-12" >
          <div class="count-box" style="box-shadow: 5px 2px 15px 2px #b8ffed;height: 450px;">
            <a href="{{url('blog-single-page/'.($blog->slug))}}">
            @if($blog->bg_image == "")
            <img src="{{ asset('assets/img/team/team-1.jpg')}}" style="border-radius:5%;height:220px;width:100%;" alt="">
            @else
            <img class="img-fluid" alt="" src="{{asset('assets/Upload-Image/Blogs-Image/'.$blog->bg_image)}}" style="border-radius:5%;height:220px;width:100%;">     
            @endif
          </a>
            <!-- <i class='fas fa-blog' style="color: red;font-size: 20px;"></i> -->Post By : Admin
            <!-- <span style="font-size: 15px;float: right;">Date :  {{$blog->created_at}}</span> --><hr>

           <a href="{{url('blog-single-page/'.($blog->slug))}}" style="color: #0eadf9;font-size: 18px;font-style: italic;">{{$blog->bg_title}}</a>
           <hr>
          </div><br>    
        </div>
        @endforeach
      </div>

    </div>
  </section><!-- End Counts Section -->

</main><!-- End #main -->

  
@endsection