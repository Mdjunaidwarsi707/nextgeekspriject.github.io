@extends('layouts.dashboard')

@section('content')
<div class="col-12 grid-margin">
  <div class="col-lg-12 margin-tb">
    <div class="pull-right">
      <a class="btn btn-primary btn-md" href="{{ route('career.view') }}">View</a>
    </div>
    <br>
  </div>
  <div class="card">
    <div class="card-body">
      @foreach($team_list as $team_list)
      <form method="POST" action="{{ route('career.update') }}" enctype="multipart/form-data" >
        @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <input type="hidden" name="id" class="form-control" readonly="readonly" value="{{$team_list->id}}"  />
        <p class="card-description"> Career Opportunity update. </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Role Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="role_name" value="{{$team_list->role_name}}" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Qualification</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="qualification" value="{{$team_list->qualification}}"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Job Location</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="job_location" value="{{$team_list->job_location}}" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Experience</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="experience" value="{{$team_list->experience}}" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Skills</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Skills" value="{{$team_list->Skills}}" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Annual Salary</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="annual_salary" value="{{$team_list->annual_salary}}" />
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