<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\User;
use App\Models\Career;

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

use App\Notifications\SumSolsNotification;
use Illuminate\Support\Facades\Mail;


class ContactUsController extends Controller
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
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }

    public function contact_create(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'required|email|unique:users,email',
            // 'mobile_no' => 'required|min:10|max:10|unique:users,mobile_no|',
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|min:10|max:10',
            'subject' => 'required',
            'message' => 'required'
        ]);
    
        $input = $request->all();
        $name=$input['name'];
        $email=$input['email'];
        $mobile=$input['mobile'];
        $subject=$input['subject'];
        $message=$input['message'];
        $time=time();

         $randomNumber=rand(100000,999999);
         $order_name="Contact-ID-".$time;
         $tracking_id=$randomNumber.'-'.$order_name;

        $contact=ContactUs::create([
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'subject' => $subject,
            'message' => $message,
            'tracking_id' => $tracking_id,
        ]);

        $last_id= DB::table('contact_us')
            ->where('tracking_id','=',$tracking_id)
            ->first();
        $get_last_id=$last_id->id;

        $User=ContactUs::find($get_last_id);
       
        $User->notify(new SumSolsNotification($User));

        return redirect()->route('contact')
                        ->with('success','ContactUs created successfully.');
    }
    public function contact_view(Request $request)
    {
        $all_team = DB::table('contact_us')->get();

        return view('ContactUs.contact-view',compact('all_team'));
    }
    public function contact_edit(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $team_list = DB::table('contact_us')
            ->where('id','=',$id)
            ->get();
        
        return view('ContactUs.contact-edit',compact('team_list'));
    }
    public function contact_update(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'required|email|unique:users,email',
            // 'mobile_no' => 'required|min:10|max:10|unique:users,mobile_no|',
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|min:10|max:10',
            'subject' => 'required',
            'message' => 'required'
        ]);
        
        $input = $request->all();
        $name=$input['name'];
        $email=$input['email'];
        $mobile=$input['mobile'];
        $subject=$input['subject'];
        $message=$input['message'];

        $id=$input['id'];

        ContactUs::where('id','=', $id)->update([
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'subject' => $subject,
            'message' => $message
            ]);

        return redirect()->route('contact.view')
                        ->with('success','ContactUs updated successfully.');
    }
    public function contact_delete(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        
        $team_list_delete = DB::table('contact_us')
            ->where('id','=',$id)
            ->delete();

        return redirect()->route('contact.view')
                        ->with('success','ContactUs Delete successfully.');
    }
    
}
