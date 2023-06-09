@extends('layouts.dashboard')

@section('content')
<div class="col-12 grid-margin">
  <div class="col-lg-12 margin-tb">
    <div class="pull-right">
      <a class="btn btn-primary btn-md" href="{{ route('ourteam.view') }}">View</a>
    </div>
    <br>
  </div>
  <div class="card">
    <div class="card-body">
      @foreach($team_list as $team_list)
      <form method="POST" action="{{ route('ourteam.update') }}" enctype="multipart/form-data" >
        @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <input type="hidden" name="image_id" class="form-control" readonly="readonly" value="{{$team_list->id}}"  />
        <p class="card-description"> Personal information our Teams </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="t_name" value="{{$team_list->t_name}}" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Role ( Position )</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="t_role" value="{{$team_list->t_role}}"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Facebook</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="t_facebook" value="{{$team_list->t_facebook}}" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Twitter</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="t_twitter" value="{{$team_list->t_twitter}}" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">LinkedIn</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="t_linkedin" value="{{$team_list->t_linkedin}}" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Instagram</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="t_instagram" value="{{$team_list->t_instagram}}" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6 form-group" style="background: ;">
              @if($team_list->t_image == "")
                <img src="{{ asset('assets/img/no-image.jpg')}}" alt="image" style="border-radius:10%;height:155px;width:155px;" />
              @else
              <img style="border-radius:10%;height:155px;width:155px;" required name="image" id="output_image3" src="{{asset('assets/Upload-Image/OurTeam-Image/'.$team_list->t_image)}}">
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
<script>
    setTimeout(function(){
         $("#success-message").fadeOut();
         $("#error-message").fadeOut();
        },5000);
</script>
@endsection