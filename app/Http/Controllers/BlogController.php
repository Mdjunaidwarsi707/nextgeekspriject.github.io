<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
use Illuminate\Support\Str;

date_default_timezone_set('Asia/Kolkata');

class BlogController extends Controller
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
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function blogs_form(Request $request)
    {
        return view('Blogs.blog-form');
    }
    public function blogs_create(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'required|email|unique:users,email',
            // 'mobile_no' => 'required|min:10|max:10|unique:users,mobile_no|',
            'bg_title' => 'required',
            'bg_content' => 'required'
            // 'image' => 'required',
            // 'image' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx|min:1'
        ]);
    
        $input = $request->all();
        // $bg_title=$input['bg_title'];
        $bg_title=ucwords(strtolower($input['bg_title']));
        $slug = Str::slug($bg_title,'-');
        $bg_content=$input['bg_content'];

        $image = $request->file('image');
        
        $file_dest1 ='assets/Upload-Image/Blogs-Image';
        $finalFilePath="Blogs-".time().".".$image->getClientOriginalExtension();
        $image->move($file_dest1,$finalFilePath);

        Blog::create([
            'bg_title' => $bg_title,
            'slug' => $slug,
            'bg_content' => $bg_content,
            'bg_image' => $finalFilePath
        ]);

        return redirect()->route('blogs.form')
                        ->with('success','Our Blogs Content created successfully.');
    }
    public function blogs_view(Request $request)
    {
        $all_team = DB::table('blogs')->get();

        return view('Blogs.blog-view',compact('all_team'));
    }
    public function blogs_edit(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $team_list = DB::table('blogs')
            ->where('id','=',$id)
            ->get();
        
        return view('Blogs.blog-edit',compact('team_list'));
    }
    public function blogs_update(Request $request)
    {
        $input = $request->all();
        // $bg_title=$input['bg_title'];
        $bg_title=ucwords(strtolower($input['bg_title']));
        $slug = Str::slug($bg_title,'-');
        $old_slug=$input['old_slug'];
        $bg_content=$input['bg_content'];
        $id=$input['id'];

        $get_old_image = DB::table('blogs')
          ->select('bg_image')
          ->where('id','=',$id)
          ->first();
        $get_old_image_name=$get_old_image->bg_image;

        if($request->hasfile('image'))
        {
          $image = $request->file('image');
          $imageName = "Blogs-".time().".".$image->getClientOriginalExtension();
          $file_dest1 ='assets/Upload-Image/Blogs-Image';
          $request->image->move($file_dest1, $imageName);

          $old_image_delete='assets/Upload-Image/Blogs-Image/'.$get_old_image_name;
          if(File::exists($old_image_delete))
          {
            File::delete($old_image_delete);
          }
        }

        

        $old_title_name = DB::table('blogs')
          ->select('bg_title')
          ->where('id','=',$id)
          ->first();
        $old_title_name_db=$old_title_name->bg_title;

        $title_name=0;
        $mobile_no = DB::table('blogs')
          ->where('bg_title',$bg_title)
          ->get();
          foreach($mobile_no as $mobile_nos){
          $title_name = $mobile_nos->bg_title;
          }
         
        if($bg_title==$old_title_name_db){
            $get_old_slug = DB::table('blogs')
              ->select('slug')
              ->where('id','=',$id)
              ->first();
            $old_slug_name_db=$get_old_slug->slug;

              if($old_slug==$old_slug_name_db){
                Blog::where('id','=', $id)->update([
                    'bg_title' => $bg_title,
                    'bg_content' => $bg_content,
                    'bg_image'=>$imageName
                    ]);
                return redirect()->route('blogs.view')
                        ->with('success','Our Blogs Content Updated.');
              }
          }
          elseif($bg_title!==$title_name){
            $get_old_slug = DB::table('blogs')
              ->select('slug')
              ->where('id','=',$id)
              ->first();
            $old_slug_name_db=$get_old_slug->slug;
            $skip_value=1;
            $create_slug=$slug.'-'.$skip_value;
            
            Blog::where('id','=', $id)->update([
                'bg_title' => $bg_title,
                'slug' => $create_slug,
                'bg_content' => $bg_content,
                'bg_image'=>$imageName
                ]);
            return redirect()->route('blogs.view')
                    ->with('success','Our Blogs Content updated with new slug id.');
          }else{
            $match_slug_name = DB::table('blogs')
              ->select('slug')
              ->where('bg_title','=',$bg_title)
              ->orderBy('slug', 'DESC')
              ->latest()
              ->first();
            $match_slug_name_db=$match_slug_name->slug;
            
            $string = $match_slug_name_db;
            $exploded = explode('-', $string);
            $last_index_value=end($exploded);
            $skip_index_value=$last_index_value+1;
            $new_slug=$slug.'-'.$skip_index_value;

            Blog::where('id','=', $id)->update([
                'bg_title' => $bg_title,
                'slug' => $new_slug,
                'bg_content' => $bg_content,
                'bg_image'=>$imageName
                ]);
            return redirect()->route('blogs.view')
                        ->with('success','Our Blogs Content Updated increment slug Id.');
          }
    }
    // public function blogs_update1(Request $request)
    // {
    //     $input = $request->all();
    //     $bg_title=$input['bg_title'];
    //     $bg_content=$input['bg_content'];
    //     $id=$input['id'];

    //     $get_old_image = DB::table('blogs')
    //       ->select('bg_image')
    //       ->where('id','=',$id)
    //       ->first();
    //     $get_old_image_name=$get_old_image->bg_image;

    //     if($request->hasfile('image'))
    //     {
    //       $image = $request->file('image');
    //       $imageName = "Blogs-".time().".".$image->getClientOriginalExtension();
    //       $file_dest1 ='assets/Upload-Image/Blogs-Image';
    //       $request->image->move($file_dest1, $imageName);

    //       $old_image_delete='assets/Upload-Image/Blogs-Image/'.$get_old_image_name;
    //       if(File::exists($old_image_delete))
    //       {
    //         File::delete($old_image_delete);
    //       }
    //     }

    //     Blog::where('id','=', $id)->update([
    //         'bg_title' => $bg_title,
    //         'bg_content' => $bg_content,
    //         'bg_image'=>$imageName
    //         ]);

    //     return redirect()->route('blogs.view')
    //                     ->with('success','Our Blogs Content updated successfully.');
    // }
    public function blogs_delete(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $get_old_image = DB::table('blogs')
          ->select('bg_image')
          ->where('id','=',$id)
          ->first();
        $get_old_image_name=$get_old_image->bg_image;
        
        $old_image_delete='assets/Upload-Image/Blogs-Image/'.$get_old_image_name;
          if(File::exists($old_image_delete))
          {
            File::delete($old_image_delete);
          }

         $team_list_delete = DB::table('blogs')
            ->where('id','=',$id)
            ->delete();

        return redirect()->route('blogs.view')
                        ->with('success','Our Blogs Content Delete successfully.');
    }


}
