@extends('layouts.dashboard')

@section('content')
<div class="col-12 grid-margin">
  <div class="col-lg-12 margin-tb">
    <div class="pull-right">
      <a class="btn btn-primary btn-md" href="{{ route('clients.view') }}">View</a>
    </div>
    <br>
  </div>
  <div class="card">
    <div class="card-body">
      @foreach($team_list as $team_list)
      <form method="POST" action="{{ route('clients.update') }}" enctype="multipart/form-data" >
        @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <input type="hidden" name="id" class="form-control" readonly="readonly" value="{{$team_list->id}}"  />
        <p class="card-description"> clients Details update. </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_name" value="{{$team_list->client_name}}" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_email" value="{{$team_list->client_email}}"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client Mobile</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_mobile" value="{{$team_list->client_mobile}}" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client State</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_state" value="{{$team_list->client_state}}" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client Address</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_address" value="{{$team_list->client_address}}" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client Landmark</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_landmark" value="{{$team_list->client_landmark}}" />
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