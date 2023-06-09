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

      <form method="POST" action="{{ route('clients.create') }}" enctype="multipart/form-data" >
        @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <p class="card-description"> <b>New Clients Form.</b> </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_name" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_email"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client Mobile</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_mobile" maxlength="10"/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client State</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_state" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client Address</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_address" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Client Landmark</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="client_landmark" />
              </div>
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
@endsection