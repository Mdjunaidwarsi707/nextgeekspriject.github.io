@extends('layouts.dashboard')
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
<!-- comment view start -->
<section id="counts" class="counts">
  <div class="container" data-aos="fade-left">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <label ><h3>Comments : {{$total_blog_comment}}</h3></label>
        @foreach($blog_comment as $blog_comments)
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
                      <h6 class="comment-name">
                        <a href="##" style="color: blue;font-family: italic;font-size: 20px;">Blog Name : {{$blog_comments->cm_blog_name}}</a>
                        <br>
                        <a href="##">{{$blog_comments->cm_name}}</a>
                      </h6>
                      <span>{{$blog_comments->created_at}}</span>
                      <a href="{{ route('maincomment.delete',base64_encode(convert_uuencode($blog_comments->id))) }}"><i class="fa fa-trash"></i></a>
                      <a href="{{ route('maincomment.edit',base64_encode(convert_uuencode($blog_comments->id))) }}"><i class="fa fa-reply"></i></a>
                      <!-- <i class="fa fa-reply"></i>
                      <i class="fa fa-heart"></i> -->

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
@endsection
@section('script')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<script>
    setTimeout(function(){
         $("#success-message").fadeOut();
         $("#error-message").fadeOut();
        },5000);
</script>
@endsection