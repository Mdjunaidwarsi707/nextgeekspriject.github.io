@extends('home_index.header')

@section('content')

<main id="main"style="position:relative;margin-top:110px;">
 <!--  <div class="col-lg-12">
    <center>
      <h3 style="color: #0eadf9;font-weight: bold;">Latest Blog Post</h3>
      <i class="fa fa-ellipsis-h" style="font-size:35px;color:red"></i>
      <i class="fa fa-ellipsis-h" style="font-size:35px;color:red"></i>
    </center>
  </div>
 -->
  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts" >
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Project</h2>
        <p>Project Details</p>
      </div>
      <!-- Message Show -->
        <div class="col-lg-12">
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
        <!-- Message Show -->
      <div class="row no-gutters">
        @foreach($blog_single as $blog)
        <div class="col-lg-12 col-md-12 col-sm-12 ">
          <div class="count-box">
            @if($blog->pro_image == "")
            <img src="{{ asset('assets/img/team/team-1.jpg')}}" style="border-radius:5%;height:320px;width:100%;" alt="">
            @else
            <img class="img-fluid" alt="" src="{{asset('assets/Upload-Image/Project-Logo/'.$blog->pro_image)}}" style="border-radius:5%;height:320px;width:100%;">     
            @endif
            <!-- <i class='fas fa-blog' style="color: red;font-size: 20px;"></i> -->Post By : Admin
            <!-- <span style="font-size: 15px;float: right;">Date :  {{$blog->created_at}}</span> --><hr>

            <b style="color: #0eadf9;font-size: 20px;font-style: italic;">{{$blog->pro_title}}</b>
            <br><br>
            <!-- Review Parts Start -->
          <blockquote>
            <label class="rate d-flex">Ratting: &nbsp;&nbsp;[ {{$blog->pro_review}} ]
              @if($blog->pro_review >=1.0)
                  <span class="fa fa-star checked" style="color:#ff4900;font-size: 10px;"></span>
              @else
                  <span class="fa fa-star" style="color:gray;font-size: 10px;"></span>
              @endif
              @if($blog->pro_review >=2.0)
                  <span class="fa fa-star checked" style="color:#ff4900;font-size: 10px;"></span>
              @else
                  <span class="fa fa-star" style="color:gray;font-size: 10px;"></span>
              @endif
              @if($blog->pro_review >=3.0)
                  <span class="fa fa-star checked" style="color:#ff4900;font-size: 10px;"></span>
              @else
                  <span class="fa fa-star" style="color:gray;font-size: 10px;"></span>
              @endif
              @if($blog->pro_review >=4.0)
                  <span class="fa fa-star checked" style="color:#ff4900;font-size: 10px;"></span>
              @else
                  <span class="fa fa-star" style="color:gray;font-size: 10px;"></span>
              @endif
              @if($blog->pro_review >=5)
                  <span class="fa fa-star checked" style="color:#ff4900;font-size: 10px;"></span>
              @else
                  <span class="fa fa-star" style="color:gray;font-size: 10px;"></span>
              @endif

            </label>

          </blockquote>
          <!-- Review Parts End -->
            <blockquote>Review Message :- {{$blog->pro_text_message}}</blockquote> 
            <blockquote>Technology :- {!!$blog->pro_technology!!}</blockquote> 
            <blockquote>Keywords :- {!!$blog->pro_keywords!!}</blockquote>
            <h3>Project Description :- </h3>
            <blockquote>{!!$blog->pro_description!!}</blockquote> 
            <!-- <span>{!!$blog->pro_description!!}</span>  -->
           <hr>
          </div> 
        </div>
        @endforeach
      </div>
    </div>
  </section><!-- End Counts Section -->
<br>

</main><!-- End #main -->

@endsection
@section('script')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script>
  setTimeout(function(){
   $("#success-message").fadeOut();
   $("#error-message").fadeOut();
  },5000);
</script>
<!-- include libraries(jQuery, bootstrap) -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

<!-- summernote css/js -->
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> -->
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>

@endsection