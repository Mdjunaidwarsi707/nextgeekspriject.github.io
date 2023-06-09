@extends('layouts.dashboard')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a style="color: darkblue;font-family:italic;font-weight:bold;letter-spacing:2px;font-size:19px;">{{$data->name}}</a> &nbsp;&nbsp;<a style="color:black;font-family:italic;font-weight:bold;letter-spacing:2px;font-size:19px;">{{$data->mobile}}</a>
			 <br>
			<a style="color:blue;font-family:italic;font-weight:bold;letter-spacing:2px;font-size:19px;">Role: {{$data->roles_name}}</a>&nbsp;&nbsp;<a class="btn btn-primary btn-sm" href="{{ route('resume.view') }}">Go Back </a>
        </div>
        <div class="col-md-12">
	        <iframe src="{{asset('assets/Upload-Image/Resume-Apply/'.$data->resume)}}" style="height:650px;width: 100%;"></iframe>
	    </div>
	</div>
</div>
@endsection