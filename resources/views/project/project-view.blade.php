@extends('layouts.dashboard')

@section('content')
<div class="col-12 grid-margin">
  <div class="col-lg-12 margin-tb">
    <div class="pull-right">
      <a class="btn btn-primary btn-md" href="{{ route('project.form') }}">Create + </a>
    </div>
    <br>
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
        <h4 class="card-title">Project Details : </h4>
        </p>
        <table class="table table-striped">
          <thead style="color:darkblue;font-weight:bold;background: lightyellow;">
            <tr>
              <th> Project Logo </th>
              <th> Client Name </th>
              <th> Client Mobile </th>
              <th> Client Location </th>
              <th> Project Title </th>
              <th> Unique Title </th>
              <th> Description </th>
              <th> Technology </th>
              <th> Keywords </th>
              <th> Ratting </th>
              <th> Review Message </th>
              <th> Created_at </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_team as $key => $data)
            <tr>
              <td class="py-1">
                @if($data->pro_image == "")
                  <img src="{{ asset('assets/img/no-image.jpg')}}" alt="image" style="border-radius:5%;height:105px;width:105px;" />
                @else
                  <img style="border-radius:5%;height:105px;width:105px;" required name="image" id="output_image3" src="{{asset('assets/Upload-Image/Project-Logo/'.$data->pro_image)}}">     
                @endif
              </td>
              <td> {{ $data->pro_client_name }} </td>
              <td> {{ $data->pro_client_mobile }} </td>
              <td> {{ $data->pro_location }} </td>
              <td> {{ $data->pro_title }} </td>
              <td> {{ $data->slug }} </td>
              <td> {{ $data->pro_description }} </td>
              <td> {{ $data->pro_technology }} </td>
              <td> {{ $data->pro_keywords }} </td>
              <td> {{ $data->pro_review }} </td>
              <td> {{ $data->pro_text_message }} </td>
              <td> {{ $data->created_at }} </td>
              <td>
                 <a class="btn btn-info btn-sm" href="{{ route('project.edit',base64_encode(convert_uuencode($data->id))) }}"><i class='mdi mdi-table-edit' style='font-size:22px;color:red'></i>Edit </a> <!-- Edit !-->
                 <a class="btn btn-info btn-sm" href="{{ route('project.delete',base64_encode(convert_uuencode($data->id))) }}"><i class='mdi mdi-table-edit' style='font-size:22px;color:red'></i> Delete</a> <!-- Delete !-->
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