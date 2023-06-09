@extends('home_index.header')

@section('content')
<!-- ======= Hero Section ======= -->
  <section id="" >
    <div  style="background-image: url(assets/img/feedback2.jpg);height:350px;background-position:left;
  background-repeat: no-repeat;
  background-size: cover;  box-shadow: 10px 5px 8px #77ff00;
  ">
    </div>
  </section>
<!-- End Hero -->
<main id="main" style="position:relative;margin-top:110px;">
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
      <!-- <div class="section-title">
        <h2>Feedback</h2>
        <p>Feedback Details</p>
      </div> -->
       
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