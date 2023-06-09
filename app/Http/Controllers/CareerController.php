<?php

namespace App\Http\Controllers;

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

class CareerController extends Controller
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
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        //
    }

    public function career_form(Request $request)
    {
        return view('Career.career-form');
    }
    public function career_create(Request $request)
    {
        $this->validate($request, [
            'role_name' => 'required',
            'qualification' => 'required',
            'job_location' => 'required',
            'experience' => 'required',
            'Skills' => 'required',
            'annual_salary' => 'required'
        ]);
    
        $input = $request->all();
        $role_name=$input['role_name'];
        $qualification=$input['qualification'];
        $joblocation=$input['job_location'];
        $experience=$input['experience'];
        $Skills=$input['Skills'];
        $annual_salary=$input['annual_salary'];

        Career::create([
            'role_name' => $role_name,
            'qualification' => $qualification,
            'job_location' => $joblocation,
            'experience' => $experience,
            'Skills' => $Skills,
            'annual_salary' => $annual_salary,
        ]);

        return redirect()->route('career.form')
                        ->with('success','Career Opportunity created successfully.');
    }
    public function career_view(Request $request)
    {
        $all_team = DB::table('careers')->get();

        return view('Career.career-view',compact('all_team'));
    }
    public function career_edit(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $team_list = DB::table('careers')
            ->where('id','=',$id)
            ->get();
        
        return view('Career.career-edit',compact('team_list'));
    }
    public function career_update(Request $request)
    {
        $input = $request->all();
        $role_name=$input['role_name'];
        $qualification=$input['qualification'];
        $job_location=$input['job_location'];
        $experience=$input['experience'];
        $Skills=$input['Skills'];
        $annual_salary=$input['annual_salary'];

        $id=$input['id'];

        Career::where('id','=', $id)->update([
            'role_name' => $role_name,
            'qualification' => $qualification,
            'job_location' => $job_location,
            'experience' => $experience,
            'Skills' => $Skills,
            'annual_salary' => $annual_salary,
            ]);

        return redirect()->route('career.view')
                        ->with('success','Career Opportunity updated successfully.');
    }
    public function career_delete(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        
        $team_list_delete = DB::table('careers')
            ->where('id','=',$id)
            ->delete();

        return redirect()->route('career.view')
                        ->with('success','Career Opportunity Delete successfully.');
    }
}
