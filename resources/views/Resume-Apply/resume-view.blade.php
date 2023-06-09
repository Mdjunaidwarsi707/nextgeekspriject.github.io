@extends('layouts.dashboard')

@section('content')
<div class="col-12 grid-margin">
  <div class="col-lg-12 margin-tb">
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
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="overflow-x: auto;overflow-y: auto;height: 500px;width:100%;">
      <div class="card-body">
        <h4 class="card-title">Online Resume Apply Details : </h4>
        </p>
        <table class="table table-striped">
          <thead style="color:darkblue;font-weight:bold;background: lightyellow;">
            <tr>
              <th> Name </th>
              <th> Email </th>
              <th> Mobile No </th>
              <th> Years </th>
              <th> Months </th>
              <th> Qualification </th>
              <th> Notice Period</th>
              <th> Roles Name</th>
              <th> View Resume</th>
              <!-- <th> Download resume</th> -->
              <th> Status</th>
              <th> Created_at</th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_team as $key => $data)
            <tr>
              <td> {{ $data->name }} </td>
              <td> {{ $data->email }} </td>
              <td> {{ $data->mobile }} </td>
              <td> {{ $data->year }} </td>
              <td> {{ $data->month }} </td>
              <td> {{ $data->qualification }} </td>
              <td> {{ $data->notice_period }} </td>
              <td> {{ $data->roles_name }} </td>
              <td><a href="{{url('viewresume',$data->id)}}"> {{ $data->resume }} </a></td>
              <!-- <td><a href="{{url('downloadresume',$data->resume)}}"> {{ $data->resume }} </a></td> -->
              <td> {{ $data->status }} </td>
              <td> {{ $data->created_at }} </td>
              <td>
                 <a class="btn btn-warning btn-sm" href="{{ route('resume.select',base64_encode(convert_uuencode($data->id))) }}"><i class='mdi mdi-table-edit' style='font-size:22px;color:red'></i>Select </a> <!-- Edit !-->
                 <a class="btn btn-danger btn-sm" href="{{ route('resume.reject',base64_encode(convert_uuencode($data->id))) }}"><i class='mdi mdi-table-edit' style='font-size:22px;color:red'></i> Reject</a> <!-- Delete !-->
                 <a class="btn btn-success btn-sm" href="{{ route('resume.delete',base64_encode(convert_uuencode($data->id))) }}"><i class='mdi mdi-table-edit' style='font-size:22px;color:red'></i> Delete</a> <!-- Delete !-->
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
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