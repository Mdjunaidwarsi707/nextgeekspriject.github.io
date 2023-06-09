@extends('layouts.dashboard')

@section('content')
<div class="col-12 grid-margin">
  <div class="col-lg-12 margin-tb">
    <div class="pull-right">
      <a class="btn btn-primary btn-md" href="{{ route('contact.view') }}">View</a>
    </div>
    <br>
  </div>
  <div class="card">
    <div class="card-body">
      @foreach($team_list as $team_list)
      <form method="POST" action="{{ route('contact.update') }}" enctype="multipart/form-data" >
        @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <input type="hidden" name="id" class="form-control" readonly="readonly" value="{{$team_list->id}}"  />
        <p class="card-description"> contact Us Update. </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"> Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="name" value="{{$team_list->name}}" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="email" value="{{$team_list->email}}"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"> Mobile No</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="mobile" value="{{$team_list->mobile}}" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Subject</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="subject" value="{{$team_list->subject}}" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Message</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="message" value="{{$team_list->message}}" />
              </div>
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