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
      @foreach($team_list as $team_list)
      <form method="POST" action="{{ route('blogs.update') }}" enctype="multipart/form-data" >
        @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <input type="hidden" name="id" class="form-control" readonly="readonly" value="{{$team_list->id}}"  /> 
        <input type="hidden" name="old_slug" class="form-control" readonly="readonly" value="{{$team_list->slug}}"  />
        <p class="card-description"> Personal information our Teams </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Title</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="bg_title" value="{{$team_list->bg_title}}" />
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="col-md-12">
            <div class="form-group row">
              <label><strong>Contents:</strong> </label><br>
              <div class="col-sm-12">
                <textarea class="form-control" name="bg_content" id="summernote">{!!$team_list->bg_content!!}</textarea>
              </div>
            </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6 form-group" style="background: ;">
              @if($team_list->bg_image == "")
                <img src="{{ asset('assets/img/no-image.jpg')}}" alt="image" style="border-radius:10%;height:155px;width:155px;" />
              @else
              <img style="border-radius:10%;height:155px;width:155px;" required name="image" id="output_image3" src="{{asset('assets/Upload-Image/Blogs-Image/'.$team_list->bg_image)}}">
              @endif
              <br><br>
              <input type="file" accept="image/*" name="image" required onchange="preview_image3(event)" class="btn btn-success"  style="width: 100%">
              <!-- For Image get in box -->
              <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>

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
              <!-- For Image get in box -->
            </div>
          </div>
        </div>

        <div class="text-center"><button class="btn btn-success btn-sm"type="submit">Submit</button></div>

      </form>
      @endforeach
    </div>
  </div>
</div>
@endsection
@section('script')
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