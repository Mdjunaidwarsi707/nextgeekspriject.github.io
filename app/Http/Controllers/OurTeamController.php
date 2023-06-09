<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
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

class OurTeamController extends Controller
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
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function show(OurTeam $ourTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(OurTeam $ourTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurTeam $ourTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurTeam $ourTeam)
    {
        //
    }

    public function ourteam_form(Request $request)
    {
        return view('Our-Team.ourteam-form');
    }
    public function ourteam_create(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'required|email|unique:users,email',
            // 'mobile_no' => 'required|min:10|max:10|unique:users,mobile_no|',
            't_name' => 'required',
            't_role' => 'required',
            't_facebook' => 'required',
            't_twitter' => 'required',
            't_linkedin' => 'required',
            't_instagram' => 'required'
            // 't_image' => 'required'
        ]);
    
        $input = $request->all();
        $t_name=$input['t_name'];
        $t_role=$input['t_role'];
        $t_facebook=$input['t_facebook'];
        $t_twitter=$input['t_twitter'];
        $t_linkedin=$input['t_linkedin'];
        $t_instagram=$input['t_instagram'];

        $image = $request->file('image');
        
        $file_dest1 ='assets/Upload-Image/OurTeam-Image';
        $finalFilePath="OurTeam-".time().".".$image->getClientOriginalExtension();
        $image->move($file_dest1,$finalFilePath);

        OurTeam::create([
            't_name' => $t_name,
            't_role' => $t_role,
            't_facebook' => $t_facebook,
            't_twitter' => $t_twitter,
            't_linkedin' => $t_linkedin,
            't_image' => $finalFilePath,
            't_instagram' => $t_instagram
        ]);

        return redirect()->route('ourteam.form')
                        ->with('success','Our Team profiles created successfully.');
    }
    public function ourteam_view(Request $request)
    {
        $all_team = DB::table('our_teams')->get();

        return view('Our-Team.ourteam-view',compact('all_team'));
    }
    public function ourteam_edit(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $team_list = DB::table('our_teams')
            ->where('id','=',$id)
            ->get();
        
        return view('Our-Team.ourteam-edit',compact('team_list'));
    }
    public function ourteam_update(Request $request)
    {
        $input = $request->all();
        $t_name=$input['t_name'];
        $t_role=$input['t_role'];
        $t_facebook=$input['t_facebook'];
        $t_twitter=$input['t_twitter'];
        $t_linkedin=$input['t_linkedin'];
        $t_instagram=$input['t_instagram'];
        $image_id=$input['image_id'];

        $get_old_image = DB::table('our_teams')
          ->select('t_image')
          ->where('id','=',$image_id)
          ->first();
        $get_old_image_name=$get_old_image->t_image;

        if($request->hasfile('image'))
        {
          $image = $request->file('image');
          $imageName = "OurTeam-".time().".".$image->getClientOriginalExtension();
          $file_dest1 ='assets/Upload-Image/OurTeam-Image';
          $request->image->move($file_dest1, $imageName);

          $old_image_delete='assets/Upload-Image/OurTeam-Image/'.$get_old_image_name;
          if(File::exists($old_image_delete))
          {
            File::delete($old_image_delete);
          }
        }

        OurTeam::where('id','=', $image_id)->update([
            't_name' => $t_name,
            't_role' => $t_role,
            't_facebook' => $t_facebook,
            't_twitter' => $t_twitter,
            't_linkedin' => $t_linkedin,
            't_instagram' => $t_instagram,
            't_image'=>$imageName
            ]);

        return redirect()->route('ourteam.view')
                        ->with('success','Our Team profiles updated successfully.');
    }
    public function ourteam_delete(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $get_old_image = DB::table('our_teams')
          ->select('t_image')
          ->where('id','=',$id)
          ->first();
        $get_old_image_name=$get_old_image->t_image;
        
        $old_image_delete='assets/Upload-Image/OurTeam-Image/'.$get_old_image_name;
          if(File::exists($old_image_delete))
          {
            File::delete($old_image_delete);
          }

         $team_list_delete = DB::table('our_teams')
            ->where('id','=',$id)
            ->delete();

        return redirect()->route('ourteam.view')
                        ->with('success','Our Team profiles Delete successfully.');
    }



}
