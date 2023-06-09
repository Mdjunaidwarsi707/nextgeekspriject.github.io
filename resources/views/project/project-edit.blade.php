@extends('layouts.dashboard')
<style type="text/css">
 /* Rating form start*/
*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */

/* Rating form end*/
/*Textarea Message */
.active-pink-textarea.md-form label.active {
  color: #f48fb1;
}
.pink-textarea textarea.md-textarea:focus:not([readonly]) {
  border-bottom: 1px solid #f48fb1;
  box-shadow: 0 1px 0 0 #f48fb1;
}
.pink-textarea.md-form .prefix.active {
  color: #f48fb1;
}
.active-pink-textarea.md-form textarea.md-textarea:focus:not([readonly])+label {
  color: #f48fb1;
}

.active-amber-textarea.md-form label.active {
  color: #ffa000;
}
.amber-textarea textarea.md-textarea:focus:not([readonly]) {
  border-bottom: 1px solid #ffa000;
  box-shadow: 0 1px 0 0 #ffa000;
}
.amber-textarea.md-form .prefix.active {
  color: #ffa000;
}
.active-amber-textarea.md-form textarea.md-textarea:focus:not([readonly])+label {
  color: #ffa000;
}

.active-pink-textarea-2 textarea.md-textarea {
  border-bottom: 1px solid #f48fb1;
  box-shadow: 0 1px 0 0 #f48fb1;
}
.active-pink-textarea-2.md-form label.active {
  color: #f48fb1;
}
.active-pink-textarea-2.md-form label {
  color: #f48fb1;
}
.active-pink-textarea-2.md-form .prefix {
  color: #f48fb1;
}
.active-pink-textarea-2.md-form textarea.md-textarea:focus:not([readonly])+label {
  color: #f48fb1;
}

.active-amber-textarea-2 textarea.md-textarea {
  border-bottom: 1px solid #ffa000;
  box-shadow: 0 1px 0 0 #ffa000;
}
.active-amber-textarea-2.md-form label.active {
  color: #ffa000;
}
.active-amber-textarea-2.md-form label {
  color: #ffa000;
}
.active-amber-textarea-2.md-form .prefix {
  color: #ffa000;
}
.active-amber-textarea-2.md-form textarea.md-textarea:focus:not([readonly])+label {
  color: #ffa000;
}
#image1 {
  border: 1px solid #ddd;
  border-radius: 10px;
  width: 105px;
  margin-right:1px;
  margin-bottom: 5px;
}

#image1:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
/*Textarea Message*/
 
