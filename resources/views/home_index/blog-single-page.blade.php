@extends('home_index.header')
<style type="text/css">
  /**
 * Oscuro: #283035
 * Azul: #03658c
 * Detalle: #c7cacb
 * Fondo: #dee1e3
 ----------------------------------*/
 * {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
 }

 a {
  color: #03658c;
  text-decoration: none;
 }

ul {
  list-style-type: none;
}

body {
  font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
  background: #dee1e3;
}

/** ====================
 * Lista de Comentarios
 =======================*/
.comments-container {
  margin: 60px auto 15px;
  width: 100%;
}

.comments-container h1 {
  font-size: 36px;
  color: #283035;
  font-weight: 400;
}

.comments-container h1 a {
  font-size: 18px;
  font-weight: 700;
}

.comments-list {
  margin-top: 30px;
  position: relative;
}

/**
 * Lineas / Detalles
 -----------------------*/
.comments-list:before {
  content: '';
  width: 2px;
  height: 100%;
  background: #c7cacb;
  position: absolute;
  left: 32px;
  top: 0;
}

.comments-list:after {
  content: '';
  position: absolute;
  background: #c7cacb;
  bottom: 0;
  left: 27px;
  width: 7px;
  height: 7px;
  border: 3px solid #dee1e3;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}

.reply-list:before, .reply-list:after {display: none;}
.reply-list li:before {
  content: '';
  width: 60px;
  height: 2px;
  background: #c7cacb;
  position: absolute;
  top: 25px;
  left: -55px;
}


.comments-list li {
  margin-bottom: 15px;
  display: block;
  position: relative;
}

.comments-list li:after {
  content: '';
  display: block;
  clear: both;
  height: 0;
  width: 0;
}

.reply-list {
  padding-left: 88px;
  clear: both;
  margin-top: 15px;
}
/**
 * Avatar
 ---------------------------*/
.comments-list .comment-avatar {
  width: 65px;
  height: 65px;
  position: relative;
  z-index: 99;
  float: left;
  border: 3px solid #FFF;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
  -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
  box-shadow: 0 1px 2px rgba(0,0,0,0.2);
  overflow: hidden;
}

.comments-list .comment-avatar img {
  width: 100%;
  height: 100%;
}

.reply-list .comment-avatar {
  width: 50px;
  height: 50px;
}

.comment-main-level:after {
  content: '';
  width: 0;
  height: 0;
  display: block;
  clear: both;
}
/**
 * Caja del Comentario
 ---------------------------*/
.comments-list .comment-box {
  width: 90%;
  float: right;
  position: relative;
  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
  -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
  box-shadow: 0 1px 1px rgba(0,0,0,0.15);
}

.comments-list .comment-box:before, .comments-list .comment-box:after {
  content: '';
  height: 0;
  width: 0;
  position: absolute;
  display: block;
  border-width: 10px 12px 10px 0;
  border-style: solid;
  border-color: transparent red;
  top: 8px;
  left: -11px;
  /*background: red;*/
}

.comments-list .comment-box:before {
  border-width: 11px 13px 11px 0;
  border-color: transparent rgba(0,0,0,0.05);
  left: -12px;
  /*background: red;*/
}

.reply-list .comment-box {
  width: 90%;
}
.comment-box .comment-head {
  background: #e8e8e8;
  padding: 10px 12px;
  border-bottom: 1px solid #E5E5E5;
  overflow: hidden;
  -webkit-border-radius: 4px 4px 0 0;
  -moz-border-radius: 4px 4px 0 0;
  border-radius: 4px 4px 0 0;
}

.comment-box .comment-head i {
  float: right;
  margin-left: 14px;
  position: relative;
  top: 2px;
  color: blue;
  cursor: pointer;
  -webkit-transition: color 0.3s ease;
  -o-transition: color 0.3s ease;
  transition: color 0.3s ease;
}

.comment-box .comment-head i:hover {
  color: #03658c;
}

.comment-box .comment-name {
  color: #283035;
  font-size: 14px;
  font-weight: 700;
  float: left;
  margin-right: 10px;
}

.comment-box .comment-name a {
  color: #283035;
}

.comment-box .comment-head span {
  float: left;
  color: #999;
  font-size: 13px;
  position: relative;
  top: 1px;
}

.comment-box .comment-content {
  background: #FFF;
  padding: 12px;
  font-size: 15px;
  color: #595959;
  -webkit-border-radius: 0 0 4px 4px;
  -moz-border-radius: 0 0 4px 4px;
  border-radius: 0 0 4px 4px;
}

.comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #03658c;}
.comment-box .comment-name.by-author:after {
  content: 'autor';
  background: #03658c;
  color: #FFF;
  font-size: 12px;
  padding: 3px 5px;
  font-weight: 700;
  margin-left: 10px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}

/** =====================
 * Responsive
 ========================*/
@media only screen and (max-width: 766px) {
  .comments-container {
    width: 480px;
  }

  .comments-list .comment-box {
    width: 390px;
  }

  .reply-list .comment-box {
    width: 320px;
  }
}
</style>
@section('content')

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
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Blogs</h2>
        <p>Single Blog </p>
      </div>
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

      <div class="row no-gutters">
        @foreach($blog_single as $blog)
        <div class="col-lg-12 col-md-12 col-sm-12 ">
          <div class="count-box">
            @if($blog->bg_image == "")
            <img src="{{ asset('assets/img/team/team-1.jpg')}}" style="border-radius:5%;height:320px;width:100%;" alt="">
            @else
            <img class="img-fluid" alt="" src="{{asset('assets/Upload-Image/Blogs-Image/'.$blog->bg_image)}}" style="border-radius:5%;height:320px;width:100%;">     
            @endif
            <!-- <i class='fas fa-blog' style="color: red;font-size: 20px;"></i> -->Post By : Admin
            <!-- <span style="font-size: 15px;float: right;">Date :  {{$blog->created_at}}</span> --><hr>

            <b style="color: #0eadf9;font-size: 20px;font-style: italic;">{{$blog->bg_title}}</b>
            <blockquote><h3>Blog Description :- </h3>{!!$blog->bg_content!!}</blockquote>
           <hr>
          </div> 
        </div>
        @endforeach
      </div>

    </div>
  </section><!-- End Counts Section -->

<!-- comment view start -->
<section id="counts" class="counts">
  <div class="container" data-aos="fade-left">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <label ><h3>Comments : {{$total_comment}}</h3></label>
        @foreach($blog_comments as $blog_comments)
           <!-- Contenedor Principal -->
          <div class="comments-container">

            <ul id="comments-list" class="comments-list">
              <li>
                
                <div class="comment-main-level">
                  <!-- Avatar -->
                  <div class="comment-avatar"><img src="{{ asset('assets/img/userlogo.jpg')}}" alt=""></div>
                  <!-- Contenedor del Comentario -->
                  <div class="comment-box">
                    <div class="comment-head">
                      <h6 class="comment-name by-author"><a href="##">{{$blog_comments->cm_name}}</a></h6>
                      <span>{{$blog_comments->created_at}}</span>
                       <i class="fa fa-reply"  data-bs-toggle="modal" data-bs-target="#"></i>
                      <i class="fa fa-heart"></i>
                    </div>
                    <div class="comment-content">
                      {{$blog_comments->cm_comment}}
                    </div>
                  </div>
                </div>
                
                <!-- Respuestas de los comentarios -->
                <ul class="comments-list reply-list">
                  <li>
                  @if($blog_comments->re_blog_subid == '')
                  <strong> No Reply Here !</strong>
                  @else
                  <!-- Avatar -->
                    <div class="comment-avatar"><img src="{{ asset('assets/img/nextgeeklogo.jpg')}}" alt=""></div>
                    <!-- Contenedor del Comentario -->
                    <div class="comment-box">
                      <div class="comment-head">
                        <h6 class="comment-name"><a href="##">{{$blog_comments->re_name}}</a></h6>
                        <span>{{$blog_comments->created_at}}</span>
                        <!-- <i class="fa fa-reply"></i>
                        <i class="fa fa-heart"></i> -->
                      </div>
                      <div class="comment-content">
                        {{$blog_comments->re_comment}}
                      </div>
                    </div>
                  @endif
                  </li>

                </ul>
              </li>

            </ul>
          </div>
          @endforeach
      </div>
  </div>
</section>
<!-- Comment view end -->
<!-- Comment form start -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-left">
      <div class="col-lg-8">
          <label><h3>Fill below comment this blog:</h3></label>
          <div class="card">
            <div class="card-body count-box">
              <div class="col-lg-12">
                <form class="row g-3" method="post" action="{{ route('blogcomments.creates') }}" enctype="multipart/form-data" >
                  @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                   @foreach($blog_single as $record)
                    <input type="text" class="form-control" name="blog_id" value="{{$record->id}}">
                    <input type="hidden" class="form-control" name="title_name" value="{{$record->bg_title}}">
                   @endforeach
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Your Name </label>
                    <input type="text" class="form-control" name="cm_name">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Your Email </label>
                    <input type="email" class="form-control" name="cm_email">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Phone Nubmer </label>
                    <input type="text" maxlength="10" class="form-control" name="cm_mobile">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Comment </label>
                    <input type="text"  class="form-control" name="cm_comment">
                  </div>

                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-success">Submit</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
<!-- Comment form end -->
</main><!-- End #main -->
<!-- Modal for Reply -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="post" action="{{ route('blogcommentreply.create') }}" enctype="multipart/form-data">
      <div class="modal-body">
           @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
          @foreach($blog_single as $record)
            <input type="text" class="form-control" name="blog_subid" value="{{$record->id}}">
          @endforeach
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Your Name:</label>
            <input type="text" class="form-control" name="re_name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Your Email Id:</label>
            <input type="email" class="form-control" name="re_email">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Pnone Number:</label>
            <input type="text" class="form-control" maxlength="10" name="re_mobile">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Comment:</label>
            <textarea class="form-control" id="message-text" name="re_comment"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-success">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <!-- Modeal for Reply -->
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
  $('#summernote').summernote({
      height: 400
  });
</script>

<script>
  setTimeout(function(){
   $("#success-message").fadeOut();
   $("#error-message").fadeOut();
  },5000);
</script>
@endsection