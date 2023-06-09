<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
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

class TestimonialController extends Controller
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
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }

    public function testimonial_form(Request $request)
    {
        return view('Testimonial.testimonial-form');
    }
    public function testimonial_create(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'required|email|unique:users,email',
            // 'mobile_no' => 'required|min:10|max:10|unique:users,mobile_no|',
            'test_name' => 'required',
            'test_role' => 'required',
            'test_message' => 'required'
            // 'test_image' => 'required'
        ]);
    
        $input = $request->all();
        $test_name=$input['test_name'];
        $test_role=$input['test_role'];
        $test_message=$input['test_message'];

        $image = $request->file('image');
        
        $file_dest1 ='assets/Upload-Image/Testimonial-Image';
        $finalFilePath="Testimonial-".time().".".$image->getClientOriginalExtension();
        $image->move($file_dest1,$finalFilePath);

        Testimonial::create([
            'test_name' => $test_name,
            'test_role' => $test_role,
            'test_message' => $test_message,
            'test_image' => $finalFilePath,
        ]);

        return redirect()->route('testimonial.form')
                        ->with('success','Testimonials profiles created successfully.');
    }
    public function testimonial_view(Request $request)
    {
        $all_team = DB::table('testimonials')->get();

        return view('Testimonial.testimonial-view',compact('all_team'));
    }
    public function testimonial_edit(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $team_list = DB::table('testimonials')
            ->where('id','=',$id)
            ->get();
        
        return view('Testimonial.testimonial-edit',compact('team_list'));
    }
    public function testimonial_update(Request $request)
    {
        $input = $request->all();
        $test_name=$input['test_name'];
        $test_role=$input['test_role'];
        $test_message=$input['test_message'];
        $image_id=$input['image_id'];

        $get_old_image = DB::table('testimonials')
          ->select('test_image')
          ->where('id','=',$image_id)
          ->first();
        $get_old_image_name=$get_old_image->test_image;

        if($request->hasfile('image'))
        {
          $image = $request->file('image');
          $imageName = "Testimonial-".time().".".$image->getClientOriginalExtension();
          $file_dest1 ='assets/Upload-Image/Testimonial-Image';
          $request->image->move($file_dest1, $imageName);

          $old_image_delete='assets/Upload-Image/Testimonial-Image/'.$get_old_image_name;
          if(File::exists($old_image_delete))
          {
            File::delete($old_image_delete);
          }
        }

        Testimonial::where('id','=', $image_id)->update([
            'test_name' => $test_name,
            'test_role' => $test_role,
            'test_message' => $test_message,
            'test_image'=>$imageName
            ]);

        return redirect()->route('testimonial.view')
                        ->with('success','Testimonials profiles updated successfully.');
    }
    public function testimonial_delete(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $get_old_image = DB::table('testimonials')
          ->select('test_image')
          ->where('id','=',$id)
          ->first();
        $get_old_image_name=$get_old_image->test_image;
        
        $old_image_delete='assets/Upload-Image/Testimonial-Image/'.$get_old_image_name;
          if(File::exists($old_image_delete))
          {
            File::delete($old_image_delete);
          }

         $team_list_delete = DB::table('testimonials')
            ->where('id','=',$id)
            ->delete();

        return redirect()->route('testimonial.view')
                        ->with('success','Testimonials profiles Delete successfully.');
    }
}
