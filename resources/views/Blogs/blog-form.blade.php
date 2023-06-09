@extends('layouts.dashboard')

@section('content')
<div class="col-12 grid-margin">
  <div class="col-lg-12 margin-tb">
    <div class="pull-right">
      <a class="btn btn-primary btn-md" href="{{ route('blogs.view') }}">View</a>
    </div>
    <br>
  </div>
  <div class="card">
    <div class="card-body">
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

      <form method="POST" action="{{ route('blogs.create') }}" enctype="multipart/form-data" >
        @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <p class="card-description"> Personal information our Blogs </p>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <label><strong>Title :</strong> </label><br>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="bg_title" />
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <label><strong>Content :</strong> </label><br>
              <div class="col-sm-12">
                <textarea class="form-control" name="bg_content" id="summernote"></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
              <label><strong>Blog Image :</strong> </label><br>

            <div class="col-md-6 form-group" style="background: ;">
              <img style="border-radius:5%;height:155px;width:220px;" src="{{url('assets/img/no-image.jpg')}}" id="output_image3">
              <br><br>
              <input type="file" accept="image/*" name="image" required onchange="preview_image3(event)" class="btn btn-success"  style="width: 100%">

              <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type = "text/javascript"></script>
              <script type='text/javascript'>
                function preview_image3(event)
                {
                  $("#output_image3").css("display", "block");
                var reader = new FileReader();
                reader.onload = function()
                {
                  var output = document.getElementById('output_image3');
                  output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
                }
              </script>
            </div>
          </div>
        </div>

        <div class="text-center"><button class="btn btn-success btn-sm"type="submit">Submit</button></div>

      </form>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
    setTimeout(function(){
         $("#success-message").fadeOut();
         $("#error-message").fadeOut();
        },5000);
</script>
<!-- include libraries(jQuery, bootstrap) -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
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
@endsection