@extends('home_index.header')
@section('content')
<br><br>
<main id="main" style="position:relative;margin-top:40px;">
  <div class="container">
    <div class="col-md-8">
      @if (count($errors) > 0)
        <div class="alert alert-danger" id="error-message">
          <strong>Whoops!</strong> There were some problems with your input.<br>
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
  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">
        <center style="color:gold;font-family: italic;font-size:25px;font-weight: bold;letter-spacing:3px;">
        @foreach($apply as $data)
        <label>Apply - {{$data->role_name}} </label>
        @endforeach
        </center>
      <div class="row no-gutters">
        @foreach($apply as $career)
        <div class="col-lg-6 col-md-12 ">
          <label><h3>Job Description</h3></label>
          <div class="count-box" >
            <i class="bi bi-people"></i>
            <h4>&nbsp;  {{$career->role_name}} </h4><span style="font-size: 15px;float: right;">Post - {{$career->created_at}}</span><hr>
            <p><strong>Qualification : </strong>{{$career->qualification}}<br> 
            <strong>Job Location : </strong>{{$career->job_location}}<br>
            <strong>Experience : </strong> {{$career->experience}}<br>
            <strong>Skills : </strong>{{$career->Skills}}<br>
            <strong>Annual Salary : </strong> {{$career->annual_salary}}</p>
            <a href="##">Check &raquo;</a><hr>
          </div><br>
        </div>
        @endforeach
        <div class="col-lg-6 col-md-12 ">
          <label><h3>Fill below form to Apply the Job</h3></label>

          <div class="card">
            <div class="card-body count-box">
              <div class="col-lg-12">
                <form class="row g-3" method="post" action="{{ route('resume.form') }}" enctype="multipart/form-data" >
                  @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                   @foreach($apply as $record)
                    <input type="hidden" class="form-control" name="roles_id" value="{{$record->id}}">
                    <input type="text" class="form-control" readonly="readonly" name="roles_name" value="{{$record->role_name}}">
                   @endforeach
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Your Name *</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Your Email * </label>
                    <input type="email" class="form-control" name="email">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Phone Nubmer * </label>
                    <input type="text" maxlength="10" class="form-control" name="mobile">
                  </div>
                  <label for="inputState" class="form-label">Experience *</label><br>
                  <div class="col-md-6">
                    <label for="inputState" class="form-label">Years</label>
                    <select id="inputState" class="form-select" name="year">
                      <option selected>Years...</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="inputState" class="form-label">Months</label>
                    <select id="inputState" class="form-select" name="month">
                      <option selected>Months...</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Qualification</label>
                    <select id="inputState" class="form-select" name="qualification">
                      <option selected>Choose...</option>
                      <option value="Any Graduate">Any Graduate</option>
                      <option value="B.A">B.A</option>
                      <option value="B.SC">B.Sc</option>
                      <option value="B.COM">B.COM</option>
                      <option value="B.TECH">B.TECH</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Notice Period *</label>
                    <select id="inputState" class="form-select" name="notice_period">
                      <option selected>Choose...</option>
                      <option value="0">0 Days</option>
                      <option value="7">7 Days</option>
                      <option value="15">15 Days</option>
                      <option value="30">30 Days</option>
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-md-12"><br><br>
                        <label><strong>Resume Upload :</strong> </label><br>
                      <div class="col-md-12 form-group" style="background: ;">
                        <input type="file" accept="" name="file" required class="btn btn-info"  style="width: 100%">
                      </div>
                      <a style="color: red;">(Only PDF Resume Allowed)</a>
                    </div>
                  </div>

                  <div class="col-12"><br>
                    <button type="submit" class="btn btn-primary btn-success">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Counts Section -->

</main><!-- End #main -->

  
@endsection
@section('script')
<script>
  setTimeout(function(){
       $("#success-message").fadeOut();
       $("#error-message").fadeOut();
      },5000);
</script>
@endsection