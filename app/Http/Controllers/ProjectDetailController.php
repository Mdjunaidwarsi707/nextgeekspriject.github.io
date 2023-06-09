<?php

namespace App\Http\Controllers;

use App\Models\ProjectDetail;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
// use DB;
// use Hash;
use Illuminate\Support\Arr;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

use Session;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

date_default_timezone_set('Asia/Kolkata');

class ProjectDetailController extends Controller
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
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectDetail $projectDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectDetail $projectDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectDetail $projectDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectDetail $projectDetail)
    {
        //
    }
    public function project_form(Request $request)
    {
        $all_team = DB::table('clients')->get();

        return view('project.project-form',compact('all_team'));
    }
    public function project_create(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'required|email|unique:users,email',
            // 'mobile_no' => 'required|min:10|max:10|unique:users,mobile_no|',
            'pro_title' => 'required',
            'pro_description' => 'required',
            'pro_client_name' => 'required',
            'pro_technology' => 'required',
            'pro_keywords' => 'required'
            // 'image' => 'required',
            // 'image' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx|min:1'
        ]);
    
        $input = $request->all();
        $pro_title=ucwords(strtolower($input['pro_title']));
        $slug = Str::slug($pro_title,'-');
        $pro_description=$input['pro_description'];
        $pro_client=$input['pro_client_name'];
        $pro_technology=$input['pro_technology'];
        $pro_keywords=$input['pro_keywords'];
        $full_star=$input['full_star'];
        // $half_star=$input['half_star'];
        $pro_text_message=$input['text_message'];
        // $total_review=$full_star.'.'.$half_star;
        $client_part=explode(',',$pro_client);
        $client_id=$client_part['0'];
        $client_name=$client_part['1'];
        $client_location=$client_part['2'];
        $client_mobile=$client_part['3'];

        $image = $request->file('pro_image');
        $file_dest1 ='assets/Upload-Image/Project-Logo';
        $finalFilePath="Project-".time().".".$image->getClientOriginalExtension();
        $image->move($file_dest1,$finalFilePath);

        // $random=rand(1,9);
        // $random_slug=$slug.'-'.$random;
        // $check_slug = ProjectDetail::where('slug', '=', $random_slug)->pluck('slug')->first();
        
        
        
        // if($check_slug != $random_slug){
        //   ProjectDetail::create([
        //     'client_id' => $client_id,
        //     'pro_title' => $pro_title,
        //     'slug' => $slug,
        //     'pro_description' => $pro_description,
        //     'pro_client_name' => $client_name,
        //     'pro_client_mobile' => $client_mobile,
        //     'pro_location' => $client_location,
        //     'pro_technology' => $pro_technology,
        //     'pro_keywords' => $pro_keywords,
        //     'pro_review' => $full_star,
        //     'pro_text_message' => $pro_text_message,
        //     'pro_image' => $finalFilePath
        //    ]);
        //   return redirect()->route('project.form')
        //                 ->with('success','New Project successfully created ! Slug.');

        // }else{
          ProjectDetail::create([
            'client_id' => $client_id,
            'pro_title' => $pro_title,
            'slug' => $slug,
            'pro_description' => $pro_description,
            'pro_client_name' => $client_name,
            'pro_client_mobile' => $client_mobile,
            'pro_location' => $client_location,
            'pro_technology' => $pro_technology,
            'pro_keywords' => $pro_keywords,
            'pro_review' => $full_star,
            'pro_text_message' => $pro_text_message,
            'pro_image' => $finalFilePath
          ]);
          return redirect()->route('project.form')
                        ->with('success','New Project successfully created.');
        // }

        
    }
    public function project_view(Request $request)
    {
        $all_team = DB::table('project_details')->get();

        return view('project.project-view',compact('all_team'));
    }
    public function project_edit(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $team_list = DB::table('project_details')
            ->where('id','=',$id)
            ->get();
        $all_team = DB::table('clients')->get();
        
        return view('project.project-edit',compact('team_list','all_team'));
    }
    public function project_update(Request $request)
    {
        $input = $request->all();
        $id=$input['id'];

        // $pro_title=$input['pro_title'];
        $pro_title=ucwords(strtolower($input['pro_title']));
        $old_slug=$input['old_slug'];
        $slug = Str::slug($pro_title,'-');
        $pro_description=$input['pro_description'];
        $pro_client=$input['pro_client_name'];
        $pro_technology=$input['pro_technology'];
        $pro_keywords=$input['pro_keywords'];
        $full_star=$input['full_star'];
        $pro_text_message=$input['text_message'];

        $client_part=explode(',',$pro_client);
        $client_id=$client_part['0'];
        $client_name=$client_part['1'];
        $client_location=$client_part['2'];

        $old_title_name = DB::table('project_details')
          ->select('pro_title')
          ->where('id','=',$id)
          ->first();
        $old_title_name_db=$old_title_name->pro_title;

        $title_name=0;
        $mobile_no = DB::table('project_details')
          ->where('pro_title',$pro_title)
          ->get();
          foreach($mobile_no as $mobile_nos){
          $title_name = $mobile_nos->pro_title;
          }
         
        if($pro_title==$old_title_name_db){
            $get_old_slug = DB::table('project_details')
              ->select('slug')
              ->where('id','=',$id)
              ->first();
            $old_slug_name_db=$get_old_slug->slug;

              if($old_slug==$old_slug_name_db){
                ProjectDetail::where('id','=', $id)->update([
                'client_id' => $client_id,
                'pro_description' => $pro_description,
                'pro_client_name' => $client_name,
                'pro_location' => $client_location,
                'pro_technology' => $pro_technology,
                'pro_keywords' => $pro_keywords,
                'pro_review' => $full_star,
                'pro_text_message' => $pro_text_message
                ]);
                return redirect()->route('project.view')
                        ->with('success','Project Details Updated.');
              }
          }
          elseif($pro_title!==$title_name){
            $get_old_slug = DB::table('project_details')
              ->select('slug')
              ->where('id','=',$id)
              ->first();
            $old_slug_name_db=$get_old_slug->slug;
            $skip_value=1;
            $create_slug=$slug.'-'.$skip_value;
            
            ProjectDetail::where('id','=', $id)->update([
              'client_id' => $client_id,
              'pro_title' => $pro_title,
              'slug' => $create_slug,
              'pro_description' => $pro_description,
              'pro_client_name' => $client_name,
              'pro_location' => $client_location,
              'pro_technology' => $pro_technology,
              'pro_keywords' => $pro_keywords,
              'pro_review' => $full_star,
              'pro_text_message' => $pro_text_message
              ]);
            return redirect()->route('project.view')
                    ->with('success','Project details updated with new slug id.');
          }else{
            $match_slug_name = DB::table('project_details')
              ->select('slug')
              ->where('pro_title','=',$pro_title)
              ->orderBy('slug', 'DESC')
              ->latest()
              ->first();
            $match_slug_name_db=$match_slug_name->slug;
            
            $string = $match_slug_name_db;
            $exploded = explode('-', $string);
            $last_index_value=end($exploded);
            $skip_index_value=$last_index_value+1;
            $new_slug=$slug.'-'.$skip_index_value;

            ProjectDetail::where('id','=', $id)->update([
                'client_id' => $client_id,
                'pro_title' => $pro_title,
                'slug' => $new_slug,
                'pro_description' => $pro_description,
                'pro_client_name' => $client_name,
                'pro_location' => $client_location,
                'pro_technology' => $pro_technology,
                'pro_keywords' => $pro_keywords,
                'pro_review' => $full_star,
                'pro_text_message' => $pro_text_message
                ]);
            return redirect()->route('project.view')
                        ->with('success','Project Details Updated increment slug Id.');
          }
    }
    // public function project_update(Request $request)
    // {
    //     $input = $request->all();
    //     $id=$input['id'];

    //     $pro_title=$input['pro_title'];
    //     $slug = Str::slug($pro_title,'-');
    //     $pro_description=$input['pro_description'];
    //     $pro_client=$input['pro_client_name'];
    //     $pro_technology=$input['pro_technology'];
    //     $pro_keywords=$input['pro_keywords'];
    //     $full_star=$input['full_star'];
    //     $pro_text_message=$input['text_message'];

    //     $client_part=explode(',',$pro_client);
    //     $client_id=$client_part['0'];
    //     $client_name=$client_part['1'];
    //     $client_location=$client_part['2'];

    //     $get_old_slug = DB::table('project_details')
    //       ->select('slug')
    //       ->where('id','=',$id)
    //       ->first();
    //     $get_old_slug_name=$get_old_slug->slug;
        
    //     $string = $get_old_slug_name;
    //     $exploded = explode('-', $string);
    //     $last_index_value=end($exploded);
    //     // print_r($last_index_value);
    //     // echo $last_index_value;
        
    //     $skip=$last_index_value + 1;
    //     $skip1=$slug.'-'.$skip;
    //     print_r($skip);
    //     print_r($skip1);
    //     $one=1;
    //     $new_slug=$slug.'-'.$one;
                
    //     $get_old_image = DB::table('project_details')
    //       ->select('pro_image')
    //       ->where('id','=',$id)
    //       ->first();
    //     $get_old_image_name=$get_old_image->pro_image;

    //     if($request->hasfile('image'))
    //     {
    //       $image = $request->file('image');
    //       $imageName = "Project-".time().".".$image->getClientOriginalExtension();
    //       $file_dest1 ='assets/Upload-Image/Project-Logo';
    //       $request->image->move($file_dest1, $imageName);

    //       $old_image_delete='assets/Upload-Image/Project-Logo/'.$get_old_image_name;
    //       if(File::exists($old_image_delete))
    //       {
    //         File::delete($old_image_delete);
    //       }
    //     }

    //     if (ProjectDetail::where('slug', $get_old_slug_name)->exists()){
    //         ProjectDetail::where('id','=', $id)->update([
    //         'client_id' => $client_id,
    //         'pro_title' => $pro_title,
    //         'slug' => $get_old_slug_name,
    //         'pro_description' => $pro_description,
    //         'pro_client_name' => $client_name,
    //         'pro_location' => $client_location,
    //         'pro_technology' => $pro_technology,
    //         'pro_keywords' => $pro_keywords,
    //         'pro_review' => $full_star,
    //         'pro_text_message' => $pro_text_message,
    //         'pro_image' => $imageName
    //         ]);

    //         return redirect()->route('project.view')
    //                     ->with('success','Project Details successfully updated SLUG EXITS.');
    //       }else{
    //         ProjectDetail::where('id','=', $id)->update([
    //         'client_id' => $client_id,
    //         'pro_title' => $pro_title,
    //         'slug' => $new_slug,
    //         'pro_description' => $pro_description,
    //         'pro_client_name' => $client_name,
    //         'pro_location' => $client_location,
    //         'pro_technology' => $pro_technology,
    //         'pro_keywords' => $pro_keywords,
    //         'pro_review' => $full_star,
    //         'pro_text_message' => $pro_text_message,
    //         'pro_image' => $imageName
    //         ]);

    //         return redirect()->route('project.view')
    //                     ->with('success','Project Details successfully updated New Slug.');
    //       }

    //     return redirect()->route('project.view')
    //                     ->with('success','Project Details successfully updated.');
    // }
    public function project_delete(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $get_old_image = DB::table('project_details')
          ->select('pro_image')
          ->where('id','=',$id)
          ->first();
        $get_old_image_name=$get_old_image->pro_image;
        
        $old_image_delete='assets/Upload-Image/Project-Logo/'.$get_old_image_name;
          if(File::exists($old_image_delete))
          {
            File::delete($old_image_delete);
          }

         $team_list_delete = DB::table('project_details')
            ->where('id','=',$id)
            ->delete();

        return redirect()->route('project.view')
                        ->with('success','Project Details successfully Delete.');
    }
}
