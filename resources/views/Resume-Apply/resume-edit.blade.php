@extends('layouts.dashboard')

@section('content')
<div class="col-12 grid-margin">
  <!-- <div class="col-lg-12 margin-tb">
    <div class="pull-right">
      <a class="btn btn-primary btn-md" href="{{ route('career.view') }}">View</a>
    </div>
    <br>
  </div> -->
  <div class="card">
    <div class="card-body">
      @foreach($team_list as $team_list)
      <form method="POST" action="{{ route('apply.update') }}" enctype="multipart/form-data" >
        @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <input type="hidden" name="id" class="form-control" readonly="readonly" value="{{$team_list->id}}"  />
        <p class="card-description"> Career Opportunity update. </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Resume Staus Set</label>
              <div class="col-sm-9">
                <select id="inputState" class="form-select" name="status">
                  <option selected>Select Status...</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                </select>
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