</style>
@section('content')
<div class="col-12 grid-margin">
  <div class="col-lg-12 margin-tb">
    <div class="pull-right">
      <a class="btn btn-primary btn-md" href="{{ route('project.view') }}">View</a>
    </div>
    <br>
  </div>
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
  <div class="card">
    <div class="card-body">
      @foreach($team_list as $team_list)
      <form method="POST" action="{{ route('project.update') }}" enctype="multipart/form-data" >
        @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <input type="hidden" name="id" class="form-control" readonly="readonly" value="{{$team_list->id}}"  />
        <input type="hidden" name="old_slug" class="form-control" readonly="readonly" value="{{$team_list->slug}}"  />
        <p class="card-description"> <strong>Project Details Edit.</strong> </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label><strong>Client Name :</strong> </label><br>
              <div class="col-sm-12">
                <select class="form-select form-control" name="pro_client_name" required="required" >
                  <option value="{{$team_list->client_id}},{{$team_list->pro_client_name}},{{$team_list->pro_location}}">{{$team_list->pro_client_name}}</option>
                  <!-- <option selected value="">Select Client Name ... </option> -->
                  @foreach ($all_team as $key => $data)
                  <option value="{{$data->id}},{{$data->client_name}},{{$data->client_address}}">{{$data->client_name}}</option>
                   @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label><strong>Project Title :</strong> </label><br>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="pro_title" value="{{$team_list->pro_title}}"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label><strong>Project technology :</strong> </label><br>
              <div class="col-sm-12">
                <select class="form-select form-control" name="pro_technology" required="required" >
                  <option selected value="{{$team_list->pro_technology}}">{{$team_list->pro_technology}}</option>
                  <option value="Laravel">Laravel</option>
                  <option value="Drupal">Drupal</option>
                  <option value="Wordpress">Wordpress</option>
                  <option value="React">React</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label><strong>Project Keywords :</strong> </label><br>
              <div class="col-sm-12">
               <input type="text" class="form-control" name="pro_keywords" value="{{$team_list->pro_keywords}}">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <label><strong>Project description:</strong> </label><br>
              <div class="col-sm-12">
                <textarea class="form-control" name="pro_description" id="summernote">{!!$team_list->pro_description!!}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text">Overall (-)</span>
              <div class="rate"  style="background: black;">
                <!-- <input type="radio" id="star5" name="pro_review" required="required" value="5" /> -->
                <label for="star5" title="5">5 stars</label>
                <!-- <input type="radio" id="star4" name="pro_review" required="required" value="4" /> -->
                <label for="star4" title="4">4 stars</label>
                <!-- <input type="radio" id="star3" name="pro_review" required="required" value="3" /> -->
                <label for="star3" title="3">3 stars</label>
                <!-- <input type="radio" id="star2" name="pro_review" required="required" value="2" /> -->
                <label for="star2" title="2">2 stars</label>
                <!-- <input type="radio" id="star1.5" name="pro_review" required="required" value="1.5" /> -->
                <!-- <label for="star1" title="1.5">1.5 star</label> -->
                <!-- <input type="radio" id="star1" name="pro_review" required="required" value="1" /> -->
                <label for="star1" title="1">1 star</label>
            </div>
            </div>
                <div class="col-md-6">
                <div class="form-group row">
                  <label><strong>Star Ratting : <b style="color: green;letter-spacing: 2px;font-size: 18px;">  [  {{$team_list->pro_review}}  ]</b></strong> </label><br>
                  
                  <div class="col-sm-12">
                    <select class="form-select form-control" name="full_star" required="required" >
                      <option selected value="{{$team_list->pro_review}}">{{$team_list->pro_review}}</option>
                      <option value="1.0">One Star</option>
                      <option value="1.5">One Half Star</option>
                      <option value="2.0">Two Star</option>
                      <option value="2.5">Two Half Star</option>
                      <option value="3.0">Three Star</option>
                      <option value="3.5">Three Half Star</option>
                      <option value="4.0">Four Star</option>
                      <option value="4.5">Four Half Star</option>
                      <option value="5">Five Star</option>
                    </select>
                  </div>
                </div>
              </div>
             <!--  <div class="col-md-6">
              <div class="form-group row">
                <label><strong>Half Star Ratting :</strong> </label><br>
                <div class="col-sm-12">
                  <select class="form-select form-control" name="half_star" required="required" >
                    <option selected value="">Select Half Star ...</option>
                    <option value="0">Zero Half Star</option>
                    <option value="1">One Half Star</option>
                    <option value="2">Two Half Star</option>
                    <option value="3">Three Half Star</option>
                    <option value="4">Four Half Star</option>
                    <option value="5">Five Half Star</option>
                    <option value="6">Six Half Star</option>
                    <option value="7">Seven Half Star</option>
                    <option value="8">Eight Half Star</option>
                    <option value="9">Nine Half Star</option>
                  </select>
                </div>
              </div>
            </div> -->
          </div>
          <div class="col-md-6">
          <!--Textarea with icon prefix-->
            <div class="md-form amber-textarea active-amber-textarea-2">
              <i class="fas fa-pencil-alt prefix"></i>
              <textarea id="form24" class="md-textarea form-control" name="text_message" rows="5" required="required">{!!$team_list->pro_text_message!!}</textarea>
              <label for="form24">Write Review Message here...</label>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6 form-group" style="background: ;">
              @if($team_list->pro_image == "")
                <img src="{{ asset('assets/img/no-image.jpg')}}" alt="image" style="border-radius:10%;height:155px;width:155px;" />
              @else
              <img style="border-radius:10%;height:155px;width:155px;"  name="image" id="output_image3" src="{{asset('assets/Upload-Image/Project-Logo/'.$team_list->pro_image)}}">
              @endif
              <br><br>
              <input type="file" accept="image/*" name="image" onchange="preview_image3(event)" class="btn btn-success"  style="width: 100%">
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