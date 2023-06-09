<?php

namespace App\Http\Controllers;

use App\Models\ApplyForm;
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
// For download file
use Illuminate\Support\Facades\storage;

use App\Notifications\CarrersNotification;
use Illuminate\Support\Facades\Mail;
class ApplyFormController extends Controller
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
     * @param  \App\Models\ApplyForm  $applyForm
     * @return \Illuminate\Http\Response
     */
    public function show(ApplyForm $applyForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApplyForm  $applyForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplyForm $applyForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ApplyForm  $applyForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplyForm $applyForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApplyForm  $applyForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplyForm $applyForm)
    {
        //
    }

    public function resume_form(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'required|email|unique:users,email',
            // 'mobile_no' => 'required|min:10|max:10|unique:users,mobile_no|',
            'roles_id' => 'required',
            'roles_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'year' => 'required',
            'month' => 'required',
            'qualification' => 'required',
            'notice_period' => 'required',
            'file' => 'mimes:pdf|min:1'
        ]);
    
        $input = $request->all();
        $roles_id=$input['roles_id'];
        $roles_name=$input['roles_name'];
        $name=$input['name'];
        $email=$input['email'];
        $mobile=$input['mobile'];
        $year=$input['year'];
        $month=$input['month'];
        $qualification=$input['qualification'];
        $notice_period=$input['notice_period'];
        $status='Process';

        $file = $request->file('file');
        
        $file_dest1 ='assets/Upload-Image/Resume-Apply';
        $finalFilePath="Resume-".time().".".$file->getClientOriginalExtension();
        $file->move($file_dest1,$finalFilePath);

        $time=time();

         $randomNumber=rand(100000,999999);
         $order_name="Career-ID-".$time;
         $tracking_id=$randomNumber.'-'.$order_name;

        ApplyForm::create([
            'roles_id' => $roles_id,
            'roles_name' => $roles_name,
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'year' => $year,
            'month' => $month,
            'qualification' => $qualification,
            'notice_period' => $notice_period,
            'resume' => $finalFilePath,
            'status' => $status,
            'career_tracking' => $tracking_id
        ]);

        $last_id= DB::table('apply_forms')
            ->where('career_tracking','=',$tracking_id)
            ->first();
        $get_last_id=$last_id->id;

        $User=ApplyForm::find($get_last_id);
       
        $User->notify(new CarrersNotification($User));

        return redirect()->back()
                        ->with('success','Your Resume is successfull submitted, Company Hr contact you soon as soon.');
    }
    public function resume_view(Request $request)
    {
        $all_team = DB::table('apply_forms')->get();

        return view('Resume-Apply.resume-view',compact('all_team'));
    }
    public function resume_select(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $team_list = DB::table('apply_forms')
            ->where('id','=',$id)
            ->get();
        $status='Accept';
        ApplyForm::where('id','=', $id)->update([
            'status' => $status
            ]);

        return redirect()->route('resume.view')
                        ->with('success','Resume Select successfully.');
        
    }
    public function resume_reject(Request $request,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $team_list = DB::table('apply_forms')
            ->where('id','=',$id)
            ->get();
        $status='Reject';
        ApplyForm::where('id','=', $id)->update([
            'status' => $status
            ]);

        return redirect()->route('resume.view')
                        ->with('success','Resume Reject successfully.');
    }
    public function resume_delete(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));

        ApplyForm::where('id','=', $id)
            // ->where('id','=',$id)
            ->delete();

        return redirect()->route('resume.view')
                        ->with('success','Resume Delete successfully.');
    }
    public function downloadresume(Request $request,$resume)
    {
       return response()->download(public_path('assets/Upload-Image/Resume-Apply/'.$resume));
    }

    public function viewresume(Request $request,$id )
    {
        $data=ApplyForm::find($id);
        return view('Resume-Apply.resumedisplay',compact('data'));
    }
}
