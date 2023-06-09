<?php

namespace App\Http\Controllers;

use App\Models\WriteReview;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
// use DB;
// use Hash;
use Illuminate\Support\Arr;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Session;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

date_default_timezone_set('Asia/Kolkata');

class WriteReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WriteReview  $writeReview
     * @return \Illuminate\Http\Response
     */
    public function show(WriteReview $writeReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WriteReview  $writeReview
     * @return \Illuminate\Http\Response
     */
    public function edit(WriteReview $writeReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WriteReview  $writeReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WriteReview $writeReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WriteReview  $writeReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(WriteReview $writeReview)
    {
        //
    }
    public function review_create(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'required|email|unique:users,email',
            // 'mobile_no' => 'required|min:10|max:10|unique:users,mobile_no|',
            // 'r_client_id' => 'required',
            // 'r_clientname' => 'required',
            // // 'r_client_mobile' => 'required|max:10|min:10',
            // 'r_project_id' => 'required',
            'r_firstname' => 'required',
            'r_lastname' => 'required',
            'r_message' => 'required',
            'r_review' => 'required',
            'r_mobile' => 'required|max:10|min:10'
        ]);
    
        $input = $request->all();
        $client_id=$input['client_id'];
        $pro_client_name=$input['pro_client_name'];
        $pro_client_mobile=$input['pro_client_mobile'];
        $pro_id=$input['pro_id'];
        $pro_title=$input['pro_title'];
        $r_firstname=$input['r_firstname'];
        $r_lastname=$input['r_lastname'];
        $r_mobile=$input['r_mobile'];
        $r_review=$input['r_review'];
        $r_message=$input['r_message'];

        $client_id1=convert_uudecode(base64_decode($client_id));
        $pro_client_name1=convert_uudecode(base64_decode($pro_client_name));
        $pro_id1=convert_uudecode(base64_decode($pro_id));
        $pro_title1=convert_uudecode(base64_decode($pro_title));
        $pro_client_mobile1=convert_uudecode(base64_decode($pro_client_mobile));

        WriteReview::create([
            'r_client_id' => $client_id1,
            'r_project_id' => $pro_id1,
            'r_client_mobile' => $pro_client_mobile1,
            'r_clientname' => $pro_client_name1,
            'r_project_title' => $pro_title1,
            'r_firstname' => $r_firstname,
            'r_mobile' => $r_mobile,
            'r_lastname' => $r_lastname,
            'r_review' => $r_review,
            'r_message' => $r_message,
              ]);

        $Ratting_count=DB::table('write_reviews')
             ->where('r_client_id','=',$client_id1)
             ->where('r_project_id','=',$pro_id1)
             ->Count();

        $SumofRating=DB::table("write_reviews")
              ->where('r_client_id','=',$client_id1)
              ->where('r_project_id','=',$pro_id1)
              ->get()
              ->sum("r_review");

        if($Ratting_count == 0 || $SumofRating == 0){
            $Avg_Rating=0;
          }else{
            $Avg_Rating = $SumofRating / $Ratting_count;
            $AvgRating = number_format($Avg_Rating, 2);

          }

        DB::table('project_details')
            ->where('client_id','=',$client_id1)
            ->where('id','=',$pro_id1)
            ->update([
                    'total_review'=>$Ratting_count,
                    'avg_review'=>$AvgRating,
                        ]);

        return redirect()->back()
                        ->with('success','Review create successfull.');
    }
}
